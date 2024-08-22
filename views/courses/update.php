<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Courses */

$this->title = 'Update Courses: ' . $model->CourseId;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CourseId, 'url' => ['view', 'id' => $model->CourseId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="courses-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
