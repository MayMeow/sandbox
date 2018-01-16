<div class="row">
    <div class="col-md-3">
        <?= $this->fetch('sidebar_content') ?>
    </div>
    <div class="col-md-9">
        <div class="row align-items-center loading" v-if="loading">
            <div class="col">
                <h3 style="font-weight: 300">Thinking ...</h3>
            </div>
        </div>

        <?= $this->fetch('content') ?>
    </div>
</div>