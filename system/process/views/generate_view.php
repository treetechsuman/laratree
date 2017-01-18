<?php session_start(); 
//processs
require_once('../../../config/config.php');
require_once('../../classes/locate.class.php');

//echo MigrationFolderPath .'<br>';
//rtrim($string, ",")
//$_SESSION['repository']= $_POST['repository'];
$_SESSION['viewfolder']= $_POST['viewfolder'];
$views = $_POST['views'];
$controller = $_POST['controller'];

if (!file_exists(ViewFolderPath.'/'.lcfirst($_POST['viewfolder']))) {
    mkdir(ViewFolderPath.'/'.lcfirst($_POST['viewfolder']), 0777, true);
}
foreach ($views as $view) {
		//mkdir(ViewFolderPath.'/'.lcfirst($_POST['viewfolder'].'/'.$view), 0777, true);
		$myfile = fopen(ViewFolderPath.'/'.lcfirst($_POST['viewfolder']).'/'.$view.'.blade.php', "w") or die("Unable to open file!");
		$text = "this is ".$view." \n";
		fwrite($myfile, $text);
}
if(file_exists(RouteFolderPath)&&isset($controller)){
	$myfile = fopen(RouteFolderPath.'/web.php', "a") or die("Unable to open file!");
	$controller_prefix = substr($controller, 0, -14);
	$text = "Route::group(['prefix' => '".lcfirst($controller_prefix)."'], function() { \n";
	fwrite($myfile, $text);

		$text = "\tRoute::get('/','".ucfirst($controller_prefix)."\\" .substr($controller, 0, -4). "@index');\n";
		$text .= "\tRoute::get('/create','".ucfirst($controller_prefix)."\\" .substr($controller, 0, -4). "@create');\n";
		$text .= "\tRoute::post('/store','".ucfirst($controller_prefix)."\\" .substr($controller, 0, -4). "@store');\n";
		$text .= "\tRoute::get('{id}/eidt','".ucfirst($controller_prefix)."\\" .substr($controller, 0, -4). "@edit');\n";
		$text .= "\tRoute::post('/update/{id}','".ucfirst($controller_prefix)."\\" .substr($controller, 0, -4). "@update');\n";
		$text .= "\tRoute::post('/delete/{id}','".ucfirst($controller_prefix)."\\" .substr($controller, 0, -4). "@distory');\n";
		
		fwrite($myfile, $text);


	$text = "}); \n";
	fwrite($myfile, $text);
}

new Locate('../../../index.php?menu=views&action=create&success=yes&message=views is created ');
	



?>