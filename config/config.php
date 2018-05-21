<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 21.05.2018
 * Time: 20:43
 */


Config::set('site_name', 'Stepachuk Site');

Config::set('routes', [
	'default' => '',
	'admin' => 'admin_'
]);

Config::set('default_route', 'default');

Config::set('default_controller', 'page');

Config::set('default_action', 'index');


Config::set('db.host', 'localhost');
Config::set('db.name', 'onix');
Config::set('db.user', 'root');
Config::set('db.password', 'Cntgfyxer1');
