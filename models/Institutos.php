<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "institutos".
 *
 * @property integer $instituto_id
 * @property integer $ciudad_id
 * @property string $instituto_nombre
 * @property string $instituto_direccion
 * @property string $instituto_tipo
 * @property integer $pais_id
 *
 * @property Ciudades $ciudad
 * @property Paises $pais
 * @property PeriodosEscolares[] $periodosEscolares
 * @property Usuarios[] $usuarios
 */
class Institutos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'institutos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ciudad_id', 'instituto_nombre', 'instituto_direccion', 'instituto_tipo', 'pais_id'], 'required'],
            [['ciudad_id', 'pais_id'], 'integer'],
            [['instituto_nombre', 'instituto_direccion'], 'string'],
            [['instituto_tipo'], 'string', 'max' => 45],
            [['ciudad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ciudades::className(), 'targetAttribute' => ['ciudad_id' => 'ciudad_id']],
            [['pais_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paises::className(), 'targetAttribute' => ['pais_id' => 'pais_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'instituto_id' => 'Instituto ID',
            'ciudad_id' => 'Ciudad ID',
            'instituto_nombre' => 'Instituto Nombre',
            'instituto_direccion' => 'Instituto Direccion',
            'instituto_tipo' => 'Instituto Tipo',
            'pais_id' => 'Pais ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudad()
    {
        return $this->hasOne(Ciudades::className(), ['ciudad_id' => 'ciudad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPais()
    {
        return $this->hasOne(Paises::className(), ['pais_id' => 'pais_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodosEscolares()
    {
        return $this->hasMany(PeriodosEscolares::className(), ['instituto_id' => 'instituto_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['instituto_id' => 'instituto_id']);
    }
}
