<?php
App::uses('AppHelper', 'View/Helper');

class StarHelper extends AppHelper {
    public function makeStar($num) {
        foreach (range(1, 5) as $i) {
            if ($i <= $num) {
                echo '<i class="icon-star"></i>';
            } else {
                echo '<i class="icon-star-empty"></i>';
            }
        }
    }
}
?>
