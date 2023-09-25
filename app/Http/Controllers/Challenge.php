<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Challenge extends Controller
{
    public function dublicate($N = 5, $array = [2,3,1,2,3])
    {
        $collection = collect($array);
        $dublicates = $collection->duplicates();

        $result = $dublicates->toArray();

        if (empty($result)) {
            array_push($result, -1);
            return $result;
        }else{
            return $result;
        }
    }
}
