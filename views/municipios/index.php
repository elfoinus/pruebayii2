<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Departamentos;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MunicipiosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Municipios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="municipios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
      <?php
      $session = Yii::$app->session;
      $id = $session->get('id_departamento');
      if(isset($id)){
      ?>
        <?= Html::a('Create Municipios', ['create'], ['class' => 'btn btn-success']) ?>
      <?php }?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_municipio',
            'municipio',
            'estado',
          //  'departamento_id',
            [   'header' => 'Departamento',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'value'=> function($model){
                    return $model->nombreDepartamento();
                },
                 'filter'=>
                Html::activeDropDownList($searchModel, 'departamento_id', ArrayHelper::map(Departamentos::find()->all(),'id_departamento','departamento'),
                [ 'prompt'=>'-- > Seleccione <--',])
            ],
          //  'departamento.departamento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
