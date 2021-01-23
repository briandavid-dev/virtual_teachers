<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property integer $usuario_id
 * @property string $usuario_nombre
 * @property string $usuario_apellido
 * @property string $usuario_correo
 * @property string $usuario_clave
 * @property string $usuario_fecha_creacion
 * @property string $usuario_fecha_modificacion
 * @property string $usuario_fecha_ultimo_acceso
 * @property string $usuario_telefono_1
 * @property string $usuario_telefono_2
 * @property string $usuario_genero
 * @property string $usuario_fecha_nacimiento
 * @property string $usuario_fecha_codigo
 * @property integer $usuario_codigo
 * @property string $usuario_direccion
 * @property integer $instituto_id
 * @property string $usuario_perfil
 *
 * @property Pagos[] $pagos
 * @property Institutos $instituto
 */
class Usuarios extends \yii\db\ActiveRecord
{
   public $usuario_correo_confirmacion;
    public $usuario_clave_confirmacion;

    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario_nombre', 'usuario_apellido', 'usuario_correo', 'usuario_clave', 'usuario_genero', 'usuario_fecha_nacimiento', 'instituto_id', 'usuario_perfil','usuario_cedula'], 'required'],
            [['usuario_correo', 'usuario_clave', 'usuario_direccion'], 'string'],
            [['usuario_fecha_creacion', 'usuario_fecha_modificacion', 'usuario_fecha_ultimo_acceso', 'usuario_fecha_nacimiento', 'usuario_fecha_codigo'], 'safe'],
            [['usuario_codigo', 'instituto_id',  'usuario_telefono_1', 'usuario_telefono_2'], 'integer'],
            [['usuario_nombre', 'usuario_apellido', 'usuario_telefono_2', 'usuario_genero', 'usuario_perfil'], 'string', 'max' => 45],
            [['instituto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institutos::className(), 'targetAttribute' => ['instituto_id' => 'instituto_id']],
            [['usuario_correo', 'usuario_correo_confirmacion'],'required'],
            [['usuario_correo', 'usuario_correo_confirmacion'],'email'],
            [['usuario_correo'],'unique'],
            [['usuario_correo_confirmacion'],'compare','compareAttribute'=>'usuario_correo'],
            
            [['usuario_clave', 'usuario_clave_confirmacion'],'required'],
            [['usuario_clave', 'usuario_clave_confirmacion'], 'string', 'length' => [8, 50]],
            [['usuario_clave_confirmacion'],'compare','compareAttribute'=>'usuario_clave'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usuario_id' => ' ID',
            'usuario_nombre' => 'Nombre',
            'usuario_apellido' => 'Apellido',
            'usuario_correo' => 'Correo',
            'usuario_clave' => 'Clave',
            'usuario_fecha_creacion' => 'Fecha Creacion',
            'usuario_fecha_modificacion' => 'Fecha Modificacion',
            'usuario_fecha_ultimo_acceso' => 'Fecha Ultimo Acceso',
            'usuario_telefono_1' => 'Teléfono celular',
            'usuario_telefono_2' => 'Teléfono local',
            'usuario_genero' => 'Genero',
            'usuario_fecha_nacimiento' => 'Fecha Nacimiento',
            'usuario_fecha_codigo' => 'Fecha Codigo',
            'usuario_codigo' => 'Codigo',
            'usuario_direccion' => 'Direccion',
            'instituto_id' => 'Instituto',
            'usuario_perfil' => 'Perfil',
            'usuario_cedula' => 'Cédula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pagos::className(), ['estudiante_id' => 'usuario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstituto()
    {
        return $this->hasOne(Institutos::className(), ['instituto_id' => 'instituto_id']);
    }
}
