<?php

$yaml = yaml();
$data = yaml_parse($yaml);

$questions = array();
foreach ($data['questions'] as $q) {
    $source_code = str_replace("'", "\\'", $q['source_code']);
    $questions[] = sprintf("('%s', '%s', %s, '%s', NOW())", $q['title'], $q['body'], $q['difficulty'], $source_code);
}

echo "TRUNCATE questions;\n";
echo "INSERT INTO questions(title, body, difficulty, source_code, created) VALUES \n";
echo join(",\n", $questions) . ";\n";

function yaml() {
    return <<<'EOL'
questions:
  - title: 変数のスコープ（１）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          $x = 0;
          
          function countup() {
              $x += 1;
          }
          
          countup();
          countup();
          
          if ($x == /* YOUR_CODE */) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 変数のスコープ（２）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          $x = 0;
          
          function countup() {
              /* YOUR_CODE */
          }
          
          countup();
          countup();
          
          if ($x == 2) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 変数のスコープ（３）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          $x = 100;
          
          for ($i = 0; $i < 10; $i++ ) {
              echo $i;
          }
          
          if ($x == /* YOUR_CODE */) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 可変変数（１）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          $x = 100;
          $y = 'x';
          
          $$y = 200;
          
          if ($x == /* YOUR_CODE */) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: スタティック変数（１）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          function countup() {
              /* YOUR_CODE */
          }
          
          $num = rand(1,10);
          for ($i = 0; $i < $num; $i++) {
              $ret = countup();
          }
          
          if ($ret == $num) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 演算子（１）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          $x = 7 + 7 / 7 - 7 * 7;
          
          if ($x == /* YOUR_CODE */) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 演算子（２）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          $x = 0;
          $y = 100;
          $z = $x || $y;
          
          if ($z == /* YOUR_CODE */) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 演算子（３）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          $x = 0;
          $y = 100;
          
          $y += ($x = 10);
          $z = $x + $y;
          
          if ($z == /* YOUR_CODE */) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 制御構造（１）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          $x = 0;
          
          for ($i = 0; $i < 100; $i++) {
              /* YOUR_CODE */
              $x++;
          }
          
          if ($x == 50) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 制御構造（２）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          $ary = array(
              'a' => 1,
              'b' => 2,
              'c' => 3,
          );
          $x = '';
           
          foreach ($ary as $k => $v) {
              $x = $x . $k . $v;
          }
          
          if ($x == /* YOUR_CODE */) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 関数（１）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          $x = rand(1, 100);
          
          /* YOUR_CODE */
           
          $y = double($x);
          
          if ($y == $x * 2) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 関数（２）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          $x = $y = rand(1, 100);
          
          /* YOUR_CODE */
           
          double(&$y);
          
          if ($y == $x * 2) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 関数（３）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          /* YOUR_CODE */
          
          $x = sum(1, 2, 3);
          $y = sum(4, 5, 6, 7, 8, 9, 10);
          $z = sum($x, $y);
          
          if ($z == 55) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 関数（３）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          $names = array("Alice", "Bob", "Carol");
          
          function & find_name($index) {
              global $names;
              return $names[$index];
          }
          
          $n =& find_name(2);
          $n = "Dave";
          
          if ($names['2'] == /* YOUR_CODE */) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 文字列（１）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          $ary1 = array("1,2,3,4,5");
          $ary2 = array("6,7,8,9,10");
          
          function str_sum($ary) {
              /* YOUR_CODE */
          }
          
          $n1 = str_sum($ary1);
          $n2 = str_sum($ary2);
          $n3 = $n1 + $n2;
          
          if ($n3 = 55) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 文字列（２）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          $ary1 = array("1,2,3,4,5");
          $ary2 = array("6:7:8:");
          $ary3 = array("     9 10");
          
          function str_sum($ary) {
              /* YOUR_CODE */
          }
          
          $n1 = str_sum($ary1);
          $n2 = str_sum($ary2);
          $n3 = str_sum($ary3);
          $n4 = $n1 + $n2 + $n3;
          
          if ($n4 = 55) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 文字列（３）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          $x = "1a2b3c4d55eee66666ff7";
          $y = "9...10#11* 12";
          
          function replace_num($str) {
              /* YOUR_CODE */
          }
          
          $z = replace_num($x) . replace_num($y);
          
          if ($x == "NaNbNcNdNeeeNffNN...N#N* N") {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 配列（１）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          $ary1 = array(1, "a", 2, "2b", 3, 4, "i10n", 5);
          $ary2 = array(6, 7, "100yen", 8, "cafe", 9, 10);
          
          function array_sum_if_number($ary) {
              /* YOUR_CODE */
          }
          
          $n = array_sum_if_number($ary1) + array_sum_if_number($ary2);
          
          if ($n == 55) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 配列（２）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。ただし、array_reverseはできるだけ使用しないでください。'
    difficulty: 1
    source_code: |-
      <?php
          $ary1 = array(1, 2, 3);
          
          function my_array_reverse($ary) {
              /* YOUR_CODE */
          }
          
          $ary2 = my_array_reverse($ary1);
          
          if (
              $ary2[0] == 3 && 
              $ary2[1] == 2 && 
              $ary2[2] == 1
          ) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
  - title: 配列（３）
    body: 'コードが "exit(0);" で正常終了するように "/* YOUR_CODE */" を入力してください。'
    difficulty: 1
    source_code: |-
      <?php
          $ary1 = array(1, array(2, 3, 4), array(5, 6));
          $ary2 = array(7, array(array(8), array(9, 10)));
          
          function array_flatten($ary) {
              /* YOUR_CODE */
          }
          
          $sum = 0;
          $sum += array_sum(array_flatten($ary1));
          $sum += array_sum(array_flatten($ary2));
          
          if ($sum == 55) {
              exit(0);
          } else {
              exit(1);
          }
      ?>
EOL;
}

?>
