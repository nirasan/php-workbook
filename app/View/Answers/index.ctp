<?php $this->set('title_for_layout', 'PHP Workbook Answers'); ?>

<section id="answers">
    <div class="page-header">
        <h1>Answers</h1>
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Difficulty</th>
                <th>Auther</th>
                <th>Result</th>
                <th>Created</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($answers as $answer): ?>
            <tr>
                <td><?php echo $answer['Answer']['id']; ?></td>
                <td>
                    <?php echo $this->Html->link($answer['Question']['title'],
        array('controller' => 'answers', 'action' => 'view', $answer['Answer']['id'])); ?>
                </td>
                <td><?php echo $this->Workbook->makeStar($answer['Question']['difficulty']); ?></td>
                <td><?php echo $answer['Answer']['username']; ?></td>
                <td><?php echo $this->Workbook->makeResult($answer['Answer']['result']); ?></td>
                <td><?php echo $answer['Answer']['created']; ?></td>
            </tr>
            <?php endforeach; ?>
            <?php unset($answer); ?>
        </tbody>
    </table>
    
    <?php echo $this->Paginator->pagination(); ?>
</section>
