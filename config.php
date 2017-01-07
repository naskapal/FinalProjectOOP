<?php
session_start();
@define('MYFOLDER_PATH' , dirname(__FILE__));
// require_once 'swiftmailer-5.x/lib/swift_required.php';

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
				require_once( self::abs_path() . '/classes/'. $filename .'.php' );
			else
				require( self::abs_path() . '/classes/'. $filename .'.php' );
		}

		private function __clone(){}
	}
}

if( !class_exists('System') ){
	class System{
		private $data = [] , $instance;

		public function __set( $var , $val ){}

		public function __get( $var ){}

		public static function instance(){
			if( is_object(self::$instance) ){
				return self::$instance;
			}

			return new self;
		}

		private function __clone(){}

		private function __construct(){}

	}
}

spl_autoload_register(function($class){
	Config::loadClass( $class );
});

// $system = System::instance();
// $system->admin = new Admin();
// $system->student = new System();
// $system->club = new Club();
// $system->event = new Event();
// $system->ticket = new Ticket();
// $system->mail = new Mail();

$_db = new Database();
$_admin = new Admin();
$student = new Student();
$_club = new Club();
$_event = new Event();
$_ticket = new Ticket();
$_mail = new Mail();
?>
