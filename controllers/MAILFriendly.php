<?php

	namespace app\controllers;
	use Yii;

	/**
	 * @class MAILFriendly 
	 * @author Brayan Ochoa
	 * @since 02/06/16
	 * @description enviar mail facilmente a traves de parametros y la vista del mail
	 */
	class MAILFriendly
	{
		/**
		 * @method _new
		 * @param {string} $str
		 * @author Brayan Ochoa
		 * @return string
		 */
		public function enviar($title, $to, $replyTo, $from, $view, $arrayParams, $bcc = false)
		{
			/*
			 * From: nombre y mail de quien lo envia. Ejemplo: Reservas Venaventours <reservas@venaventours.com>'
			 * Reply-to: responder a (cuando preciona responder en el mail sale el mail aqui puesto)
			 * Bcc: con copia oculta 
			 */
			$bbc=true;
			$mensaje = Yii::$app->mailer->render($view, $arrayParams, 'layouts/html');			
			$cabeceras = "";
			if($replyTo) $cabeceras .= "Reply-to: $replyTo\r\n";
			$cabeceras .= 'From: '.$from.'' . "\r\n";
			$cabeceras .= 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			if($bcc) $cabeceras .= 'Bcc: bmosolucionestecnologicas@gmail.com, erick.araque.bmo@gmail.com' . "\r\n";
	
			//return true; // descomentar para hambiente de desarrollo, comentar para hambiente produccion
			// Enviarlo - la funcion mail retorna true o false			
			return mail($to, $title, $mensaje, $cabeceras);
			
		}
	}

?>