<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile $profile
 */
?>

<div class="row">
    <div class="col-md-12 text-center">
        <h2 style="font-weight: 300" class="has-emoji"><?= $profile->name ?></h2>
        <?= $profile->twitter ?> 
        <?= $profile->facebook ?> 
        <?= $profile->location ?> 
        <?= $profile->url ?> 
        <p class="lead has-emoji"><?= $profile->bio ?></p>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="row text-center loading" v-if="loading">
            <div class="col">
                <h3 style="font-weight: 300">Thinking ...</h3>
            </div>
        </div>
        <posts-table-component></posts-table-component>
    </div>
</div>