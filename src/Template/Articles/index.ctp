<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
 */
?>
<div>
    <!--
    <div class="thead">
        <div class="tha"><?= $this->Paginator->sort('id') ?></div>
        <div class="tha"><?= $this->Paginator->sort('user_id') ?></div>
        <div class="tha"><?= $this->Paginator->sort('title') ?></div>
        <div class="tha"><?= $this->Paginator->sort('published') ?></div>
        <div class="tha"><?= $this->Paginator->sort('created') ?></div>
        <div class="tha"><?= $this->Paginator->sort('modified') ?></div>
        <div class="actions"><?= __('Actions') ?></div>
    </div>
    -->
    <?php foreach ($articles as $article): ?>
    <div class="tbody">   
        <?= $this->Number->format($article->id) ?>
        <?= $article->has('user') ? strtok(strtok($article->user->email,'@'),'.') : '' ?>
        <?= h($this->Time->format($article->created, 'yyyy-MM-dd')) ?>
        <?= $this->Html->link($article->title, ['controller' => 'Articles', 'action' => 'view', $article->slug]) ?>
        <br>
        <?= $article->body ?><br>
        <?= h("published : " . $article->published) ?>
        <?= h("modified : " . $this->Time->format($article->modified, 'yyyy-MM-dd')) ?>
    </div>
    <?php endforeach; ?>
<!--    <div class="paginator"> -->
    <div>
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <div><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></div>
    </div>
</div>