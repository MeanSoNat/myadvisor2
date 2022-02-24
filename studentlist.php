<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentList</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php
        $link = mysqli_connect("localhost", "root", "", "myadvisor2") or die("disconnect from database.");
        $sql = "select * from student";
        $result = mysqli_query($link, $sql);
        echo "<table border=1>";
        echo "<thead>";
            echo "<th>id</th>";
            echo "<th>name</th>";
            echo "<th>Advisor</th>";
        echo "</thead>";

        while($data = mysqli_fetch_array($result)) {
            echo "<tr>";
                echo "<td>{$data['sid']}</td>";
                echo "<td>{$data['sname']}</td>";
                echo "<td><a href=studentadvisor.php?sid={$data['sid']}>view advisor</a></td>";
            echo "</tr>";
        }
        echo "</table>";

mysqli_close($link);
    
    ?>
</body>
</html>