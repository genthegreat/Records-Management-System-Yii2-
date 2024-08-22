<?php
$this->title = 'Records Management System';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <?= \hail812\adminlte\widgets\Callout::widget([
                'type' => 'success',
                'head' => 'About Unza Records Management System',
                'body' => ''
            ]) ?>
        </div>
    </div>
    <div>
                Our System can only be accessed by registered users.</br>
                Admin, Guest and Lecturer.
    </div>
</div>