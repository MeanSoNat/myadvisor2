<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>advisordelete</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php
        $asid = $_GET['asid'];
        $atid = $_GET['atid'];
        
        $link = mysqli_connect("localhost", "root", "", "myadvisor2") or die("disconnect from database.");
        $sql = "delete from advise where asid=$asid and atid=$atid";
        echo $sql . "<br>";
        $result = mysqli_query($link, $sql);
        if (!$result){
            echo "cannot delete";
        } else {
            echo "Deleted . <br>";
        }

        echo "<br><br><a href=studentadvisor.php?sid={$asid} class='button'>Back Student advisor</a>";
    ?>
</body>
</html>