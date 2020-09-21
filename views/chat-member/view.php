<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChatMember */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Chat Members'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$urlChat = Url::to(["/chat-message/index", ["member" => $model->room_id]], true);
$js = <<< JS
$(function() {
    startRefresh();
});

function startRefresh() {
    setTimeout(startRefresh, 1000);
    $.get("{$urlChat}", function (data) {
        $('#chat--content').html(data);    
    });
}
JS;

$this->registerJs($js);

?>
<div class="chat-member-view">

    <div id="chat--content">...</div>

    <div class="chat-message-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($data["message"], 'text')->textarea(['rows' => 6]) ?>


        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>