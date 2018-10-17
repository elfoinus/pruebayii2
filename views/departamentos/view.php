<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Departamentos */

$this->title = $model->id_departamento;
$this->params['breadcrumbs'][] = ['label' => 'Departamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$nombres = "";
for ($i=0; $i <count($municipios) ; $i++) {
  $nombres =  $nombres."\n".$municipios[$i]['municipio'];
}
?>
<div class="departamentos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_departamento], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Delete', ['delete', 'id' => $model->id_departamento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿borrará el departamento '.$model->departamento."?\n y sus municipios: \n".$nombres,
                'method' => 'post',
            ],
        ]) ?>
          <?= Html::a('', ['municipio', 'id' => $model->id_departamento], ['class' => 'glyphicon glyphicon-user']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_departamento',
            'departamento',
        ],
    ]) ?>

    <?php
    /*
    for ($i=0; $i <count($municipios) ; $i++) {
      echo $municipios[$i]['municipio']."<br>";
    }
    */
    ?>

</div>
