<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Courses */

$this->title = $model->CourseId;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="courses-view">

    <p>
        <?php if(Yii::$app->user->can( 'admin')): ?>
            <?= Html::a('Update', ['update', 'id' => $model->CourseId], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
        <?php if(Yii::$app->user->can( 'admin')): ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->CourseId], [
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
            'CourseId',
            'Course_Name',
        ],
    ]) ?>

</div>
