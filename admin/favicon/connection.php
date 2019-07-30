<?php

    error_reporting( ~E_DEPRECATED & ~E_NOTICE );
    error_reporting(0);
    //session_start();

    $webstatus="web";  //production, developement,local
    //$webstatus="local";  //production, developement,local
   


   if($webstatus=="web"){
        define('DBHOST', '50.62.209.3:3306');
        define('DBUSER', 'userBluegreytech');
        define('DBPASS', 'Bluegreytech@123');
        define('DBNAME', 'bluegreytech');
        define('FROMNAME', '');
        define('USERNAME', '');
        define('USERPASSWORD', '');
        define('SETFROM', '');
        define('SETTO', '');
    }else if($webstatus=="local"){
        define('DBHOST', 'localhost');
        define('DBUSER', 'root');
        define('DBPASS', '');
        define('DBNAME', 'bluegrey');
        define('FROMNAME', 'BlurGrey');
        define('USERNAME', 'bansikansagara456@gmail.com');
        define('USERPASSWORD', '737338073@bk');
        define('SETFROM', 'bansikansagara456@gmail.com');
        define('SETTO', 'mitnp16@gmail.com'); 
    }

   
  
    $con = mysql_connect(DBHOST,DBUSER,DBPASS)or die('server not connected'. mysql_error());
    mysql_select_db(DBNAME,$con)or die('database not connected'. mysql_error());

   
?>