<?php
/**
 * Created by PhpStorm.
 * User: seng
 * Date: 10/3/2014
 * Time: 12:48 AM
 */

$conn = mysqli_connect("localhost", "test", "test", "test");
$result = mysqli_query($conn, "select * from test");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Title of the document</title>
</head>

<body>
<table border="1">
    <?php
    $iddatastock = array();
    while ($row = mysqli_fetch_array($result)) {
        echo
            '<tr>' .
            '<td><a href="#" id="' . $row['p1'] . '" testdata="p1">' . $row['p1'] . '</a></td>' .
            '<td><a href="#" id="' . $row['p2'] . '" testdata="p2">' . $row['p2'] . '</a></td>' .
            '<td><a href="#" id="' . $row['p3'] . '" testdata="p3">' . $row['p3'] . '</a></td>' .
            '<td><a href="#" id="' . $row['p4'] . '" testdata="p4">' . $row['p4'] . '</a></td>' .
            '</tr>';
        $iddatastock['p1'][] = $row['p1'];
        $iddatastock['p2'][] = $row['p2'];
        $iddatastock['p3'][] = $row['p3'];
        $iddatastock['p4'][] = $row['p4'];

    }
    ?>
</table>
</body>

<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<script>

    arraydata = new Array();

    $(document).ready(function () {

        <?php
        foreach ($iddatastock['p1'] as $rows){
            echo '  $("#'.$rows.'").click(function () {
                topush = ['.$rows.', "p1"];
                pusharray(topush);

        });';

        }

        ?>
        <?php
       foreach ($iddatastock['p2'] as $rows){
           echo '  $("#'.$rows.'").click(function () {
               topush = ['.$rows.', "p2"];
               pusharray(topush);

       });';

       }

       ?>
        <?php
       foreach ($iddatastock['p3'] as $rows){
           echo '  $("#'.$rows.'").click(function () {
               topush = ['.$rows.', "p3"];
               pusharray(topush);

       });';

       }

       ?>
        <?php
       foreach ($iddatastock['p4'] as $rows){
           echo '  $("#'.$rows.'").click(function () {
               topush = ['.$rows.', "p4"];
               pusharray(topush);

       });';

       }

       ?>

    });

    function pusharray(data) {
        if (arraydata.length < 1) {
            arraydata.push(data);
        } else {
            arraydata.push(data);
            swap(arraydata);
        }
    }
    function swap(arraydata2){

        $.get( "swap.php", { data1: arraydata2[0][0], data2: arraydata2[1][0] , col1: arraydata2[0][1], col2: arraydata2[1][1]} )
            .done(function( data ) {
                alert( "Data Loaded: " + data );
                $("#"+arraydata2[0][0]).attr("id","tempID");
                $("#"+arraydata2[1][0]).attr("id",arraydata2[0][0]).html(arraydata2[0][0]);
                $("#tempID").attr("id",arraydata2[1][0]).html(arraydata2[1][0]);
                location.reload();
            });
    }
</script>
</html>
