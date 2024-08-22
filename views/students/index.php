<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

    
    <?php if(Yii::$app->user->can( 'admin')): ?>
        <p>
            <?= Html::a('Create Students', ['create'], ['class' => 'btn btn-success']) ?>
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
            'Gender',
            //'Date_of_birth',
            //'Phone_Number:ntext',
            //'School',
            'Program',
            'Major',
            'Year_of_study',

            ['class' => 'yii\grid\ActionColumn', 
                        'visibleButtons' => [
                            'view' => function ($model) {
                                if( Yii::$app->user->can( 'log-in' )){
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
