<?php

namespace app\controllers;

use Yii;
use app\models\Lecturers;
use app\models\LecturersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * LecturersController implements the CRUD actions for Lecturers model.
 */
class LecturersController extends Controller
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
     * Lists all Lecturers models.
     * @return mixed
     */
    public function actionIndex()
    {
        if( Yii::$app->user->can( 'lecturer' ))
        {
            $searchModel = new LecturersSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else
        {
            throw new ForbiddenHttpException("You do not have the permissions to access this page!");
        }
    }

    /**
     * Displays a single Lecturers model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if( Yii::$app->user->can( 'lecturer' ))
        {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else
        {
            throw new ForbiddenHttpException("You do not have the permissions to access this page!");
        }
    }

    /**
     * Creates a new Lecturers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if( Yii::$app->user->can( 'admin' ))
        {
            $model = new Lecturers();
    
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->ID]);
            }
    
            return $this->render('create', [
                'model' => $model,
            ]);
        }else
        {
            throw new ForbiddenHttpException("You do not have the permissions to access this page!");
        }
    }

    /**
     * Updates an existing Lecturers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if( Yii::$app->user->can( 'lecturer' ))
        {
            $model = $this->findModel($id);
    
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->ID]);
            }
    
            return $this->render('update', [
                'model' => $model,
            ]);
        }else
        {
            throw new ForbiddenHttpException("You do not have the permissions to access this page!");
        }
    }

    /**
     * Deletes an existing Lecturers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if( Yii::$app->user->can( 'admin' ))
        {
            $this->findModel($id)->delete();
    
            return $this->redirect(['index']);
        }else
        {
            throw new ForbiddenHttpException("You do not have the permissions to access this page!");
        }
    }

    /**
     * Finds the Lecturers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lecturers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lecturers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
