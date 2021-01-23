<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "periodos_escolares".
 *
 * @property integer $periodo_escolar_id
 * @property string $periodo_escolar_fecha_desde
 * @property string $periodo_escolar_fecha_hasta
 * @property integer $periodo_escolar_monto_matricula
 * @property integer $periodo_escolar_monto_mensualidad
 * @property integer $instituto_id
 *
 * @property Pagos[] $pagos
 * @property Institutos $instituto
 */
class PeriodosEscolares extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periodos_escolares';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['periodo_escolar_fecha_desde', 'periodo_escolar_fecha_hasta', 'periodo_escolar_monto_matricula', 'periodo_escolar_monto_mensualidad', 'instituto_id'], 'required'],
            [['periodo_escolar_fecha_desde', 'periodo_escolar_fecha_hasta'], 'safe'],
            [['periodo_escolar_monto_matricula', 'periodo_escolar_monto_mensualidad', 'instituto_id'], 'integer'],
            [['instituto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institutos::className(), 'targetAttribute' => ['instituto_id' => 'instituto_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'periodo_escolar_id' => 'ID',
            'periodo_escolar_fecha_desde' => 'Fecha desde',
            'periodo_escolar_fecha_hasta' => 'Fecha hasta',
            'periodo_escolar_monto_matricula' => 'costo total de matricula',
            'periodo_escolar_monto_mensualidad' => 'Costo total de mensualidad',
            'instituto_id' => 'Cod institucion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pagos::className(), ['periodo_escolar_id' => 'periodo_escolar_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstituto()
    {
        return $this->hasOne(Institutos::className(), ['instituto_id' => 'instituto_id']);
    }
}
