<!DOCTYPE html>
<html>

<body>
<?php
if(isset($_POST["submit"])){
    $f = fopen("data.txt", "r+");
    $lines = explode("\n", file_get_contents('data.txt'));
    asort($lines);
    foreach($lines as $key => $value){
        if ($value != null){
            echo $value . "<br>";
            }
        }

    fclose($f);
}

?>

</body>
</html>