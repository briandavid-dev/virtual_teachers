<?php
namespace app\controllers;

use Yii;
use app\models\Notificaciones;
use app\models\Correos;
use app\controllers\MAILFriendly;
	/**
	 * @class Funcion 
	 * @author Erick Araque
	 * @since 31/10/2016
	 * @description erick debe agregarle a descripcion
	 */
	class Funcion
	{
		/**
		 * @method _new
		 * @param {string} $str
		 * @author Brayan Ochoa
		 * @return string
		 */

    public function CorreoEnviar($descripicion,$email,$layout,$params) {
          

      $MAILFriendly = new MAILFriendly();
      $para = Yii::$app->params['emailContacto'];

                  if(
                  $MAILFriendly->enviar(
                    $descripicion,
                    "$para",
                    "<$email>",
                    Yii::$app->params['dominioNombreMayusculaSinWWW']." <info@".Yii::$app->params['dominioNombreMinusculaSinWWW'].">",
                    $layout,
                    $params,
                    true
                  )
                  ) {
                  //SI
                  } else {
                 //NO;
                  }
                 

                 return 1;
     
    }

    public function CorreoEnviarusuario($descripicion,$email,$layout,$params,$para) {
          

      $MAILFriendly = new MAILFriendly();

                  if(
                  $MAILFriendly->enviar(
                    $descripicion,
                    "$para",
                    "<$email>",
                    Yii::$app->params['dominioNombreMayusculaSinWWW']." <info@".Yii::$app->params['dominioNombreMinusculaSinWWW'].">",
                    $layout,
                    $params,
                    true
                  )
                  ) {
                  //SI
                  } else {
                 //NO;
                  }
                 

                 return 1;
     
    }
    
}

?>