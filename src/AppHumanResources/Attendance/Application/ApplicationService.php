<?php

namespace Src\AppHumanResources\Attendance\Application;


class ApplicationService {

    public function groupByOwnersService($array) {

        $result = array_reduce(

            array_keys($array),

            function ($acc, $val) use ($array) {

                $owner = $array[$val];

                return array_merge_recursive($acc, [$owner => [$val]]);
            },

            []
        );

        return $result;
    }

    public function getDublicates($N, $array) {

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
