<!-- src/Template/Common/fumicom.ctp -->
<aside>
<div class="sidebar">
    <?= $this->fetch('sidebar') ?>
</div>
</aside>
<article>
<div>
    <?= $this->fetch('content') ?>
</div>
</article>
<div class="actions">
    <h3>関連アクション</h3>
    <ul>
    <?php echo $this->Html->link('tom', ['action' => 'tom']) . "<br/>"; ?>
    </ul>
</div>
<div class="actions">
    <h3>新着情報</h3>
    <ul>
    <?php echo $this->Html->link('tom', ['action' => 'tom']) . "<br/>"; ?>
    </ul>
</div>
