<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
-->
<div class="user-view">
    <div class="user-view-info">
            <?= __('User Info') ?><br>
            <?= __('User Id') ?>
            <?= $this->Number->format($user->id) ?>
            <?= __('Email') ?>
            <?= h($user->email) ?>
            <?= __('Created') ?>
            <?= h($user->created) ?>
            <?= __('Modified') ?>
            <?= h($user->modified) ?>
    </div>
    <h5><?= __('Related Articles') . " : " . $articleCount ?></h5>
        <?php if (!empty($user->articles)): ?> 
            <?php foreach ($user->articles as $article): ?>
                <div class="user-view-articles">
                    <div class="user-view-articles-myPost">
                        <?= h($article->id) ?> 
                        <?= h(strtok(strtok($user->email,'@'),'.')) ?>
                        <?= h($article->title) ?>
                        <?= h("  created : " . $this->Time->format($article->created, 'yyyy-MM-dd')) ?>
                        <?= h("  modified : " . $this->Time->format($article->modified, 'yyyy-MM-dd')) ?><br>
                        <?= h($article->body) ?>
                        <?= h($article->published) ?>
                    </div>
                    <?php  $commentNumber = $comments
                            ->find()
                            ->where(['article_id =' => $article->id])
                            ->count();
                            //debug($commentNumber);
                    ?>
                    <div class="user-view-articles-actions">
                        <p>PostedComments : <?= $commentNumber ?></P>
                        <?= $this->Html->link(__('ViewComment'), ['controller' => 'Articles', 'action' => 'view', $article->slug]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Articles', 'action' => 'edit', $article->slug]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Articles', 'action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    
</div>
