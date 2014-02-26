<?php
class QuestionsController extends AppController {
    public $helpers = array('Workbook');

    public function index() {
        $this->paginate = array('limit' => 10);
        $data = $this->paginate('Question');
        $this->set('questions', $data);
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid question'));
        }

        $question = $this->Question->findById($id);
        if (!$question) {
            throw new NotFoundException(__('Invalid question'));
        }
        $this->set('question', $question);
    }
}
?>
