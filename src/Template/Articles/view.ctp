<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>

<div>
    <div>
        <?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add', $article->id]) ?>      
    </div>
    <div class="post">
        <div>
            <?= "Auth : " ?>
            <?= $article->has('user') ? $this->Html->link($article->user->email, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?> 
        </div>
        <div> 
            <?= $this->Number->format($article->id) ?>
            <?= h($this->Time->format($article->created, 'yyyy-MM-dd')) ?>
            <?= h($this->Time->format($article->modified, 'yyyy-MM-dd')) ?>
        </div>
        <div>
            <h5><?= __('Title') ?></h5>
            <p><?= h($article->title) ?></p>
            <p><?= h($article->slug) ?></p>
        </div>
        <div>
            <h5><?= __('Body') ?></h5>
            <?= $this->Text->autoParagraph(h($article->body)); ?>       
        </div>
        <div>
            <?= __('Published') ?>    
            <p><?= $article->published ? __('Yes') : __('No'); ?></p>
            <h5><?= __('Tags') ?></h5>
            <p><?= $article->tag_string ?></p>
        </div>
    </div>
    <div>
        <h5><?= __('Related Comments') ?></h5>
        <?php if (!empty($article->comments)): ?>       
            <?php foreach ($article->comments as $comments): ?>
                <div class="comment">
                <p><?= "Contributor : " . $comments->contributor ?></p>
                <p><?= h($comments->id) ?>
                <?= h($this->Time->format($comments->created, 'yyyy-MM-dd')) ?>
                <?= h($this->Time->format($comments->modified, 'yyyy-MM-dd')) ?></p>
                <!-- <p><?= h($comments->article_id) ?></p> -->
                <p><?= h($comments->body) ?></p>
            <!-- <p><?= h($comments->published) ?></p> -->
                </div>    
            <?php endforeach; ?>
            
        <?php endif; ?>
    </div>
</div>
