<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>

<div>
    <div class="post">
        <div>
            <?= "Post No : " ?><?= $this->Number->format($article->id) ?>
            <?= __('  Title : ') ?><?= h($article->title) ?><br>
            <?= "  Auth : " ?><?= strtok($article->user->email,'@') ?>
            <?= h("created : " . $this->Time->format($article->created, 'yyyy-MM-dd')) ?>
            <?= h("  modified : " . $this->Time->format($article->modified, 'yyyy-MM-dd')) ?>
            <?= __('Published : ') ?>    
            <?= $article->published ? __('Yes') : __('No'); ?>
            <?= __('Tags : ') ?><?= $article->tag_string ?>
        </div>
        <div>
            <?= $this->Text->autoParagraph(h($article->body)); ?>
        </div>        
        <div class="new-comment">
            <?= $this->Html->link(__('View'), ['action' => 'view', $article->slug]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->slug]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->slug], ['confirm' => __('Are you sure you want to delete # {0}?', $article->slug)]) ?>
            <?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add', $article->id]) ?>      
        </div>
    </div>

    <div class="related-comments">
        <h5><?= __('Related Comments') ?></h5>
        <?php if (!empty($article->comments)): ?>       
            <?php foreach ($article->comments as $comments): ?>
                <div class="comment">
                    <?= h($comments->id) ?>
                    <?= h(strtok(strtok($comments->contributor,'@'),'.'))?>  
                    <?= h("created : " . $this->Time->format($comments->created, 'yyyy-MM-dd')) ?>
                <!--    <?= h("  modified : " . $this->Time->format($comments->modified, 'yyyy-MM-dd')) ?></p> -->
                    <p><?= h($comments->body) ?></p>
                    <!--<?= h("  published : " . $comments->published) ?> -->
                    </div>    
            <?php endforeach; ?>        
        <?php endif; ?>
    </div>
</div>
