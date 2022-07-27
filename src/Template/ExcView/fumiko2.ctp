        <?php
        $this->assign('title', 'theme-xxxx');
        $this->extend('/Common/fumicom');
        $this->start('sidebar'); ?>
            <?= $this->element('sidebar/recent_topics'); ?>
            <?= $this->element('sidebar/recent_comments'); ?>
        <?php $this->end(); ?>
        <?php $this->append('sidebar', $this->element('sidebar/popular_topics')); ?>

        <?php $this->set('headertext', '----- header block'); ?>
        <?php $this->set('footertext', '----- footer block'); ?>    
    <!-- 以下の記述は　/common/xxxx.ctp の中の　 <?= $this->fetch('content') ?>　でcontentに取り込まれる -->
        <?php echo $this->Html->image("fumiko.jpg",['width' => '200', 'height' => '260']); ?>
        <div>
            <h3>aaaaaaaaaaaaaaaaaa</h3>
        </div>
