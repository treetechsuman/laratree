<?php session_start(); 
//processs
require_once('../../../config/config.php');
require_once('../../classes/locate.class.php');
require_once('../../../include/help_function.php');

//---copy layout to resource folder of laravel project for adminlte---------------------
$source= '../../../laravel/backendthemes/';
$destination ='../../../../public/';
copyr($source, $destination); 
//---copy layout to resource folder of laravel project for adminlte---------------------

//---copy layout to resource folder of laravel project for app---------------------
$source= '../../../laravel/resources/backend/';
$destination ='../../../../resources/views/';
copyr($source, $destination); 
//---copy layout to resource folder of laravel project for app---------------------

//---copy layout to resource folder of laravel project for auth ---------------------
$source= '../../../laravel/resources/views/';
$destination ='../../../../resources/views/';
copyr($source, $destination); 
//---copy layout to resource folder of laravel project for autn---------------------

//now create dashboard controller---------------------
////create another folder in side Repositories----
if (!file_exists(ControllerFolderPath.'Dashboard')) {
    mkdir(ControllerFolderPath.'Dashboard', 0777, true);
}
$myfile = fopen(ControllerFolderPath.'Dashboard'.'/DashboardController.php', "w") or die("Unable to open file!");

if(fopen(ControllerFolderPath.'Dashboard'.'/DashboardController.php', "w")){
	$text = "<?php \n\n";
	fwrite($myfile, $text);
//namespace App\Http\Controllers\Product;
	$text = "namespace App\Http\Controllers\Dashboard;\n\n";
	fwrite($myfile, $text);

	$text = "use Illuminate\Http\Request;\n";
	$text .= "use App\Http\Controllers\Controller;\n";
	$text .="use Illuminate\Support\Facades\Auth;\n";
	$text .="use Illuminate\Support\Facades\Session;\n";
	fwrite($myfile, $text);
	
	$text = "class DashboardController extends Controller{\n";
	fwrite($myfile, $text);
	
	$text = "\n\tpublic function __construct(){\n";
	fwrite($myfile, $text);
		
	$text = "\t\t$" . "this->middleware('auth');\n";
	fwrite($myfile, $text);

	$text = "\t}\n";
	fwrite($myfile, $text);

	$text = "\n\tpublic function index(){\n";
	$text .= "\t\treturn view('backend.dashboard.dashboard');\n";
	$text .= "\t}\n";
	fwrite($myfile, $text);

	$text = "\n\tpublic function logout(){\n";
	$text .= "\t\tAuth::logout();\n";
	$text .= "\t\tSession::flush();\n";
	$text .= "\t\treturn redirect('/login');\n";
	$text .= "\t}\n";
	fwrite($myfile, $text);


	$text ="\n}";
	fwrite($myfile, $text);
}
// add dashboard route---------------------------
if(file_exists(RouteFolderPath)){
	$myfile = fopen(RouteFolderPath.'/web.php', "a") or die("Unable to open file!");

	$text = "Route::get('/dashboard','Dashboard\DashboardController@index'); \n";
	$text .= "Route::get('/logout','Dashboard\DashboardController@logout'); \n";
	fwrite($myfile, $text);
}

//new Locate('../../../index.php?menu=adminlte&action=create&success=yes&message=AdminLTE is integrated ');
