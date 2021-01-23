<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pagos".
 *
 * @property integer $pago_educacion_id
 * @property string $pago_fecha_creacion
 * @property integer $pago_monto
 * @property integer $periodo_escolar_id
 * @property integer $forma_pago_id
 * @property integer $estudiante_id
 * @property string $pago_representante_nombre
 * @property string $pago_representante_apellido
 * @property string $pago_representante_cedula
 * @property string $pago_representante_parentesco
 * @property integer $tipo_pago_id
 * @property string $pago_detalle
 *
 * @property FormasPagos $formaPago
 * @property PeriodosEscolares $periodoEscolar
 * @property Usuarios $estudiante
 * @property TiposPagos $tipoPago
 */
class Pagos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pagos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pago_fecha_creacion'], 'safe'],
            [['pago_monto', 'periodo_escolar_id', 'forma_pago_id', 'estudiante_id', 'tipo_pago_id'], 'required'],
            [['pago_monto', 'periodo_escolar_id', 'forma_pago_id', 'estudiante_id', 'tipo_pago_id'], 'integer'],
            [['pago_detalle', 'pago_mensualidad_mes'], 'string'],
            [['pago_representante_nombre', 'pago_representante_apellido', 'pago_representante_cedula', 'pago_representante_parentesco'], 'string', 'max' => 45],
            [['forma_pago_id'], 'exist', 'skipOnError' => true, 'targetClass' => FormasPagos::className(), 'targetAttribute' => ['forma_pago_id' => 'forma_pago_id']],
            [['periodo_escolar_id'], 'exist', 'skipOnError' => true, 'targetClass' => PeriodosEscolares::className(), 'targetAttribute' => ['periodo_escolar_id' => 'periodo_escolar_id']],
            [['estudiante_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['estudiante_id' => 'usuario_id']],
            [['tipo_pago_id'], 'exist', 'skipOnError' => true, 'targetClass' => TiposPagos::className(), 'targetAttribute' => ['tipo_pago_id' => 'tipo_pago_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pago_educacion_id' => 'ID',
            'pago_fecha_creacion' => 'Fecha creacion',
            'pago_monto' => 'Monto',
            'periodo_escolar_id' => 'Periodo escolar',
            'forma_pago_id' => 'Forma  de pago',
            'estudiante_id' => 'Estudiante',
            'pago_representante_nombre' => 'Nombre del representante',
            'pago_representante_apellido' => 'Apellido del representante',
            'pago_representante_cedula' => 'Cédula del representante',
            'pago_representante_parentesco' => 'Parentesco con el estudiante',
            'tipo_pago_id' => 'Tipo de pago',
            'pago_detalle' => 'Detalle',
            'pago_mensualidad_mes' => 'Pago  de mes', 
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormaPago()
    {
        return $this->hasOne(FormasPagos::className(), ['forma_pago_id' => 'forma_pago_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodoEscolar()
    {
        return $this->hasOne(PeriodosEscolares::className(), ['periodo_escolar_id' => 'periodo_escolar_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiante()
    {
        return $this->hasOne(Usuarios::className(), ['usuario_id' => 'estudiante_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoPago()
    {
        return $this->hasOne(TiposPagos::className(), ['tipo_pago_id' => 'tipo_pago_id']);
    }
}
