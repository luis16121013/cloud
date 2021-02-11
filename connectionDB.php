<?php
    class mysqlDB{
        static private $host="localhost";
        static private $port="3306";
        static private $db="persona";
        static private $user="puma";
		    static private $pass="123";

        public static function getConexion(){
           try{
                $con=new PDO('mysql:host='.self::$host.':'.self::$port.'; dbname='.self::$db.';',self::$user,self::$pass);
                $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $con->exec('SET CHARACTER SET UTF8');
           }catch(Exception $e){
               die('error: '.$e->getMessage());
           }
           return $con;
        }

    }
//$r = mysqlDB::getConexion();
//if($r != null){
//    echo "conect";
//}
