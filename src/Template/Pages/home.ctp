<?php
$this->start('script');
echo $this->Html->script($this->Webapp->mix('/js/mix/app.js'));
$this->end();
?>

<h2 style="font-weight: 300"><?= __('Sandbox') ?> v0.1</h2>