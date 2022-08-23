<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<div>
    <h5><?= __('Article-Info') ?></h5>
    <div class="article-view">
        <div class="article-view-info">
            <?= __('Article-No : ') . $this->Number->format($article->id) ?>
            <?= __('Auth : ') . h(strtok($article->user->email,'@')) ?>
            <?= __("created : " . $this->Time->format($article->created, 'yyyy-MM-dd')) ?>
            <?= __('Published : ') ?><?= $article->published ? __('Yes') : __('No'); ?>
            <?= __("modified : " . $this->Time->format($article->modified, 'yyyy-MM-dd')) ?>
            <?= __('Tags : ') ?><?= $article->tag_string ?>
        </div>
        <div class="article-view-body">
            <div><?= __('Title : ') . h($article->title) ?></div>
            <div><?= $this->Text->autoParagraph(h($article->body)); ?></div>
        </div>      
        <div class="article-view-action">
            <div class="posted-comments"><?= "PostedComments : " . $comNumber ?></div>
            <div><?= $this->Html->link(__('PostComment'), ['controller' => 'Comments', 'action' => 'add', $article->id]) ?></div>  
            <div><?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->slug]) ?></div>
            <div><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->slug], ['confirm' => __('Are you sure you want to delete # {0}?', $article->slug)]) ?></div>
        </div>
    </div>

    <h5><?= __('Related Comments') ?></h5>
    <?php if (!empty($article->comments)): ?>

            <?php foreach ($article->comments as $comment): ?>
                <div class="article-view-comments">
                    <div class="article-view-comment-info">
                        <?= h($comment->id) ?>
                        <?= h(strtok(strtok($comment->contributor,'@'),'.'))?>  
                        <?= h("created : " . $this->Time->format($comment->created, 'yyyy-MM-dd')) ?>
                        <?= h("modified : " . $this->Time->format($comment->modified, 'yyyy-MM-dd')) ?>
                        <?= h("published : " . $comment->published) ?>
                    </div> 
                    <div class="article-view-comment-body"><?= h($comment->body) ?></diV>
                    <div class="article-view-comment-action">
                        <div><?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comment->id]) ?></div>
                        <div><?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]) ?></div>
                    </div>
                </div>                 
            <?php endforeach; ?>    
    <?php endif; ?>   
</div>
