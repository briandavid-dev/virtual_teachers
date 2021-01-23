<?php

use yii\helpers\Html;


$this->title = 'Agregar';

?>


    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('miusuario', [
        'model' => $model,
    ]) ?>

