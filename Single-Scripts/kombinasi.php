<?php

$set = array("a","b","c","d");

echo "set"
print_r($set);
print_r(getCombinations($set,2));

function getCombinations($base,$n){

$baselen = count($base);
if($baselen == 0){
    return;
}
    if($n == 1){
        $return = array();
        foreach($base as $b){
            $return[] = array($b);
        }
        return $return;
    }else{
        $oneLevelLower = getCombinations($base,$n-1);

        $newCombs = array();

        foreach($oneLevelLower as $oll){

            $lastEl = $oll[$n-2];
            $found = false;
            foreach($base as  $key => $b){
                if($b == $lastEl){
                    $found = true;
                    continue;
                    //last element found

                }
                if($found == true){
                        //add to combinations with last element
                        if($key < $baselen){

                            $tmp = $oll;
                            $newCombination = array_slice($tmp,0);
                            $newCombination[]=$b;
                            $newCombs[] = array_slice($newCombination,0);
                        }

                }
            }

        }

    }

    return $newCombs;
}
