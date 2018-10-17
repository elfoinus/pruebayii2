<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Departamentos;
/* @var $this yii\web\View */
/* @var $model app\models\Municipios */
/* @var $form yii\widgets\ActiveForm */
$nombre=  Departamentos::findOne($model->departamento_id)->departamento;
$model->nombreD = $nombre;
?>

<div class="municipios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'municipio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'departamento_id')->textInput(['maxlength' => true,'disabled'=>true]) ?>
    <?= $form->field($model, 'nombreD')->textInput(['maxlength' => true,'disabled'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
