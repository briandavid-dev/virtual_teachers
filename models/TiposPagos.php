<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipos_pagos".
 *
 * @property integer $tipo_pago_id
 * @property string $tipo_pago_nombre
 *
 * @property Pagos[] $pagos
 */
class TiposPagos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipos_pagos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_pago_nombre'], 'required'],
            [['tipo_pago_nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tipo_pago_id' => 'Tipo Pago ID',
            'tipo_pago_nombre' => 'Motivo de pago',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pagos::className(), ['tipo_pago_id' => 'tipo_pago_id']);
    }
}
