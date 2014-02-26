<?php $this->set('title_for_layout', 'PHP Workbook Answer'); ?>

<section id="answer">
    
    <div class="row">
        
        <div class="span3">
        </div>
        
        <div class="span6">
            <h2><?php echo $this->Workbook->makeResult($answer['Answer']['result']); ?></h2>
            <p><small>Auther:</small><?php echo $answer['Answer']['username']; ?>
               <small>Created:</small><?php echo $answer['Answer']['created']; ?></p>
            <pre class="prettyprint linenums"><?php echo h($answer['Answer']['source_code']); ?></pre>

            <!-- Facebook いいねボタン -->
            <div id="fb-root"></div>
            <?php $this->Html->scriptStart(array('inline'=>false)); ?>
            (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            <?php $this->Html->scriptEnd(); ?>
            <div class="fb-like" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-font="arial"></div>

            <!-- Twitter ツイートボタン -->
            <?php $data_text = sprintf("[%s]に%sしました", $answer['Question']['title'], ($answer['Answer']['result'] == 0 ? "成功" : "失敗")); ?>
            <a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php echo $data_text; ?>" data-lang="ja">ツイート</a>
            <?php $this->Html->scriptStart(array('inline'=>false)); ?>
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
            <?php $this->Html->scriptEnd(); ?>

            <hr />

            <div>
                <?php echo $this->Html->link('Go to Questions', array('controller' => 'questions', 'action' => 'index'), array('class' => 'btn btn-large btn-block btn-primary')); ?>
                <?php echo $this->Html->link('Return Q'.$answer['Question']['id'], array('controller' => 'questions', 'action' => 'view', $answer['Question']['id']), array('class' => 'btn btn-large btn-block')); ?>
            </div>
        </div>
        
        <div class="span3">
        </div>
        
    </div> <!-- end row -->
</section>
