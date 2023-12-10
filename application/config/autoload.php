<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

/*$autoload['libraries'] = array('cart', 'upload', 'encrypt','My_Encrypt', 'encryption', 'database', 'session', 'email', 'form_validation', 'pagination', 'pdf'); */

$autoload['libraries'] = array('cart', 'upload', 'encryption', 'database', 'session', 'email', 'form_validation', 'pagination', 'pdf'); 

$autoload['drivers'] = array();

$autoload['helper'] = array('cookie', 'date','email', 'url', 'file', 'form', 'html', 'text', 'array', 'captcha', 'url_helper', 'assets_helper', 'date');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('control/auth_user');
