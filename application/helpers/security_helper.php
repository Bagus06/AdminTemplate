<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

if ( ! function_exists('checkPermission'))
{
    function checkPermission($link='', $id='')
    {
        $check = FALSE;
        $CI =& get_instance();
        $CI->db->select('id');
        $getLink = $CI->db->get_where('link', ['link'=>$link])->row_array();

        $CI->db->select('permission.group');
        $CI->db->from('user');
        $CI->db->join('permission', 'permission.id=user.permission_id');
        $CI->db->where('user.id', $id);
        $getPermission = $CI->db->get()->row_array();

        if (!empty($getPermission['group'])) {
            if (in_array($getLink['id'], @json_decode($getPermission['group']))) {
                $check = TRUE;
            }
        }

        return $check;
    }
}

function encrypt_url($string) {

    $output = false;
    /*
    * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
    */        
    $security       = parse_ini_file("security.ini");
    $secret_key     = $security["encryption_key"];
    $secret_iv      = $security["iv"];
    $encrypt_method = $security["encryption_mechanism"];

    // hash
    $key    = hash("sha256", $secret_key);

    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
    $iv     = substr(hash("sha256", $secret_iv), 0, 16);

    //do the encryption given text/string/number
    $result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($result);
    return $output;
}



function decrypt_url($string) {

    $output = false;
    /*
    * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
    */

    $security       = parse_ini_file("security.ini");
    $secret_key     = $security["encryption_key"];
    $secret_iv      = $security["iv"];
    $encrypt_method = $security["encryption_mechanism"];

    // hash
    $key    = hash("sha256", $secret_key);

    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
    $iv = substr(hash("sha256", $secret_iv), 0, 16);

    //do the decryption given text/string/number

    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    return $output;
}