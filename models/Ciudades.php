<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ciudades".
 *
 * @property integer $ciudad_id
 * @property string $ciudad_nombre
 * @property integer $pais_id
 *
 * @property Paises $pais
 * @property Institutos[] $institutos
 */
class Ciudades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ciudades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ciudad_nombre', 'pais_id'], 'required'],
            [['pais_id'], 'integer'],
            [['ciudad_nombre'], 'string', 'max' => 100],
            [['pais_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paises::className(), 'targetAttribute' => ['pais_id' => 'pais_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ciudad_id' => 'Ciudad ID',
            'ciudad_nombre' => 'Ciudad Nombre',
            'pais_id' => 'Pais ID',
        ];
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
    public function getInstitutos()
    {
        return $this->hasMany(Institutos::className(), ['ciudad_id' => 'ciudad_id']);
    }
}
