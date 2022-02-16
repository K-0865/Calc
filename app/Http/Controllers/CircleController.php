<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CircleController extends Controller
{
    public function index(Request $request){
        $in = $request->input('number');
        if(is_numeric($in)){
        $area = 3.14 * $in * $in;
        $name = "Area Circle";

        $link = mysqli_connect('localhost', 'root', '', 'network');
        $stmt = mysqli_prepare($link, "INSERT INTO results (name, result) VALUES (?, ?)");
        
        mysqli_stmt_bind_param($stmt, "ss", $name, $area);
        $result = mysqli_stmt_execute($stmt);
        
        mysqli_close($link);
        }else{
            $area = "Not Num";
        }
        return $area;
    }
}
