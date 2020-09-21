<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChatRoom */

$this->title = Yii::t('app', 'Create Chat Room');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Chat Rooms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chat-room-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
