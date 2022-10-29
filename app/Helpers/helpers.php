<?php 

namespace App\Http\Controllers;

use App\Models\Menu;

function Menu(){
	$menu = \App\Models\Menu::where('parent_id', 0)->orderBy('create_date', 'DESC')->get();
	return $menu;
}

function Menu_child( $id ){
	
	return Menu::where('parent_id', $id )->orderBy('create_date', 'DESC')->get();
}

function test(){
	return 'test';
}