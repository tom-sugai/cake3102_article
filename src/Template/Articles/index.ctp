<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
 */
?>
<div class="articles index large-9 medium-8 columns content">
    <div class="thead">
        <p><?= $this->Paginator->sort('id') ?></p>
        <p><?= $this->Paginator->sort('user_id') ?></p>
        <p><?= $this->Paginator->sort('title') ?></p>
<!--    <p><?= $this->Paginator->sort('published') ?></p> -->
        <p><?= $this->Paginator->sort('created') ?></p>
<!--    <p><?= $this->Paginator->sort('modified') ?></p> -->
<!--    <p class="actions"><?= __('Actions') ?></p> -->
    </div>
    <?php foreach ($articles as $article): ?>
    <div class="tbody">
        <p><?= $this->Number->format($article->id) ?></p>
        <p><?= $article->has('user') ? $this->Html->link($article->user->email, ['condivoller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></p>
        <p><?= $this->Html->link($article->title, ['controller' => 'Articles', 'action' => 'view', $article->slug]) ?></p>
<!--    <p><?= h($article->published) ?></p> -->
        <p><?= h($this->Time->format($article->created, 'yyyy-MM-dd')) ?></p>
<!--    <p><?= h($this->Time->format($article->modified, 'yyyy-MM-dd')) ?></p> -->
<!--    <p class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $article->slug]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->slug]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->slug], ['confirm' => __('Are you sure you want to delete # {0}?', $article->slug)]) ?>
        </p> 
-->
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
</div>
