<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//$config['base_url'] = ((!empty($_SERVER['SERVER_ADDR'])) ? $_SERVER['SERVER_ADDR'].':8080' : 'http://localhost').'/bioluxoptical/';

//$config['base_url'] = 'http://'.$_SERVER['SERVER_ADDR'].':80/bioluxoptical/';
$config['base_url'] = 'http://localhost/bioluxoptical/';

$config['index_page'] = '';


$config['uri_protocol']	= 'REQUEST_URI';


$config['url_suffix'] = '.html';


$config['language']	= 'french';


$config['charset'] = 'UTF-8';


$config['enable_hooks'] = FALSE;


$config['subclass_prefix'] = 'MY_';


$config['composer_autoload'] = FALSE;


$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';


$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';


$config['allow_get_array'] = TRUE;


$config['log_threshold'] = 0;


$config['log_path'] = '';


$config['log_file_extension'] = '';


$config['log_file_permissions'] = 0644;


$config['log_date_format'] = 'd-m-Y H:i:s';


$config['error_views_path'] = '';


$config['cache_path'] = '';


$config['cache_query_string'] = FALSE;


$config['encryption_key'] = 'encryption_key-bioluxoptical.2000';


$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'bo_session';
$config['sess_expiration'] = 9600;
$config['sess_save_path'] = NULL;
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;


//    La valeur TRUE permet d'utiliser la base de données
$config['sess_use_database'] = TRUE;

//    Le nom de la table
$config['sess_table_name'] = 'bioluxoptical_sessions';


$config['cookie_prefix']	= 'depuis:2000!bioluxoptical@votre-serviteur';
$config['cookie_domain']	= '';
$config['cookie_path']		= '/';
$config['cookie_secure']	= FALSE;
$config['cookie_httponly'] 	= FALSE;


$config['standardize_newlines'] = FALSE;


$config['global_xss_filtering'] = TRUE;


$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();


$config['compress_output'] = FALSE;


$config['time_reference'] = 'local';


$config['rewrite_short_tags'] = TRUE;


$config['proxy_ips'] = '';


// Inclusions pour envois par email

$config['newline'] = "\r\n";

$config['protocol'] = 'smtp';

$config['smtp_host'] = 'ssl://smtp.gmail.com'; //Change for your specific needs

$config['smtp_port'] = 25; // old : 475;  smtp_port = 25

$config['smtp_user'] = 'mbouchebomdaulriche@gmail.com'; //Change for your specific needs

$config['smtp_pass'] = 'Informatique@98'; //Change for your specific needsx

$config['mailtype'] = 'html';

$config['wordwrap'] = TRUE;

/*
$config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';*/