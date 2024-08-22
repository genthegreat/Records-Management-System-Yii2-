<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CoursesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courses-index">


    <?php if(Yii::$app->user->can( 'admin')): ?>
        <p>
            <?= Html::a('Create Courses', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CourseId',
            'Course_Name',

            ['class' => 'yii\grid\ActionColumn', 
                        'visibleButtons' => [
                            'view' => function ($model) {
                                if( Yii::$app->user->can( 'lecturer' )){
                                    return true;
                                }
                            },
                            'update' => function ($model) {
                                if(Yii::$app->user->can( 'admin' )){
                                    return true;
                                }
                            },
                            'delete' => function ($model) {
                                if(Yii::$app->user->can( 'admin' ))
                                {
                                    return true;
                                }
                            },
                        ]
                    ],
        ],
    ]); ?>


</div>
