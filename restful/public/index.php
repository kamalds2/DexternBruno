<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST,PUT,OPTIONS,DELETE");
header("Access-Control-Allow-Headers:X-Requested-With, Content-Type, Accept, Origin, Authorization");
header('Access-Control-Max-Age: 1000');
header("Access-Control-Allow-Credentials: true");
(require __DIR__ . '/../config/bootstrap.php')->run();
// error_reporting(E_ALL); 
error_reporting(0);