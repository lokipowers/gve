<?php

function parse_condition($condition){
    // match {a} {condition} {b}

    preg_match('/.*(.*?)\s(.*?)\s(.*?)/sU', $condition, $condition_matches);

    // condition_matches[1] will be a, remove $, () and leading/tailing spaces
    $a = trim(str_replace(array('$','()'),'',$condition_matches[1]));

    // condition_matches[2] will be the operator
    $operator = $condition_matches[2];

    // condition_matches[3] will be b, remove $, () and leading/tailing spaces
    $b = trim(str_replace(array('$','()'),'',$condition_matches[3]));


    // It is advisable to pass variables into array or a "hive"
    // but in this example, let's just use global

    // Make variable's variable $$a accessible
    global $$a;
    // And for $$b too
    global $$b;

    $cmp1 = isset($$a)?($$a):($a);

    $cmp2 = isset($$b)?($$b):($b);

    switch($operator){
        case '==':
            return($cmp1 == $cmp2);
            break;
        case '!=':
            return($cmp1 != $cmp2);
            break;
        case '===':
            return($cmp1 === $cmp2);
            break;
        case '!==':
            return($cmp1 !== $cmp2);
            break;
        default:
            return false;
            break;
    }
}
