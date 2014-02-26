<?php
class Question extends AppModel {
    public $name = 'Question';
    public $hasMany = 'Answer';
}
?>
