<?php

use App\Models\metadata;

function get_meta_value($meta_key)
{
    $data = metadata::where('meta_key', $meta_key)->first();
    if ($data){
        return $data->meta_value;
    }
}

function set_about_name($name)
{
    $arr = explode(" ", $name);
    $lastname = end($arr);
    $lnColor = "<span class='text-primary'>$lastname</span>";
    array_pop($arr);
    $firstname = implode(" ", $arr);
    return $firstname. " ". $lnColor;
}

function set_list_award($isi)
{
    $isi = str_replace("<ul>", '<ul class="fa-ul mb-0">' , $isi);
    $list_award = str_replace("<li>", '<li><span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>' , $isi);
    return $list_award;
}

function set_list_workflow($isi)
{
    $isi = str_replace("<ul>", '<ul class="fa-ul mb-0">' , $isi);
    $list_workflow = str_replace("<li>", '<li><span class="fa-li"><i class="fas fa-check"></i></span>' , $isi);
    return $list_workflow;
}