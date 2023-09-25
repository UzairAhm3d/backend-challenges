<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\AppHumanResources\Attendance\Application\ApplicationService;

class Challenge extends Controller
{
    public function dublicate($N = 5, $array = [2,3,1,2,3])
    {
        return (new ApplicationService())->getDublicates($N, $array);
    }

    function groupBy() {

        $array = [
            "insurance.txt" => "Company A",
            "letter.docx" => "Company A",
            "Contract.docx" => "Company B"
        ];

        return (new ApplicationService())->groupByOwnersService($array);
    }
}
