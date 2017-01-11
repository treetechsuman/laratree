<?php //session_start();

//determine the menu and action
$menu = isset($_GET['menu']) ? $_GET['menu'] : '';
$_SESSION['menu']=$menu;
//$submenu = isset($_GET['submenu']) ? $_GET['submenu'] : '';
//echo $menu;
$action = isset($_GET['action']) ? $_GET['action'] : '';
switch($menu){
	case '':
		$page_to_load = "views/home.php";
	break;
	case 'home':
		$page_to_load = "views/home.php";
	break;
	case 'migration':
	if($action == 'create'){
		$page_to_load = "views/create_migration.php";
	}elseif($action== 'read'){
		//$page_to_load = "views/read_file.php";
	}elseif($action== 'delete'){
		//$page_to_load = "system/process/migration/.php";
	}else{
		//$page_to_load = "views/welcome.php";
	}
	break;
	case 'file':
	if($action == 'read'){
		$page_to_load = "views/read_file.php";
	}elseif($action== 'read'){
		//$page_to_load = "views/read_file.php";
	}elseif($action== 'delete'){
		//$page_to_load = "system/process/migration/.php";
	}else{
		//$page_to_load = "views/welcome.php";
	}
	break;
		case 'repository':
	if($action == 'create'){
		$page_to_load = "views/create_repository.php";
	}elseif($action== 'push_to_session'){
		//$page_to_load = "views/edit_customer.php";
	}elseif($action== 'delete'){
		//$page_to_load = "system/process/migration/.php";
	}else{
		//$page_to_load = "views/welcome.php";
	}
	break;
	default:
		$page_to_load = "views/not_found.php";
	break;
	
}