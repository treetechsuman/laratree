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
		$text ="@extends('backend.layouts.app')\n";
		$text .="@section('title')\n";
			$text .="\t".$view."\n";
		$text .="@endsection\n";
		$text .="@section('site_map')\n";
			$text .="\t".$view."\n";
		$text .="@endsection\n";
		$text .="@section('content')\n";
			$text .="\t<div class=\"row\">\n";
				$text .="\t\t<div class=\"col-md-6\">\n";
					$text .="\t\t\t<div class=\"box box-primary\">\n";
						$text .="\t\t\t\t<div class=\"box-body\">\n";
							$text .= "\t\t\t\t\tthis is ".$view." \n";
						$text .="\t\t\t\t</div>\n";
					$text .="\t\t\t</div>\n";
				$text .="\t\t</div>\n";
			$text .="\t</div>\n";
		$text .="@endsection\n";
		
		fwrite($myfile, $text);
}
if(file_exists(RouteFolderPath)&&isset($controller)){
	$myfile = fopen(RouteFolderPath.'/web.php', "a") or die("Unable to open file!");
	$controller_prefix = substr($controller, 0, -14);
	$text ="/*\n|--------------------------------------------------------------------------\n";
	$text .="| ".ucfirst($controller_prefix)." Routes\n";
	$text .="|--------------------------------------------------------------------------\n*/\n";
	fwrite($myfile, $text);
	$text = "Route::group(['prefix' => '".lcfirst($controller_prefix)."'], function() { \n";
	fwrite($myfile, $text);

		$text = "\tRoute::get('/','".ucfirst($controller_prefix)."\\" .substr($controller, 0, -4). "@index');\n";
		$text .= "\tRoute::get('/create','".ucfirst($controller_prefix)."\\" .substr($controller, 0, -4). "@create');\n";
		$text .= "\tRoute::post('/store','".ucfirst($controller_prefix)."\\" .substr($controller, 0, -4). "@store');\n";
		$text .= "\tRoute::get('/{id}/edit','".ucfirst($controller_prefix)."\\" .substr($controller, 0, -4). "@edit');\n";
		$text .= "\tRoute::get('/{id}','".ucfirst($controller_prefix)."\\" .substr($controller, 0, -4). "@show');\n";
		$text .= "\tRoute::post('/update/{id}','".ucfirst($controller_prefix)."\\" .substr($controller, 0, -4). "@update');\n";
		$text .= "\tRoute::get('/delete/{id}','".ucfirst($controller_prefix)."\\" .substr($controller, 0, -4). "@distory');\n";
		
		fwrite($myfile, $text);


	$text = "}); \n";
	fwrite($myfile, $text);
}
//now add  menu--------------------------
	$myfile = fopen('../../../../resources/views/backend/layouts/generated_menu.blade.php', 'a'); 
	
	$text = "\n<li class=\"treeview\">\n";
	$text .= "\t<a href=\"{{url('/".lcfirst($controller_prefix)."')}}\">\n";
	$text .= "\t\t<i class=\"fa fa-dashboard\"></i> <span>".ucfirst($controller_prefix)."</span>\n";
	$text .= "\t</a>\n";
	$text .= "</li>\n";
	fwrite($myfile, $text); 

new Locate('../../../index.php?menu=views&action=create&success=yes&message=views is created ');
	
?>