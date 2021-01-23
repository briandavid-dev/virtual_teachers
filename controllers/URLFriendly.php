<?php
namespace app\controllers;
use Yii;
	/**
	 * @class UrlFriendly 
	 * @author Brayan Ochoa
	 * @since 19/08/14
	 * @description gestionan el formato de las url de los articulos 
	 */
	class URLFriendly
	{
		/**
		 * @method _new
		 * @param {string} $str
		 * @author Brayan Ochoa
		 * @return string
		 */
		public function _new($str) {
			
			// Tranformamos todo a minusculas

			$url = mb_strtolower($str);
			
			//Rememplazamos caracteres especiales latinos
			
			$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
			$repl = array('a', 'e', 'i', 'o', 'u', 'n');
			$url = str_replace ($find, $repl, $url);
			
			// Añadimos los guiones
			
			$find = array(' ', '&', '\r\n', '\n', '+');
			$url = str_replace ($find, '-', $url);
			
			// Eliminamos y Reemplazamos demás caracteres especiales
			
			$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
			$repl = array('', '-', '');
			$url = preg_replace ($find, $repl, $url);
			
			return $url;
		}	
	}

?>