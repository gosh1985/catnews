<?php

namespace app\controllers;

use Yii;
use app\models\News;
use app\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use sbs\helpers\TransliteratorHelper;
use yii\web\ForbiddenHttpException;
use app\models\Comment;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionShow($id){
              $newsDetail = News::findOne($id);
            //  $newsComments = Comment::findAll(['news_id' => $id]);

              $newsComments  = Comment::find()
                      ->where(['news_id' => $id])
                      ->orderBy('created_at')
                      ->all();
               return $this->render('show',compact('newsDetail','newsComments'));
    }






    public function actionRatingplus($id){
              $row = News::findOne($id);
              $row->updateCounters(['rating_plus' => 1]);
              return $row->rating_plus;
  }

    public function actionRatingminus($id){
              $row = News::findOne($id);
              $row->updateCounters(['rating_minus' => -1]);
              return $row->rating_minus;
  }

  public function actionCommentCreate($id = null)
  {
      $this->layout = 'modallayout';
      $model = new Comment();

      if ($model->load(Yii::$app->request->post())) {
          $model->user_id = Yii::$app->user->getId();
          $session = Yii::$app->session;
          $session->open();
          $model->news_id = $session['newsId'];
        //  $model->parent_id = $id;
          if($model->save()){
              return $this->redirect(['news/show', 'id' =>
              $model->news_id
            ]);
              $session->remove('newsId');
              }
        } else {
          return $this->render(
            'comment-create', [
              'model' => $model,
          ]);
      }
  }

  public function actionSubCommentCreate()
  {
      $this->layout = 'modallayout';
      $model = new Comment();

      if ($model->load(Yii::$app->request->post())) {
          $model->user_id = Yii::$app->user->getId();
          $session = Yii::$app->session;
          $session->open();
          $model->news_id = $session['newsId'];
          $model->parent_id = $session['parentId'];
          if($model->save()){
              return $this->redirect(['news/show', 'id' =>
              $model->news_id
            ]);
              $session->remove('newsId');
              $session->remove('parentId');
              }
        } else {
          return $this->render(
            'sub-comment-create', [
              'model' => $model,
          ]);
      }
  }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
       {
         if(Yii::$app->user->can('create-news')){
           $model = new News();

           if ($model->load(Yii::$app->request->post()))
           {
             $model->time_created = date('Y-m-d h:i:s');
             $imageName =TransliteratorHelper::process($model->title, 'en');


           // if(!empty($model->file))
         //   {
              $model->image = UploadedFile::getInstance($model,'image');
              $model->image->saveAs('uploads/'.$imageName.'.'.$model->image->extension );
              //save the path in the db column
              $model->image = 'uploads/'.$imageName.'.'.$model->image->extension ;
         //  }


                if($model->save()){
                   return $this->redirect(['view', 'id' => $model->id]);
                  }else{
                      // show errors
                      var_dump($model->getErrors());
                      exit;
                  }
                           //  $model->save(false);
             //  return $this->redirect(['view', 'id' => $model->id]);
           } else {
               return $this->render('create', [
                   'model' => $model,
               ]);
           }
         }else{
           throw new ForbiddenHttpException;
         }

       }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
