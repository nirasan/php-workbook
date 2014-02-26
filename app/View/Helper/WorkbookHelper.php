<?php
App::uses('AppHelper', 'View/Helper');

class WorkbookHelper extends AppHelper {
    # 難易度の星表示
    public function makeStar($num) {
        $retval = '';
        foreach (range(1, 5) as $i) {
            if ($i <= $num) {
                $retval .= '<i class="icon-star"></i>';
            } else {
                $retval .= '<i class="icon-star-empty"></i>';
            }
        }
        return $retval;
    }
    # 回答の成功失敗表示
    public function makeResult($num) {
        if ($num == 0) {
            return '<span class="text-success">Success</span>';
        } else {
            return '<span class="text-error">False</span>';
        }
    }
}
?>
