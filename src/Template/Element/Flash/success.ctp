<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-success rounded box-shadow">
    <div class="lh-100">
        <h6 class="mb-0 text-white lh-100"><?= $message ?></h6>
    </div>
</div>