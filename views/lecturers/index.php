<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LecturersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lecturers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lecturers-index">


    <?php if(Yii::$app->user->can( 'admin')): ?>
        <p>
            <?= Html::a('Create Lecturers', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'Name',
            'Department',
            'Type',
            'Course',

            ['class' => 'yii\grid\ActionColumn', 
                        'visibleButtons' => [
                            'view' => function ($model) {
                                if( Yii::$app->user->can( 'lecturer' )){
                                    return true;
                                }
                            },
                            'update' => function ($model) {
                                if(Yii::$app->user->can( 'lecturer' )){
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
