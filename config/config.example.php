<?php
//app configuration -----------
define("appName", "laraTree");

//testing
//database configuration -------
define("AppName", "laraTree");
define("Host", "localhost");
define("Db", "");
define("User", "");
define("Password", "");

//for process---------------------------------------
define("MigrationFolderPath", "../../../../database/migrations/");
define("ModelFolderPath", "../../../../app/Model/");
define("RepositoryFolderPath", "../../../../app/Repositories/");

//for views-----------------------------------------
define("MigrationFolderPathForView", "../database/migrations/");
define("ModelFolderPathForView", "../app/Model/");
define("RepositoryFolderPathForView", "../app/Repositories");


$_SESSION['Host'] = 'localhost';
$_SESSION['Db'] = '';
$_SESSION['User'] = 'root';
$_SESSION['Password'] = '';


//create model folder----
if(!file_exists('../app/Model')) {
	mkdir('../app/Model', 0777, true);
}

?>