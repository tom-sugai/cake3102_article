<div class="articles index large-9 medium-8 columns content">
    <h3><?= __('Articles') ?></h3>
    <table>    
        <?php foreach ($articles as $article): ?>
            <?= $article->id . "<br/>" ?>
            <?= $article->title . "<br/>" ?>
            <?= $article->body . "<br/>" ?>
            <?= $article->user->email . "<br/>" ?>
            <?php foreach($article->tags as $tag): ?>
                <?= $tag->title . ", " ?> 
            <?php endforeach ?>
            <?= "<br/>" ?>
            <?= $article->created . "<br/>" ?>
            <?= $article->modified . "<br/>" ?>
            <?php foreach($article->comments as $comment): ?>
                <?= $comment->id . " : " . $comment->body . "<br/>" ?>
            <?php endforeach ?>
            <?= "---------" . "<br/>" ?>
        <?php endforeach; ?>
    </table>
</div>   
