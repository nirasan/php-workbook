<?php $this->set('title_for_layout', 'PHP Workbook Question'); ?>

<section id="questions">
    <div class="row">
        
        <div class="span3">
        </div>
        
        <div class="span6">
            <h2><?php echo h('Q'.$question['Question']['id'].'.'.$question['Question']['title']); ?></h2>
            <p><?php echo h($question['Question']['body']); ?></p>
            <p><small>Level:</small><?php echo $this->Workbook->makeStar($question['Question']['difficulty']); ?></p>

            <pre class="prettyprint linenums"><?php echo h($question['Question']['source_code']); ?></pre>
            
            <?php echo $this->Form->create('Answer', array('url' => '/answers/add', 'class' => 'form-horizontal')); ?>
                <fieldset>
                    
                    <?php echo $this->Form->input('source_code', array(
                        'label' => '/* YOUR_CODE */',
                        'type' => 'textarea',
                        'class' => 'span6',
                        //'helpBlock' => '入力した内容は"/* YOUR_CODE */"と置き換わります。',
                    )); ?>

                    <?php echo $this->Form->input('username', array(
                        'label' => 'Auther',
                        'type' => 'text',
                        'class' => 'span3',
                    )); ?>
                    
                    <?php echo $this->Form->input('question_id', array(
                        'type' => 'hidden', 
                        'default' => $question['Question']['id'],
                    )); ?>

                    <div style="margin:20px;">
                        <?php echo $this->Form->submit('Send Answer', array(
                                'div' => false,
                                'class' => 'btn btn-large btn-block btn-primary',
                        )); ?>
                    </div>
                </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <div class="span3">
        </div>
    
    </div> <!-- end row -->

    <!--
    <div class="row">
        <div class="page-header">
            <h2>下書き。</h2>
        </div>
        <div class="span6">
            <fieldset>
                <?php echo $this->Form->input('source_code', array(
                    'label' => 'YOUR_CODE',
                    'type' => 'textarea',
                    'class' => 'span4',
                    'id' => 'src',
                )); ?>
            </fieldset>
            <button class="btn btn-primary" onclick="LLEval($('#src'), $('#dst'), 'php');">Run Test</button>
            <?php $this->Html->scriptStart(array('inline'=>false)); ?>
            (function($){

            var keysOf = function(o){ 
                var keys = [];
                for (var k in o) keys[keys.length] = k;
                return keys;
            };

            json2dl = function(json){
                var dl = $('<dl/>');
                $.each(keysOf(json).sort(), function(i, k){
                    $('<dt/>').text(k).appendTo(dl);
                    var dd = $('<dd/>').text(json[k] === '' ? '-' : json[k])
                    if (k.match(/^std/)) dd.css({fontFamily:'monospace',whiteSpace:'pre'});
                    dd.appendTo(dl);
                });
                return dl;
            };

            LLEval = function(srcNode, dstNode, lang){
                var query = {s:srcNode.val()};
                if (lang) query['l'] = lang;
                var url = 'http://api.dan.co.jp/lleval.cgi';
                var proto = 'json';
                /* if ($.browser.msie || $.browser.opera){ 
                    url   += '?c=?';
                    proto += 'p';
                } */ /* falls back to JSONP */
                $.get(url, query, function(json){
                    $(dstNode).html(json2dl(json));
                }, proto);
            };

            })(jQuery);
            <?php $this->Html->scriptEnd(); ?>
        </div>
        <div class="span6">
            <h4>実行結果</h4>
            <div id="dst" ></div>
        </div>
    </div>
    -->
</section>
