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
        <?php   $commentNumber = $Comments
                ->find()
                ->where(['article_id' => $article->id])
                ->count();
                //debug($commentNumber);
        ?>
    <div class="article-index">
        <div class="article-index-header">   
            <?= $this->Number->format($article->id) ?>
            <?= $article->has('user') ? strtok(strtok($article->user->email,'@'),'.') : '' ?>
            <?= $this->Html->link($article->title, ['controller' => 'Articles', 'action' => 'view', $article->slug]) ?>
            <?= h("created : " . $this->Time->format($article->created, 'yyyy-MM-dd')) ?>
            <?= h("published : ") ?><?= $article->published ? __('Yes') : __('No') ?>
            <?= h("modified : " . $this->Time->format($article->modified, 'yyyy-MM-dd')) ?>
        </div>
        <div class="article-index-body">
            <?= $article->body ?><br>
        </div>
        <div class="article-index-footer">
            <div class="posted-comments"><?= "PostedComments : " . $commentNumber ?></div> 
            <div class="PostComment"><?= $this->Html->link(__('PostComment'), ['controller' => 'Comments', 'action' => 'add', $article->id]) ?></div> 
        </div>
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
        <div><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></div>
    </div>
</div>