<div class="row align-items-center loading" v-if="loading">
    <div class="col">
        <h3 style="font-weight: 300">Thinking ...</h3>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <?= $this->fetch('content') ?>
    </div>
</div>