<?php

namespace app\models;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    
    /*
     * se declaran todas las variables
     */
    public $usuario_id;
    public $usuario_nombre;
    public $usuario_apellido;
    public $usuario_login;
    public $usuario_clave;
    public $usuario_fecha_creacion;
    public $usuario_fecha_modificacion;
    public $usuario_fecha_ultimo_acceso;
    public $usuario_correo;
    public $usuario_telefono_1;
    public $usuario_telefono_2;
    public $usuario_telefono_emergencia;
    public $usuario_direccion;
    public $usuario_activo;
    public $usuario_online;
    public $usuario_perfil;
    public $usuario_imagen_1;
    public $usuario_estado;
    public $usuario_mensaje_publico;
    public $usuario_genero;
    public $usuario_fecha_nacimiento;
    public $pais_id;
    public $usuario_codigo;
    public $usuario_fecha_codigo;
    public $instituto_id;
    public $usuario_cedula;

    
    

    /*
    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];
    */


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
    	// se usa con el array de prueba
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        
    	$usuarios = Usuarios::find()
    	->where([
    			"usuario_id" => $id
    	])
    	->one();
    	if (!count($usuarios)) {
    		return null;
    	}
    	return new static($usuarios);
    	
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
    	
    	/* esto es con el array de arriba de prueba
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
        */
        
        $usuarios = Usuarios::find()
        ->where([
        		"usuario_correo" => $username
        ])
        ->one();
        
        if (!count($usuarios)) {
        	return null;
        }
        return new static($usuarios);
        
        
        
    }


    /**
     * @inheritdoc
     */
    public function getId()
    {
    	//el id es importanticimo, se usa para el manejo de las sesiones
    	// anterior a trabajar con la base de datos estaba asi
    	// return $this->id;
        return $this->usuario_id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {  
        return $this->usuario_clave === $password;
    }
}
