<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>studentadvisor</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<?php
    sleep(rand(1,2));
    $sid = $_GET['sid'];

    $link = mysqli_connect("localhost", "root", "", "myadvisor2") or die("disconnect from database.");
    $sql = "select * from student where sid=$sid";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_array($result);

    echo "Student_ID: ". $data['sid'] . "<br>";
    echo "Student_Name: " . $data['sname'] . "<br>";

    //add advisor
    echo "<a href= advisoradd.php?sid={$data['sid']}>add advisor</a>";

    echo "<table border=1>";
        echo "<thead>";
            echo "<th>asid</th>";
            echo "<th>atid</th>";
            echo "<th>Teacher_Name</th>";
            echo "<th>Delete</th>";
        echo "</thead>";

        $sql2 = "select asid, atid, tname from advise, teacher where atid=tid and asid=$sid";
        $result = mysqli_query($link, $sql2);
        
        while ($data = mysqli_fetch_array($result)){
        echo "<tr>";
            echo "<td>{$data['asid']}</td>";
            echo "<td>{$data['atid']}</td>";
            echo "<td>{$data['tname']}</td>";
            echo "<td><a href=advisordelete.php?asid={$data['asid']}&atid={$data['atid']}>delete</a></td>";
        echo "</tr>";
        }

    echo "</table>";
        echo "<br><a href='studentlist.php' class='button'>go list</a>";
    ?>

    
</body>
</html>