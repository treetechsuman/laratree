<?php

/**
 class is to connect with the database
*/
requre_once('config/config.php');

class Connection{

	private $user;
	private $cpassword;
	private $host;
	private $db;

	public $sql;
	public $res;
	public $error;
	public $affRows;
	public $numRows;
	public $data = array(); // blank array

	public $conxn;

	/* setters */
	public function setUser($ur = ''){
		$this->user = $ur;
	}

	public function setCpassword($pd = '' ){
		$this->cpassword = $pd;
	}

	public function setHost($ht = ''){
		$this->host = $ht;
	}

	public function setDB($db = ''){
		$this->db = $db;
	}
//$h = 'localhost', $u = 'itucnac_site', $p = 'HswldUQN*{Ji', $db = 'itucnac_site'
//$h = 'localhost',  $u = 'root', $p = '', $db = 'db_bedc'
	public function __construct($h = Host,  $u = Root, $p = Password, $db = Db){
	
	$this->conxn=mysqli_connect($h, $u, $p, $db)
				or trigger_error($this->error = mysqli_error($this->conxn));
	
//echo "<br /> The database is ready to serve! ";	
	}
	
	public function close(){
	mysqli_close($this->conxn);
	//echo "<br /> The connection is closed";	
	}
	public function get_table_name_list(){
		
		$this->sql = "show tables";
		$this->res = mysqli_query ( $this->conxn, $this->sql ) or trigger_error ( $this->error = mysqli_error ( $this->conxn ) );
		$this->numRows = mysqli_num_rows ( $this->res );
		$this->data = array ();
		if ($this->numRows > 0) {
			while ( $this->row = mysqli_fetch_object ( $this->res ) ) {
				array_push ( $this->data, $this->row );
			} // while ends
		} // if ends
		return $this->data;
		return($table);
	}
	
	public function get_table_fields_name( $table){
		//this block find number of fields of table in database------------------------------------------------------
		$this->sql = "SELECT * FROM " . $table . "";
		$this->res = mysqli_query ( $this->conxn, $this->sql ) or die ( $this->error = mysqli_error ( $this->conxn ) );
		$fieldcount=mysqli_num_fields($this->res);
		$field = mysqli_fetch_fields($this->res);
		return $field;
		
		
		
	}//function ends
}//class ends
?>