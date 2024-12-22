<?php

/**
 * Team:摆烂去,NKU
 * Coding by 陈鹏 2210558
 * This is about how to control aiticles
 */

namespace frontend\controllers;

use Yii;
use frontend\models\Articles;
use frontend\models\ArticleComments;
use frontend\models\ArticleLikes;
use frontend\models\ArticlesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticlesController handles CRUD actions for Articles model, including likes and comments.
 */
class ArticlesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'like' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Articles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticlesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Articles model with comments and likes.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $images = $model->images; // 获取关联的图片数据
        $videos = $model->videos; // 获取关联的视频数据
        // Fetch comments
        $comments = ArticleComments::find()->where(['article_id' => $id])->orderBy(['created_at' => SORT_DESC])->all();

        // Count likes
        $likeCount = ArticleLikes::find()->where(['article_id' => $id])->count();

        // Handle new comment submission
        $newComment = new ArticleComments();
        if ($newComment->load(Yii::$app->request->post())) {
            $newComment->article_id = $id;
            $newComment->user_id = Yii::$app->user->id ?? null; // Assign user ID if logged in
            $newComment->created_at = date('Y-m-d H:i:s');
            if ($newComment->save()) {
                return $this->redirect(['view', 'id' => $id]);
            }
        }

        return $this->render('view', [
            'model' => $model,
            'images' => $images,
            'videos' => $videos,
            'comments' => $comments,
            'newComment' => $newComment,
            'likeCount' => $likeCount,
        ]);
    }

    /**
     * Handles likes for an article.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionLike($id)
    {
        // Ensure the article exists
        $this->findModel($id);

        // Check if the user has already liked the article
        $existingLike = ArticleLikes::find()->where([
            'article_id' => $id,
            'user_id' => Yii::$app->user->id,
        ])->one();

        if (!$existingLike) {
            $like = new ArticleLikes();
            $like->article_id = $id;
            $like->user_id = Yii::$app->user->id ?? null; // Assign user ID if logged in
            $like->created_at = date('Y-m-d H:i:s');
            $like->save();
        }

        return $this->redirect(['view', 'id' => $id]);
    }

    /**
     * Finds the Articles model based on its primary key value.
     * @param integer $id
     * @return Articles
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
