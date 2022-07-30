<?php
    //-------->set title-----------------
    $this->assign('title', 'theme-xxxx');

    //------->sidebar section -----------
    $this->extend('/Common/articlecom');
    $this->start('sidebar'); ?>
        <?= $this->element('sidebar/login_name'); ?>
        <?= $this->element('sidebar/recent_topics'); ?>
        <?= $this->element('sidebar/recent_comments'); ?>
    <?php $this->end(); ?>
    <?php $this->append('sidebar', $this->element('sidebar/popular_topics')); ?>

<!-- header & footer section -->
    <?php $this->set('headertext', '----- header block'); ?>
    <?php $this->set('footertext', '----- footer block'); ?> 
   
<!-- 以下は　Common の　fetch('content')　で取り込まれる部分 -->
    <?php foreach ($articles as $article): ?>
    <div class="article">
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
    </div>
    <?php endforeach; ?> 
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
