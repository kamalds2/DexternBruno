<?php
// This is the main Web application configuration file
define('ENVIRONMENT', 'development');
define('VERSION', '1.0');
define('MAINURL', $_SERVER['DOCUMENT_ROOT']."/DexternBruno/");
define("SITEURL", "http://" . $_SERVER['HTTP_HOST'] . '/DexternBruno/');
define("URL", "http://" . $_SERVER['HTTP_HOST'] . str_replace("index.php/", "", $_SERVER['REQUEST_URI']));
define('BASE', $_SERVER['DOCUMENT_ROOT']."/DexternBruno/");
define("RESTURL","http://" . $_SERVER['HTTP_HOST'] . '/DexternBruno/'."restful/");
define('PATH', "http://" . $_SERVER['HTTP_HOST'] ."/DexternBruno/");
define('REALPATH', str_replace("index.php", "", realpath('index.php')));
define('UPLOADPATH', REALPATH.'uploads/');
define('UPLOADURL', SITEURL.'uploads/');
define("THEMEURL", SITEURL."views/basic/");
define("THEMEDIR", BASE."views/basic/");
define("CONTROLLERSDIR", BASE."controllers/");
define("MODELSDIR", BASE."models/");
define("LIBS", BASE."libs/"); 
define("CORE", BASE."core/");
define("VIEWSDIR", BASE."views/");
define("PLUGINSDIR", BASE."plugins/");
define("MODULESDIR", BASE."modules/");
define("SALT", "B9S4N8A7S3R9C3V9S5I7R3I9"); //don't change salt key
define("PASSKEY","SS1623FAIL"); //don't change key
define("TIMEZONE", "Asia/Calcutta");
define("DEFAULTCONTROLLER", "index");
// define("INSTALLDIR", "/install/");
define("DIRECT", true);
define("SITEEMAIL","info@siriinnovations.com"); //don't change key
define("RESTAPYKEY","cde2df70369703fa8068f03fc15475cea516af26c3c7a68af61529f7235f7113");

/*
 * Database connections
 * 
 */
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "pickdata_dextern_bruno");
define("DB_PORT", "3306");
define("DB_DRIVER", "pdo");
define("DB_PREFIX", "tbl_");
define("DBPREFIX", "tbl");
define("DB_PCONNECT", TRUE);
define("DB_DEBUG", TRUE);
define("DB_CACHEON", FALSE);
define("DB_CHACHEDIR", "");
define("DB_CHARSET", "utf8");
define("DB_COLLAT", "utf8_general_ci");
define("DB_SWAPPRE", "B9S4N8A7S3R9C3V9S5I7R3I9");
define("DB_AUTOINIT", TRUE);
define("DB_STRCTON", FALSE);
?>