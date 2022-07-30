<!-- src/Template/Common/fumicom.ctp -->
<sidebar>
    <?= $this->fetch('sidebar') ?>
</sidebar>
<articles>
    <?= $this->fetch('content') ?>
</articles>
<actions>
    <h3>新着情報</h3>
    <ul>
    <?php echo $this->Html->link('tom', ['action' => 'tom']) . "<br/>"; ?>
    </ul>
</actions>
