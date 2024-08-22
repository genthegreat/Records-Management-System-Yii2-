<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use borales\extensions\phoneInput\PhoneInput;


/* @var $this yii\web\View */
/* @var $model app\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Gender')->dropDownList([ 'M' => 'M', 'F' => 'F', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Date_of_birth')->widget(
        DatePicker::className(), [
            // inline too, not bad
            'inline' => false, 
            // modify template for custom rendering
            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]);?>

    
    <?= $form->field($model, 'Phone_Number')->widget(PhoneInput::className(), [
                                            'jsOptions' => [
                                                'preferredCountries' => ['zm', 'pl', 'ua'],
                                            ]
                                        ]);
    ?>

    <?= $form->field($model, 'School')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Program')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Major')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Year_of_study')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
