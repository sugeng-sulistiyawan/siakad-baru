<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChatMessage */

$this->title = Yii::t('app', 'Create Chat Message');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Chat Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chat-message-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
