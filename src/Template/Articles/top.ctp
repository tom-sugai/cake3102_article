<?php
    //-------->set title-----------------
    $this->assign('title', 'theme-xxxx');

    //------->sidebar section -----------
    $this->extend('/Common/articlecom');
    $this->start('sidebar'); ?>
        <?= $this->element('sidebar/recent_topics'); ?>
        <?= $this->element('sidebar/recent_comments'); ?>
    <?php $this->end(); ?>
    <?php $this->append('sidebar', $this->element('sidebar/popular_topics')); ?>

<!-- header & footer section -->
    <?php $this->set('headertext', '----- header block'); ?>
    <?php $this->set('footertext', '----- footer block'); ?> 
   
<!-- 以下は　Common の　fetch('content')　で取り込まれる部分 -->
    <?php foreach ($articles as $article): ?>
    <div>
        <?= $article->id . "<br/>" ?>
        <?= $article->title . "<br/>" ?>
        <?= $article->body . "<br/>" ?>
        <?= $article->user->email . "<br/>" ?>
        <?php foreach($article->tags as $tag): ?>
            <?= $tag->title . ", " ?> 
        <?php endforeach ?>
        <?= "<br/>" ?>
        <?= $article->created . "<br/>" ?>
        <?= $article->modified . "<br/>" ?>
        <?php foreach($article->comments as $comment): ?>
            <?= $comment->id . " : " . $comment->body . "<br/>" ?>
        <?php endforeach ?>
        </div>
    <?php endforeach; ?>  
