<?php session_start(); 
//processs
require_once('../../../config/config.php');
require_once('../../classes/locate.class.php');
require_once('../../../include/help_function.php');

//---copy migration---------------------
$source= '../../../laravel/component/rolepermission/migrations/';
$destination ='../../../../database/migrations/';
copyr($source, $destination); 

//---copy controller---------------------
$source= '../../../laravel/component/rolepermission/controller/';
$destination ='../../../../app/Http/Controllers/';
copyr($source, $destination); 

//---copy repository---------------------
$source= '../../../laravel/component/rolepermission/repository/';
$destination ='../../../../app/Repositories/';
copyr($source, $destination); 

//---copy views---------------------
$source= '../../../laravel/component/rolepermission/views/';
$destination ='../../../../resources/views/backend/';
copyr($source, $destination); 

//---copy model---------------------
$source= '../../../laravel/component/rolepermission/model/';
$destination ='../../../../app/Model/';
copyr($source, $destination); 


// add dashboard route---------------------------
/*if(file_exists(RouteFolderPath)){
	$myfile = fopen(RouteFolderPath.'/web.php', "a") or die("Unable to open file!");

	$text = "Route::get('/dashboard','Dashboard\DashboardController@index'); \n";
	$text .= "Route::get('/logout','Dashboard\DashboardController@logout'); \n";
	fwrite($myfile, $text);
}*/

if(file_exists(RouteFolderPath)){
	$myfile = fopen(RouteFolderPath.'/web.php', "a") or die("Unable to open file!");
	$text ="/*\n|--------------------------------------------------------------------------\n";
	$text .="| Role Permission Routes\n";
	$text .="|--------------------------------------------------------------------------\n*/\n";
	fwrite($myfile, $text);
	$text = "Route::group(['prefix' => 'role-permission'], function() { \n";
	fwrite($myfile, $text);
		//for role------------------------------------
		$text = "\tRoute::group(['prefix' => 'role'],function(){\n";
		fwrite($myfile, $text);

		$text = "\t\tRoute::get('/', 'RolePermission\RolePermissionController@index');\n";
		$text .= "\t\tRoute::post('/create', 'RolePermission\RolePermissionController@createRole');\n";
		$text .= "\t\tRoute::get('/edit/{id}', 'RolePermission\RolePermissionController@editRole');\n";
		$text .= "\t\tRoute::post('/update/{id}', 'RolePermission\RolePermissionController@updateRole');\n";
		$text .= "\t\tRoute::get('/delete/{id}', 'RolePermission\RolePermissionController@deleteRole');\n";
		$text .= "\t\tRoute::post('/assignpermission', 'RolePermission\RolePermissionController@assignPermission');\n";
		
		
		fwrite($myfile, $text);

		$text = "\t});\n";
		fwrite($myfile, $text);

		//for permission---------------------
		$text = "\tRoute::group(['prefix' => 'permission'],function(){\n";
		fwrite($myfile, $text);

		$text = "\t\tRoute::get('/', 'RolePermission\RolePermissionController@index');\n";
		$text .= "\t\tRoute::post('/create', 'RolePermission\RolePermissionController@createPermission');\n";
		$text .= "\t\tRoute::get('/edit/{id}', 'RolePermission\RolePermissionController@editPermission');\n";
		$text .= "\t\tRoute::post('/update/{id}', 'RolePermission\RolePermissionController@updatePermission');\n";
		$text .= "\t\tRoute::get('/delete/{id}', 'RolePermission\RolePermissionController@deletePermission');\n";
		fwrite($myfile, $text);

		$text = "\t});\n";
		fwrite($myfile, $text);


	$text = "}); \n";
	fwrite($myfile, $text);
}

	// These two lines can be accomplished by using array_pop 
	// This will also prevent it from inserting blank lines 
	$file  = file('../../../../app/Providers/AppServiceProvider.php'); 
	array_pop($file); 
	$fp    = fopen('../../../../app/Providers/AppServiceProvider.php','w'); 
	fwrite($fp, implode('',$file)); 
	fclose($fp);


	$myfile = fopen('../../../../app/Providers/AppServiceProvider.php', 'a'); 
	/*public function registerCategoryRepo() {
        return $this->app->bind(
            'App\\Repositories\\Category\\CategoryRepository',
            'App\\Repositories\\Category\\EloquentCategory'
            );
    }*/
	$text = "\n\tpublic function registerRolePermissionRepository() {\n";
	$text .= "\t\treturn $"."this->app->bind(\n";
	fwrite($myfile, $text);

	$text = "\t\t\t'App\\" . "\Repositories\\"."\\"."RolePermission"."\\" . "\\"."RolePermission"."Repository',\n"; 
	$text .= "\t\t\t'App\\" . "\Repositories\\"."\\"."RolePermission"."\\" . "\Eloquent"."RolePermission"."'"; 
	fwrite($myfile, $text);

	$text = "\n\t\t);\n\t}\n}";
	fwrite($myfile, $text); 

	//now add component menu--------------------------
	$myfile = fopen('../../../../resources/views/backend/layouts/component_menu.blade.php', 'a'); 
	
	$text = "\n<li><a href=\"{{url('/role-permission/role')}}\"><i class=\"fa fa-circle-o\"></i>RolePermission</a></li>\n";
	fwrite($myfile, $text); 

//new Locate('../../../index.php?menu=adminlte&action=create&success=yes&message=AdminLTE is integrated ');