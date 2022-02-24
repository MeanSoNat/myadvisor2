<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>advisoraddaction</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php
        $asid = $_REQUEST['asid'];
        $atid = $_REQUEST['atid'];

        $link = mysqli_connect("localhost", "root", "", "myadvisor2") or die("disconnect from database.");
        $sql = "insert into advise values($asid,$atid)";
        echo $sql. "<br>";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            echo "Cannot Add" . "<br>";
        } else {
            echo "Advisor added." . "<br>";
        }
        echo "<br>";
        echo "<a href=studentadvisor.php?sid={$asid} class='button'>go back</a>";
        mysqli_close($link);
    ?>
</body>
</html>