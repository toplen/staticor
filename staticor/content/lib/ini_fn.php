<?php
require_once ("ini_manager.php");

function echoLan($section, $entry){
	

	echo getLan($section, $entry);
}
function getLan($section , $entry){
	if(isset($_SESSION['lan'])){
		$lanfile=$_SERVER['DOCUMENT_ROOT']."/lan/".$_SESSION['lan'].".ini";
	}
	else $lanfile=$_SERVER['DOCUMENT_ROOT']."/lan/".get_params_ini('version', 'lan', $_SERVER['DOCUMENT_ROOT'].'/version.ini').".ini";
	
	return get_params_ini($section, $entry, $lanfile);
}


function get_params_ini($section, $entry, $ini_path) {	
	$iniMANAGER = new ini_manager ();
	$entry_val = $iniMANAGER->get_entry ( $ini_path, $section, $entry );
	
	return special_chars_out ( $entry_val );
}
function get_params_ini_inter($section, $entry, $ini_path) {
	$iniMANAGER = new ini_manager ();
	$entry_val = $iniMANAGER->get_entry ( $ini_path, $section, $entry );
	
	return special_chars_out ( $entry_val );
}
function set_params_ini($section, $entry, $entry_val, $ini_path) {
	
	$iniMANAGER = new ini_manager ();	
	$entry_val = special_chars_in ( $entry_val );	
	$iniMANAGER->add_entry ( $ini_path, $section, $entry, $entry_val );
	
}
function set_params_ini_inter($section, $entry, $entry_val, $ini_path) {
	$iniMANAGER = new ini_manager ();
	
	$entry_val = special_chars_in ( $entry_val );
	
	$iniMANAGER->add_entry ( $ini_path, $section, $entry, $entry_val );
}
function delete_entry_ini($section, $entry, $ini_path) {
	$iniMANAGER = new ini_manager ();
	$iniMANAGER->parse_ini_file ( $ini_path );
	$iniMANAGER->delete_entry ( $ini_path, $section, $entry );
}
function delete_key($ini_path, $KEYname) {
	$iniMANAGER = new ini_manager ();
	$iniMANAGER->parse_ini_file ( $ini_path );
	$iniMANAGER->delete_key ( $ini_path, $KEYname );
}
function delete_all_keys($ini_path) {
	$iniMANAGER = new ini_manager ();
	$iniMANAGER->parse_ini_file ( $ini_path );
	$iniMANAGER->delete_all_keys ( $ini_path );
}
function special_chars_in($str) {
	$str = str_replace ( "'", "\'", $str );
	
	return $str;
}
function special_chars_out($str) {
	$str = str_replace ( "\'", "'", $str );
	
	return $str;
}

?>
