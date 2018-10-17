<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Municipios;

/**
 * MunicipiosSearch represents the model behind the search form of `app\models\Municipios`.
 */
class MunicipiosSearch extends Municipios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_municipio', 'estado', 'departamento_id'], 'integer'],
            [['municipio'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Municipios::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_municipio' => $this->id_municipio,
            'estado' => $this->estado,
            'departamento_id' => $this->departamento_id,
        ]);

        $query->andFilterWhere(['like', 'municipio', $this->municipio]);

        return $dataProvider;
    }
}