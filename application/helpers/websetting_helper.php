<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function getMeta(){
    $q = "SELECT title, meta_text, meta_desc, meta_key,email,alamat,no_telp, judul_website FROM web_setting WHERE id=1";
    $data = mysql_query($q);
    return $data;
}

function getAkunWeb(){
    $q = "SELECT facebook, twitter, google_plus FROM web_setting WHERE id=1";
    $data = mysql_query($q);
    return $data;
}

function getAlamat(){
    $q = "SELECT no_telp, alamat, email FROM web_setting WHERE id=1";
    $data = mysql_query($q);
    return $data;
}

function getSetting($key){
    $CI = & get_instance();
    $q = "SELECT setting_value FROM app_setting WHERE setting_key='$key'";
    $data = $CI->db->query($q)->row();
    return $data->setting_value;
}



/* End of file websetting_helper.php */
/* Location: ./application/helpers/websetting_helper.php */