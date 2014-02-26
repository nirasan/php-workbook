<?php
class AnswersController extends AppController {
    public $uses = array('Answer', 'Question');
    public $helpers = array('Workbook');
    
    public function index($question_id = null) {
        $limit = 10;
        if ($question_id) {
            $this->paginate = array('Answer.question_id' => $question_id, 'limit' => $limit);
        } else {
            $this->paginate = array('limit' => $limit);
        }
        $data = $this->paginate('Answer');
        $this->set('answers', $data);
    }
    
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid answer'));
        }

        $answer = $this->Answer->findById($id);
        if (!$answer) {
            throw new NotFoundException(__('Invalid answer'));
        }
        $this->set('answer', $answer);
    }

    public function add() {
        if ($this->request->is('post')) {
            
            # Question の取得
            $question_id = $this->request->data['Answer']['question_id'];
            $question = $this->Question->findById($question_id);
            if (!$question) {
                throw new NotFoundException(__('Invalid question'));
            }

            # ソースの合成
            $question_src = $question['Question']['source_code'];
            $answer_src  = $this->request->data['Answer']['source_code'];
            $source_code = str_replace("/* YOUR_CODE */", $answer_src, $question_src);
            
            # コードの実行結果取得
            $api_url = 'http://api.dan.co.jp/lleval.cgi?c=null&l=php&s=';
            $result = file_get_contents($api_url . urlencode($source_code));
            preg_match('/null\(({.*})\)/', $result, $matches);
            $result = json_decode($matches[1]);
            $status = $result->status; # 終了ステータス 0:正常 1:異常
            
            # Answer データの更新
            $this->request->data['Answer']['source_code'] = $source_code;
            $this->request->data['Answer']['result']      = $status;
            
            # レコード作成
            $this->Answer->create();
            if ($this->Answer->save($this->request->data)) {
                $this->Session->setFlash('Your answer has been saved.');
                $this->redirect(array('action' => 'view', $this->Answer->id));
            } else {
                $this->Session->setFlash('Unable to add your answer.');
            }
        }
    }
}
?>
