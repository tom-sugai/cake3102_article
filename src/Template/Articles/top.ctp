<div class="articles index large-9 medium-8 columns content">
    <h3><?= __('Articles') ?></h3>
        
    <?php foreach ($articles as $article): ?>
        <?= $article->id ?>
        <?= $article->title ?>
        <?= $article->body ?>
        <?= $article->user->email ?>
        <?php foreach($article->tags as $tag): ?>
            <?= $tag->title . ", " ?> 
        <?php endforeach ?>
        <?= "<br/>" ?>
        <?= $article->created ?>
        <?= $article->modified ?>
        <?php foreach($article->comments as $comment): ?>
            <?= $comment->id . " : " . $comment->body ?>
        <?php endforeach ?>
        <?= "---------" . "<br/>" ?>
    
    <?php endforeach; ?>
</div>   
    




foreach($articles as $article){
            //debug($article);
            echo $article->id . "<br/>";
            echo $article->title . "<br/>";
            echo $article->body . "<br/>";
            echo $article->user->email . "<br/>";
            foreach($article->tags as $tag){
                echo $tag->title . ", "; 
            }
            echo "<br/>";
            echo $article->created . "<br/>";
            echo $article->modified . "<br/>";
            foreach($article->comments as $comment){
                echo $comment->id . " : " . $comment->body . "<br/>";
            }
            echo "----------" . "<br/>";
        }
