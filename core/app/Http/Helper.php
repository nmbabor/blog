<?php

function primaryInfo(){
    return \App\Models\PrimaryInfo::first();
}
function menus(){
   return \App\Models\Menu::where('status',1)->orderBy('serial_num','ASC')->get();
}
function socialLinks(){
   return \App\Models\SocialLink::where('status',1)->get();
}

