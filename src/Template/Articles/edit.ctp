<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>

<div class="articles form large-9 medium-8 columns content">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <legend><?= __('Edit Article') ?></legend>
        <?php
            //echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('title');
            echo $this->Form->control('body');
            echo $this->Form->control('published');
            echo $this->Form->control('tag_string', ['type' => 'text']);
            // tagsテーブルからタグ一覧の選択リストを表示する
            //echo $this->Form->control('tags._ids',['options' => $tags]);    
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
