<?php $this->set('title_for_layout', 'PHP Workbook Questions'); ?>

<section id="questions">
    
    <h2>PHPの練習帳です!</h2>
    <p><strong>PHP初心者の方向け</strong>に穴埋め式の<strong>練習問題</strong>をご用意しました。</p>
    <p>入門書を読んだ後の<strong>力試し</strong>や、他言語経験者でPHP未経験な方の<strong>学習のきっかけ</strong>など、お役にたてるとうれしいです。</p>
    
    <hr />
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Level</th>
                <th>Score</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($questions as $question): ?>
            <tr>
                <td>
                    <?php echo $this->Html->link('Q'.$question['Question']['id'].'.'.$question['Question']['title'],
        array('controller' => 'questions', 'action' => 'view', $question['Question']['id'])); ?>
                </td>
                <td><?php echo $this->Workbook->makeStar($question['Question']['difficulty']); ?></td>
                <td>
                    <?php echo count($question['Answer']); ?>人挑戦
                    <?php
                        $count = 0;
                        foreach ($question['Answer'] as $answer) {
                            if ($answer['result'] == 0) {
                                $count++;
                            }
                        }
                        unset($answer);
                        echo $count;
                    ?>人成功
                </td>
            </tr>
            <?php endforeach; ?>
            <?php unset($question); ?>
        </tbody>
    </table>
    
    <?php echo $this->Paginator->pagination(); ?>
</section>
