<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lecturers */

$this->title = 'Update Lecturers: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Lecturers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lecturers-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
