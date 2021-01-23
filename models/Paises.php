<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paises".
 *
 * @property integer $pais_id
 * @property string $pais_nombre
 * @property string $pais_abreviacion
 *
 * @property Ciudades[] $ciudades
 * @property Institutos[] $institutos
 */
class Paises extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paises';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pais_nombre', 'pais_abreviacion'], 'required'],
            [['pais_nombre'], 'string', 'max' => 100],
            [['pais_abreviacion'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pais_id' => 'Pais ID',
            'pais_nombre' => 'Pais Nombre',
            'pais_abreviacion' => 'Pais Abreviacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudades()
    {
        return $this->hasMany(Ciudades::className(), ['pais_id' => 'pais_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutos()
    {
        return $this->hasMany(Institutos::className(), ['pais_id' => 'pais_id']);
    }
}
