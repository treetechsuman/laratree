<?php session_start(); 
//processs
require_once('../../../config/config.php');
require_once('../../classes/locate.class.php');

//echo MigrationFolderPath .'<br>';
//rtrim($string, ",")
$_SESSION['repository']= $_POST['repository'];
$_SESSION['controller']= $_POST['controller'];
$repositories = $_POST['repository'];
$file_name = ucfirst($_POST['controller']).'Controller.php';
//create Repositories folder inside app
if (!file_exists(ControllerFolderPath)) {
    mkdir(ControllerFolderPath, 0777, true);
}
//create another folder in side Repositories----
if (!file_exists(ControllerFolderPath.ucfirst($_POST['controller']))) {
    mkdir(ControllerFolderPath.ucfirst($_POST['controller']), 0777, true);
}
$myfile = fopen(ControllerFolderPath.$_POST['controller'].'/'.$file_name, "w") or die("Unable to open file!");

if(fopen(ControllerFolderPath.$_POST['controller'].'/'.$file_name, "w")){
	$text = "<?php \n";
	fwrite($myfile, $text);
//namespace App\Http\Controllers\Product;
	$text = "namespace App\Http\Controllers\\". ucfirst($_POST['controller']).";\n\n";
	fwrite($myfile, $text);

	$text = "use Illuminate\Http\Request;\n";
	$text .= "use App\Http\Controllers\Controller;\n";
	fwrite($myfile, $text);
	foreach ($repositories as $repository) {
		$repository = substr($repository, 0, -4);
		$folder = substr($repository, 0, -10);
		$text = "use App\Repositories\\".ucfirst($folder)."\\" .ucfirst($repository).";\n";
		fwrite($myfile, $text);

	}

	
}


//new Locate('../../../index.php?menu=repository&action=create&success=yes&message=' .$_POST['repository'] . ' Repository and Eloquent is created ');
	




?>
