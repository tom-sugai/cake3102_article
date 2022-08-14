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
<div>
    <div class="user-info">
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
    <div class="related-articles">
        <?= __('Related Articles') ?>
        <?php if (!empty($user->articles)): ?> 
            <?php foreach ($user->articles as $articles): ?>
                <div class="my-post">
                    <?= h($articles->id) ?> 
                <!--    <?= h($user->email) ?> -->
                    <?= h($articles->title) ?>
                    <?= h("  created : " . $this->Time->format($articles->created, 'yyyy-MM-dd')) ?>
                    <?= h("  modified : " . $this->Time->format($articles->modified, 'yyyy-MM-dd')) ?><br>
                    <?= h($articles->body) ?>
                    <?= h($articles->published) ?>

                    <div class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Articles', 'action' => 'view', $articles->slug]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Articles', 'action' => 'edit', $articles->slug]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Articles', 'action' => 'delete', $articles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articles->id)]) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
