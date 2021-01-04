<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route = array(
    'default_controller'   	=> 'login',
    '404_override'         	=> '',
    'admin/data=jabatan'    => 'admin/data/jabatan',
    'admin/appsinfo'    => 'admin/setting/info',
    'admin/data=master'    => 'admin/data/master',
    'admin/data/disable_id=(:any)'    => 'admin/data/disable/$1',
    'admin/data/enable_id=(:any)'    => 'admin/data/enable/$1',
    'admin/data/AddCS=(:any)'    => 'admin/data/AddCS/$1',
    'admin/data/DelCS=(:any)'    => 'admin/data/DelCS/$1',
    'translate_uri_dashes' 	=> FALSE
);
