<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartamentosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departamentos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Departamentos', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('ver todos los municipios', ['municipios'], ['class' => 'btn btn-info']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_departamento',
            'departamento',

          //  ['class' => 'yii\grid\ActionColumn'],

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Opc',
                'headerOptions' => ['style' => 'color:#337ab7'],

                'template'=>'{view}{update} {municipio}',

                'buttons' => [
                  'municipio' => function ($url, $model, $key) {
                      return $model->id_departamento !=  '' ? Html::a(
                  '<span title="Adicionar municipio" class="glyphicon glyphicon-user"</span>',

                  ['municipio', 'id' => $model->id_departamento]):' ';

                  },


                ]
            ],


        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
