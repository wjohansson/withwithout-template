<!DOCTYPE html>

<html>
    <body>
        <?php
        $array = range(1, 10);

        $page_num = null;
        if (isset($_GET["page"])){
            $page_num = intval($_GET["page"]);
        }
        $page_num = max($page_num-1, 0);
        $elements_each_page = 2;
        $min = $elements_each_page * $page_num;
        $max = $min + $elements_each_page;

        echo "Elements in array <br><br>";
        if ($max <= sizeof($array)){
            for ($i = $min; $i < $max; $i++){
                echo ($i+1) . ": " . $array[$i] . "<br>";
            }
        }
        echo "<a href=\"./?page=".($page_num+2)."\">Go to next page</a>";
        ?>
    </body>
</html>