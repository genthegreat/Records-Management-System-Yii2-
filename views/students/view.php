<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Students */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="students-view">

    
    <p>
        <?php if(Yii::$app->user->can( 'lecturer')): ?>
            <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
        <?php if(Yii::$app->user->can( 'admin')): ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'Name',
            'Gender',
            'Date_of_birth',
            'Phone_Number:ntext',
            'School',
            'Program',
            'Major',
            'Year_of_study',
        ],
    ]) ?>

</div>
