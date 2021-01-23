<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "formas_pagos".
 *
 * @property integer $forma_pago_id
 * @property string $forma_pago_nombre
 *
 * @property Pagos[] $pagos
 */
class FormasPagos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'formas_pagos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['forma_pago_nombre'], 'required'],
            [['forma_pago_nombre'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'forma_pago_id' => 'Forma Pago ID',
            'forma_pago_nombre' => 'Forma de pago',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pagos::className(), ['forma_pago_id' => 'forma_pago_id']);
    }
}
