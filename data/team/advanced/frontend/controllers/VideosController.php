<?php

/**
 * Team:摆烂去,NKU
 * Coding by  张铮 2211751
 * This is about how to control  videos
 */

namespace frontend\controllers;

use Yii;
use frontend\models\Videos;
use frontend\models\VideoComments;
use frontend\models\VideoLikes;
use frontend\models\VideosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VideosController implements the CRUD actions for Videos model.
 */
class VideosController extends Controller
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
                ],
            ],
        ];
    }

    /**
     * Lists all Videos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VideosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Videos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
    // 根据 ID 获取视频信息
    $model = Videos::findOne($id);
    $comments = VideoComments::find()->where(['video_id' => $id])->orderBy(['created_at' => SORT_DESC])->all();

        // Count likes
        $likeCountVideo = VideoLikes::find()->where(['video_id' => $id])->count();

        // Handle new comment submission
        $newComment = new VideoComments();
        if ($newComment->load(Yii::$app->request->post())) {
            $newComment->article_id = $id;
            $newComment->user_id = Yii::$app->user->id ?? null; // Assign user ID if logged in
            $newComment->created_at = date('Y-m-d H:i:s');
            if ($newComment->save()) {
                return $this->redirect(['view', 'id' => $id]);
            }
        }
    
    // 如果找不到记录，抛出 404 错误
    if ($model === null) {
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // 渲染视频视图，并将视频模型传递到视图中
    return $this->render('view', [
        'model' => $model,
        'comments' => $comments,
        'newComment' => $newComment,
        'likeCountVideo' => $likeCountVideo,
    ]);
    }

    /**
     * Creates a new Videos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Videos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Videos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    /**
     * Handles likes for an video.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionLike($id)
    {
        // Ensure the video exists
        $this->findModel($id);

        // Check if the user has already liked the video
        $existingLike = VideoLikes::find()->where([
            'video_id' => $id,
            'user_id' => Yii::$app->user->id,
        ])->one();

        if (!$existingLike) {
            $like = new VideoLikes();
            $like->video_id = $id;
            $like->user_id = Yii::$app->user->id ?? null; // Assign user ID if logged in
            $like->created_at = date('Y-m-d H:i:s');
            $like->save();
        }

        return $this->redirect(['view', 'id' => $id]);
    }
    /**
     * Deletes an existing Videos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Videos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Videos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Videos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
