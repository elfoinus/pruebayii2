<?php

namespace app\models;
use app\models\Departamentos;
use Yii;

/**
 * This is the model class for table "municipios".
 *
 * @property string $id_municipio
 * @property string $municipio
 * @property string $estado
 * @property string $departamento_id
 *
 * @property Departamentos $departamento
 */
class Municipios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'municipios';
    }
    public $nombreD;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado', 'departamento_id'], 'required'],
            [['estado', 'departamento_id'], 'integer'],
            [['municipio'], 'string', 'max' => 255],
            [['departamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departamentos::className(), 'targetAttribute' => ['departamento_id' => 'id_departamento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_municipio' => 'Id Municipio',
            'municipio' => 'Municipio',
            'estado' => 'Estado',
            'departamento_id' => 'Departamento ID',
        ];
    }
  public function nombreDepartamento(){
    $data = Departamentos::findOne($this->departamento_id);
    return $data['departamento'];
  }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento()
    {
        return $this->hasOne(Departamentos::className(), ['id_departamento' => 'departamento_id']);
    }

    /**
     * {@inheritdoc}
     * @return MunicipiosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MunicipiosQuery(get_called_class());
    }
}
