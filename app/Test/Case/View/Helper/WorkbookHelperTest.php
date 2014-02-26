<?php
App::uses('Controller', 'Controller');
App::uses('View', 'View');
App::uses('WorkbookHelper', 'View/Helper');

class WorkbookHelperTest extends CakeTestCase {
    public function setUp() {
        parent::setUp();
        $Controller = new Controller();
        $View = new View($Controller);
        $this->Workbook = new WorkbookHelper($View);
    }
    
    public function testMakeStar() {
        $result = $this->Workbook->makeStar(1);
        print_r($result);
        $this->assertContains('icon-star', $result);
        $this->assertContains('icon-star-empty', $result);
    }
}
?>
