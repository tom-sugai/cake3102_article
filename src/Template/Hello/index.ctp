<h2>Behaivior Sample</h2>
<style>
    span.bold {
        color:#66a; font-weight:bold; font-size:smaller;
    }
    div.box {
        border: 1px solid #ddd;
        margin: 5px; padding: 5px;
    }
</style>
<p>*<?= $data->usernsme ?> の情報</P>
<ul>
    <li><span class="bold">Name:</span> <?= $data->username ?></li>
    <li><span class="bold">Mail:</span> <?= $data->mail ?></li>
    <li><span class="bold">TEL :</span> <?= $data->tel ?></li>  
</ul>
<div class="box">
    <span class="bold">ADDRESS:</span><br>
    <?= $data->address ?>
</div>
<div class="box">
    <span class="bold">COMMENT:</span><br>
    <?= $data->comment ?>
</div>    