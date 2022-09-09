<!DOCTYPE html>
<html>
    <style>
        <?php
        if (isset($_GET["color"])) {
            $bgcolor = $_GET["color"];
            if (preg_match('/^[a-f0-9]{6}$/i', $bgcolor))
                echo "body { background-color: #".$bgcolor."; }";
        }
        ?>
	</style>
    <body>
        <?php 
            foreach ($_GET as $key=>$val)
            echo $key.": ".$val . "<br>";
        ?>
    </body>
</html>