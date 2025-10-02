<?php

$con = mysqli_connect('localhost', 'root', '', 'look_online_store');
extract($_REQUEST);


////                   /////                   ////                   ////   FOR DYNAMIC IMAGES        /////                    ////                       ////

if ($_REQUEST['method'] == 'getImages') {


    $q = "SELECT * FROM products ORDER BY PRO_ID DESC";

    $result = $con->query($q);
    $arrayy = array();
    $i = 0;

    while ($row = mysqli_fetch_assoc($result)) {

        $arrayy[$i] = $row;
        $i++;
    }
    echo (json_encode($arrayy));
}



////                   /////                   ////                   ////   FOR SINGLE PRODUCT DETAIL        /////                    ////                       ////


if ($_REQUEST['method'] == 'oneProduct') {

    $ID = $_GET['PRO_ID'];

    $pquery = "select * from products where PRO_ID=$ID";

    $product = $con->query($pquery);
    $count = mysqli_num_rows($product);

    if ($count != 0) {

        $aarr = array();
        $i = 0;

        while ($prow = mysqli_fetch_assoc($product)) {
            $aarraayy[$i] = $prow;
            $i++;
        }

        echo (json_encode($aarraayy));
    }
}
