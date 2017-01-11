<?php
//app configuration -----------
define("AppName", "laraTree");

//database configuration -------
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


//create Model folder----
if(!file_exists('../app/Model')) {
	mkdir('../app/Model', 0777, true);
}

?>