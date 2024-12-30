<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pac extends Controller
{
    public function abc($a,$b,$c)
    {
        return view ('practice',['a'=>$a,'b'=>$b,'c'=>$c]);
        
        // return "<h1>Poro na kno : ".$a." ".$b." ".$c."</h1>";
        
    }
}


