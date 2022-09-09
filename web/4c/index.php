<!DOCTYPE html>
<html>
<body>
    <?php
        class Band{
            public $name = "";
            public $member_count = 4;
            public $disbanded = false;
            public $touring = false;

            const BR = "<br/><br>";

            public function member_leave(){
                if ($this->$member_count >= 2) {
                    $this->$member_count--;
                } elseif ($this->$member_count < 2) {
                    $this->$disbanded = true;
                }
            }
            public function new_member(){
                if ($this->$disbanded==false && $this->$member_count <4){
                    $this->$member_count++;
                }
            }
            public function start_tour(){
                if ($this->$member_count == 4 && $this->$touring == false){
                    $this->$touring = true;
                }
            }

            public function __construct($band_name, $band_member_count, $band_disbanded, $band_touring){
                $this->member_count = $band_member_count;
                $this-> disbanded = $band_disbanded;
                $this-> touring = $band_touring;
                $this-> name= $band_name;
            }

            public function get_name_member_count(){
                return "Name: " . $this->name . "<br> Number of members: " . $this->member_count . self::BR;

            }
        }

        class BandFactory {

            public static function create($band_name, $band_member_count, $band_disbanded, $band_touring){
                return new Band($band_name, $band_member_count, $band_disbanded, $band_touring);

            }


        }

        $band1 = BandFactory::create("Metallica", "4", false, true);
        $band2 = BandFactory::create("Tenacious D", "2", false, false);

        echo $band1-> get_name_member_count();
        echo $band2-> get_name_member_count();
    ?>

</body>
</html>