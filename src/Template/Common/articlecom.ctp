<!-- src/Template/Common/fumicom.ctp -->
<sidebar>
    <p>最近のトピックス</p>
    <div>
    <?= $this->fetch('sidebar') ?>
    </div>
</sidebar>
<articles>
    <?= $this->fetch('content') ?>
</articles>
<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
<actions>
    <h3>サイトの紹介</h3>
    <ul>
    <?php echo $this->Html->link('会社案内', ['action' => 'top']) . "<br/>"; ?>
</ul>
</actions>
