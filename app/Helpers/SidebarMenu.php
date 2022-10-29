<?php

namespace App\Helpers;
use Request;
use Session;
use App\Models\Menu;


class SidebarMenu
{
    public static function get_menu(){
        $categories = Menu::where('menus.parent_id', 0)
        ->leftjoin('menu_users','menu_users.menu_id','menus.menu_id')
        ->where('menu_users.id_user', Session::get('id_user'))
        ->orderBy('menus.menu_id','ASC')->get();

        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->sub = \SidebarMenu::get_sub_menu($p_cat->menu_id);
            $i++;
        }
        return $categories;
    }

    public static function get_sub_menu($id){

        $categories = Menu::where('menus.parent_id', $id)
        ->leftjoin('menu_users','menu_users.menu_id','menus.menu_id')
        ->where('menu_users.id_user', Session::get('id_user'))
        ->orderBy('menus.menu_id','ASC')->get();

        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->sub = \SidebarMenu::get_sub_menu($p_cat->menu_id);
            $i++;
        }
        return $categories;       
    }


}