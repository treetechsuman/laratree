<?php //session_start(); processs
require_once('../../../config/config.php');
require_once('../../classes/locate.class.php');

//echo MigrationFolderPath .'<br>';

$file_name = date("Y").'_'.date("m").'_'.date("d").'_create_'.$_POST['table_name']. '_table.php';
//echo $file_name;
$myfile = fopen(MigrationFolderPath.$file_name, "w") or die("Unable to open file!");

if(fopen(MigrationFolderPath.$file_name, "w")){
	$text = "<?php \n\n";
	fwrite($myfile, $text);

	$text = "use Illuminate\Database\Migrations\Migration;\n";
	$text .= "use Illuminate\Database\Schema\Blueprint;\n";
	$text .= "use Illuminate\Support\Facades\Schema;\n\n";
	fwrite($myfile, $text);

	$text = "class CreateUsersTable extends Migration {\n";
	$text .= "\t/**\n\t* Run the migrations.\n\t*\n\t* @return void\n\t*/";
	fwrite($myfile, $text);

	$text = "\n\tpublic function up() {";
	$text .= "\n\t\tSchema::create('" .$_POST['table_name']. "', function (Blueprint $" . "table) {";
	fwrite($myfile, $text);
	//-----------------------------------actual process goes here-------------
		$text = "\n\t\t\t$" . "table->increments('id');";
		fwrite($myfile, $text);

		for($i=0;$i<$_POST['no_of_fields'];$i++){
			if($_POST['type'][$i]=='enum'){
				$text = "\n\t\t\t$" . "table->".$_POST['type'][$i]."('" . $_POST['field_name'][$i] ."'['value1','value2']);";
			}else{
				$text = "\n\t\t\t$" . "table->".$_POST['type'][$i]."('" . $_POST['field_name'][$i] ."');";
			}
			fwrite($myfile, $text);
		}


		//$text = "\n\t\t\t$" . "table->rememberToken();";
		$text = "\n\t\t\t$" . "table->timestamps();";
		fwrite($myfile, $text);

	//-------------------------------------------------------------------------
	$text = "\n\t\t});\n\t}";
	fwrite($myfile, $text);


	$text = "\n\t/**\n\t* Run the migrations.\n\t*\n\t* @return void\n\t*/";
	fwrite($myfile, $text);

	$text = "\n\tpublic function down() {";
	$text .= "\n\t\tSchema::drop('" .$_POST['table_name']. "');\n\t}\n}";
	fwrite($myfile, $text);
	new Locate('../../../index.php?menu=migration&action=create&success=yes&message=' .$_POST['table_name'] . ' migration is created ');
}else{
new Locate('../../../index.php?menu=migration&action=create&success=no&message=' . $_POST['table_name'] . ' migration is created ');
}


?>
