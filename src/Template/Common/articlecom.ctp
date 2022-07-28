<!-- src/Template/Common/fumicom.ctp -->
<div class="sidebar">
    <?= $this->fetch('sidebar') ?>
</div>
<div class="container">
    <?= $this->fetch('content') ?>
</div>
<div class="actions">
    <h3>新着情報</h3>
    <ul>
    <?php echo $this->Html->link('tom', ['action' => 'tom']) . "<br/>"; ?>
    </ul>
</div>
