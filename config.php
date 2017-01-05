<?php
session_start();
@define('MYFOLDER_PATH' , dirname(__FILE__));
require_once 'swiftmailer-5.x/lib/swift_required.php';

if( !class_exists('Config') ) {
	class Config{
		public static function abs_path(){
			return dirname(__FILE__);
		}

		public static function loadCore( $filename , $once = true ){
			if( $once )
				require_once( self::abs_path() . '/core/' . $filename . '.php' );
			else
				require( self::abs_path() . '/core/' . $filename . '.php' );
		}

		public static function loadClass( $filename , $once = true ){
			if( $once )
			{
				require_once( self::abs_path() . '/classes/'. $filename .'.php' );
			}

			else
				require( self::abs_path() . '/classes/'. $filename .'.php' );
		}

	}
}

spl_autoload_register(function($class){
	Config::loadClass( $class );
});

$_db = new Database();
$_admin = new Admin();
$student = new Student();
$_club = new Club();
$_event = new Event();
$_ticket = new Ticket();
$_mail = new Mail();
?>
