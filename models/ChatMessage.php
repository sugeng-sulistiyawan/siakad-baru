<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%chat_message}}".
 *
 * @property int $id
 * @property int $chat_member
 * @property string $text
 * @property string $type
 * @property int $reply_message
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_user
 * @property string|null $updated_user
 *
 * @property ChatMember $chatMember
 */
class ChatMessage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%chat_message}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chat_member', 'text'], 'required'],
            [['chat_member', 'reply_message', 'status'], 'integer'],
            [['text'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['type', 'created_user', 'updated_user'], 'string', 'max' => 255],
            [['chat_member'], 'exist', 'skipOnError' => true, 'targetClass' => ChatMember::className(), 'targetAttribute' => ['chat_member' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'chat_member' => Yii::t('app', 'Chat Member'),
            'text' => Yii::t('app', 'Text'),
            'type' => Yii::t('app', 'Type'),
            'reply_message' => Yii::t('app', 'Reply Message'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_user' => Yii::t('app', 'Created User'),
            'updated_user' => Yii::t('app', 'Updated User'),
        ];
    }

    /**
     * Gets query for [[ChatMember]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChatMember()
    {
        return $this->hasOne(ChatMember::className(), ['id' => 'chat_member']);
    }
}
