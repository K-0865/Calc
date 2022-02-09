<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SquaredController extends Controller
{
    public function index(Request $request){
        
        $name = "Squared";
        $in = $request->input('number');
        if(is_numeric($in)){

        $result_in = $in * $in;
        $link = mysqli_connect('localhost', 'root', '', 'network');
        $stmt = mysqli_prepare($link, "INSERT INTO results (name, result) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $name, $result_in);
        $result = mysqli_stmt_execute($stmt);
        
        mysqli_close($link);
        }else{
            $result_in = "Not Num";
        }
        return $result_in;
    }
}
