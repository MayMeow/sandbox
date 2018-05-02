<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile $profile
 */
$this->extend('/_common/default-no-submenu');
?>

<div class="row">
    <div class="col-md-9">
        <h3 style="font-weight: 300">Projects</h3>
    </div>
    <div class="col-md-3">
        <div style="margin-bottom: 10px">
                <?= $this->Html->image('/' . $profile->image, ['class' => 'rounded img-fluid']) ?>
        </div>
        <h2 style="font-weight: 300" class="has-emoji"><?= $profile->name ?></h2>
        <?= $profile->twitter ?> 
        <?= $profile->facebook ?> 
        <?= $profile->location ?> 
        <?= $profile->url ?> 
        <p class="lead has-emoji"><?= $profile->bio ?></p>
        <?php if ($this->request->getSession()->read('Auth.User.id') == $profile->user_id) : ?>
            <a href="/settings/profiles/edit/<?= $profile->user_id?>" class="btn btn-outline-secondary btn-block">Edit</a>
        <?php endif; ?>
    </div>
</div>