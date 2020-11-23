<?php

    header('Content-Type: application/json');

    $query = strtolower($_REQUEST['query']);

    require_once('functions.php');

    $ret = [];
    if (strlen($query) < 1) $ret = get_topics();
    else $ret = search($query);

    echo "{ \"topics\": [";
    $i = 0;
    foreach($ret as $r) {
        if ($i != 0) echo ",";
        echo "{";
        echo "\"topic\": \"$r[0]\", \"file\": \"$r[1]\"";
        echo "}";
        $i++;
    }

    echo "] }";


?>