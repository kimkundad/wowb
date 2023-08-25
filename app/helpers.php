<?php

use Illuminate\Support\Facades\DB;
use App\Models\setting;


function get_title_facebook(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->facebook_title;
}

function get_facebook_detail(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->facebook_detail;
}

function get_line_url(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->line_oa_url;
}

function get_banner_img(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->banner_his;
}

function get_banner_url(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->google_analytic;
}

function get_facebook_img(){
    $id = 1;
    $objs = setting::find($id);
    return url('media/').'/'.$objs->facebook_image;
}
function get_user_online(){
    $id = 1;
    $objs = setting::find($id);
    return number_format($objs->twitter);
}

function formatDateThat($strDate)
{
    $strYear = date("Y",strtotime($strDate));
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","January","February","March","April","May","June","July","August","September","October","November","December");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear ";
}
