<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lecturers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lecturers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID')->textInput() ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Type')->dropDownList([ 'Senior' => 'Senior', 'Part Time' => 'Part Time', 'Tutor' => 'Tutor', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Course')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
