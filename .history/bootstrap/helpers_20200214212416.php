<?php

function keyGen($model)
{
    
    $day = array(
        "01" => "1","02" => "2","03" => "3","04" => "4","05" => "5","06" => "6","07" => "7","08" => "8","09" => "9","10" => "A","11" => "B","12" => "C","13" => "D","14" => "E","15" => "F","16" => "G","17" => "H","18" => "I","19" => "J","20" => "K","21" => "L","22" => "M","23" => "N","24" => "O","25" => "P","26" => "Q","27" => "R","28" => "S","29" => "T","30" => "U","31" => "V",
    );
    $month = array(
        "01" => "1","02" => "2","03" => "3","04" => "4","05" => "5","06" => "6","07" => "7","08" => "8","09" => "9","10" => "A","11" => "B","12"=>"C"
    );
    $year = date('y');
    
    $date = $day[date('d')].$month[date('m')].$year;
    $alias = $model::Alias;

    if($model::all()->count() != 0)
    {
        $last_row = $model::latest()->first();
        return $last_row;
        $last_serial = explode("_",$last_row[$model::PK]);
        $increament = intval($last_serial[2]) + 1;
        $serial = str_pad($increament   , 4, 0, STR_PAD_LEFT);
    }
    else{
        $serial = "0000";
    }
    
    $key = $date."_".$alias."_".$serial;
    return $key;
}

function reference($model)
{
    if($model::all()->count() != 0)
    {
        $last_row = $model::latest()->first();
        return $last_row[$model::Ref];
    }
    else
    {
        return "Enter Reference No.";
    }
}