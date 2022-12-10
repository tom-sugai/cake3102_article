<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('cms.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

    <header>        
        <div class="header-title"><?= $this->element('headerbox') ?></div>
        <div class="header-loginname"><?= "User Name : " . $loginname; ?></div>
        <div class="crumb-container">
            <?php
                //$this->Breadcrumbs->add('Login','/users/login');    
                //$this->Breadcrumbs->add('Logout','/users/logout');
                //$this->Breadcrumbs->add('NewPost','/articles/add');
                //$this->Breadcrumbs->add('MyPage',['controller' => 'Users', 'action' => 'view', $userId]);
                // 複数のパンくずを最後に追加
                $this->Breadcrumbs->add([
                    ['title' => 'Top', 'url' => ['controller' => 'articles', 'action' => 'index']],
                    ['title' => 'Login', 'url' => ['controller' => 'users', 'action' => 'login']],
                    ['title' => 'Logout', 'url' => ['controller' => 'users', 'action' => 'logout']],
                    ['title' => 'NewPost', 'url' => ['controller' => 'articles', 'action' => 'add']],
                    ['title' => 'MyPage', 'url' => ['controller' => 'Users', 'action' => 'view', $userId]]
                ]);
                echo $this->Breadcrumbs->render(
                    ['class' => 'crumb-container'],
                    ['separator' => '/']
                );
                
            ?>


        <!--    <?=$this->Breadcrumbs->getCrumbs(' | ',array(
                'text' => 'Top',
                'url' => '/articles/index',
                'escape' => false,
            )); ?>
        -->
        </div>    
    </header>

    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
