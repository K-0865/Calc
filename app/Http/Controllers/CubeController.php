<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CubeController extends Controller
{
    public function index(Request $request){
        
        $in = $request->input('number');
        if(is_numeric($in)){

        $cube = $in * $in *$in;
        $name = "Cube";
        //$link = mysqli_connect('localhost', 'root', '', 'network');
        //$stmt = mysqli_prepare($link, "INSERT INTO results (name, result) VALUES (?, ?)");
        $link = mysqli_connect('mysql57.tcagame01.sakura.ne.jp', 'tcagame01', 'tcagame2021', 'tcagame01_20j70012');
        $stmt = mysqli_prepare($link, "INSERT INTO calculation_results (name, result) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $name, $cube);
        $result = mysqli_stmt_execute($stmt);
        
        mysqli_close($link);
        }else{
            $cube = "Not Num";
        }
        return $cube;
    }
}
