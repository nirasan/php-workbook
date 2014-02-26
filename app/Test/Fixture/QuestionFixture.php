<?php
class QuestionFixture extends CakeTestFixture {
    public $fields = array(
        'id' => array('type' => 'integer', 'key' => 'primary'),
        'title' => array('type' => 'string', 'length' => 255, 'null' => false),
        'body' => 'text',
        'difficulty' => array('type' => 'integer'),
        'source_code' => 'text',
        'created' => 'datetime',
        'modified' => 'datetime',
    );
}
?>
