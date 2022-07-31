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

<!-- 以下は　Common の　fetch('content')　で取り込まれる部分 -->
    <?php foreach ($articles as $article): ?>
    <article>
        <?= "No." . $article->id . " created : " . $article->created . " modified : " . $article->modified . "<br/>" ?>
        <?= "Author : " . $article->user->email . "<br/>" ?>
        <?= "tile : " . $article->title . "<br/>" ?>
        <?= "body : " . $article->body . "<br/>" ?>
        <?php foreach($article->tags as $tag): ?>
            <?= "Tag : " . $tag->title . ", " ?> 
        <?php endforeach ?>
        <?= "<br/>" ?>
        <?php foreach($article->comments as $comment): ?>
            <?= "Comment ; " . $comment->id . " : " . $comment->body . "<br/>" ?>
        <?php endforeach ?>
    </article>
    <?php endforeach; ?> 

