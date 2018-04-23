<?php
    $this->start('script');
    echo $this->Html->script($this->Webapp->mix('/js/mix/app.js'));
    $this->end();
?>

<h2 style="font-weight: 300">
    <span class="mr-2"><i class="fal fa-hdd"></i></span>
    <?= __('Sandbox') ?>
</h2>

<p class="lead">
    Hi this is my playground where i trying new features before i can implement them into projects. This project is opensourced and can be found at <a href="https://github.com/MayMeow/sandbox">GitHub</a>
</p>

If you like to see any feature please create issue on project tracker at <a href="https://github.com/MayMeow/sandbox/issues">GitHub</a>