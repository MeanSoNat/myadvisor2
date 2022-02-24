<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add advisor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $sid = $_GET['sid'];

        $link = mysqli_connect("localhost", "root", "", "myadvisor2") or die("disconnect from database.");
        $sql = "select * from student where sid=$sid";
        $result = mysqli_query($link, $sql);
        $data = mysqli_fetch_array($result);

        echo "sid: ". $data['sid'] . "<br>";
        echo "sname: " . $data['sname'] . "<br>";

        echo "<form name='form1' method='get' action='advisoraddaction.php'>";
        echo "<input type='hidden' name='asid' value={$data['sid']}>";
        echo "<select name='atid'>";
                $sql = "select * from teacher where tid not in (select atid from advise where asid=$sid)";
                $result = mysqli_query($link, $sql);
                while ($data = mysqli_fetch_array($result)){
                    echo "<option value={$data['tid']}>{$data['tname']}</option>";
                }
        echo "</select>";
        echo "<input type='submit' value='save'>";
        echo "<a href=studentlist.php>go list</a>";
        echo "</form>";
    ?>
</body>
</html>