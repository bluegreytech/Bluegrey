<?php

error_reporting(0);
    error_reporting( ~E_DEPRECATED & ~E_NOTICE );
    session_start();

    $webstatus="developement";  //production, developement,local
    //$webstatus="local";  //production, developement,local
   
 // $mail->FromName="Bluegrey"; 
                // $mail->Username = "hiren@nilayinfotech.co.in";
                // $mail->Password = "Hiren@1234";
                // $mail->SetFrom("hiren@nilayinfotech.co.in"); 

   if($webstatus=="local"){
        define('DBHOST', '50.62.209.3:3306');
        define('DBUSER', 'userBluegreytech');
        define('DBPASS', 'Bluegreytech@123');
        define('DBNAME', 'bluegreytech');
        define('FROMNAME', 'BlueGrey');
        define('USERNAME', 'hiren@nilayinfotech.co.in');
        define('USERPASSWORD', 'Hiren@1234');
        define('SETFROM', 'hiren@nilayinfotech.co.in');
        define('SETTO', 'hiren@nilayinfotech.co.in');
        define('BASE_URL', 'https://bluegreytech.com/');
    }else if($webstatus=="developement"){
        define('DBHOST', 'localhost');
        define('DBUSER', 'root');
        define('DBPASS', '');
        define('DBNAME', 'bluegrey');
        define('FROMNAME', 'BlueGrey');
        define('USERNAME', 'hiren@nilayinfotech.co.in');
        define('USERPASSWORD', 'Hiren@1234');
        define('SETFROM', 'hiren@nilayinfotech.co.in');
        define('SETTO', 'hiren@nilayinfotech.co.in');
        define('BASE_URL', 'https://localhost/');
      
    }

   
  
    $con = mysql_connect(DBHOST,DBUSER,DBPASS)or die('server not connected'. mysql_error());
    mysql_select_db(DBNAME,$con)or die('database not connected'. mysql_error());

   
?>