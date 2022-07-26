<?=$this->Html->doctype('xhtml-strict'); ?>
<html lang="en">
<head>
<?= $this->Html->charset() ?>
<?=$this->Html->meta('viewport',null,array('content'=>'width=device-width, initial-scale=1.0')); ?>
<title><?= $this->fetch('title') ?></title>
<!-- 外部ファイルとスクリプトファイルがここに入れます (詳しくは HTML ヘルパーを参照。) -->
<?= $this->Html->meta('icon') ?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>

<?= $this->Html->css('hbg-menu.css') ?>
<?= $this->Html->script('jquery-3.6.0.min.js') ?>
<?= $this->Html->script('hbg-menu.js') ?>
<?php
echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');
?>
</head>
<body>
    <h1><?= h($this->fetch('h1')) ?></h1>
    <!-- もしすべてのビューでメニューを表示したい場合、ここに入れます -->
    <div id="header">
        <?= $this->element('headerbox'); ?>  
    </div>

    <!-- ここがビューで表示されるようにしたい場所です -->
    <div class="content clearfix">
        <?= $this->fetch('content') ?>
    </div>

    <!-- 表示される各ページにフッターを追加します -->
    <div id="footer">
        <?= $this->element('footerbox'); ?>
    </div>
 
</body>
</html>