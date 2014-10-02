<?php
/**
 * Created by PhpStorm.
 * User: seng
 * Date: 10/3/2014
 * Time: 1:23 AM
 */
echo $_GET['data1'] . "-" . $_GET['col1'] . " and " . $_GET['data2'] . "-" . $_GET['col2'];
$conn = mysqli_connect("localhost", "test", "test", "test");


$result = mysqli_query($conn, "select id from test where " . $_GET['col1'] . "= '" . $_GET['data1'] . "'");
$id1 = null;

while ($row = mysqli_fetch_array($result)) {
    $id1 = $row["id"];
}

$result = mysqli_query($conn, "select id from test where " . $_GET['col2'] . "= '" . $_GET['data2'] . "'");
$id2 = null;

while ($row = mysqli_fetch_array($result)) {
    $id2 = $row["id"];
}

$result = mysqli_query($conn, "update test set " . $_GET['col1'] . " = '" . $_GET['data2'] . "' WHERE `id` = '".$id1."' ");

$result = mysqli_query($conn, "update test set " . $_GET['col2'] . " = '" . $_GET['data1'] . "' WHERE `id` = '".$id2."'");

