<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%chat_room}}".
 *
 * @property int $id
 * @property string|null $type
 * @property string|null $title
 * @property string|null $description
 * @property string $encryption
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_user
 * @property string|null $updated_user
 *
 * @property ChatMember[] $chatMembers
 */
class ChatRoom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%chat_room}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'string'],
            [['encryption'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'encryption'], 'string', 'max' => 128],
            [['description', 'created_user', 'updated_user'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'encryption' => Yii::t('app', 'Encryption'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_user' => Yii::t('app', 'Created User'),
            'updated_user' => Yii::t('app', 'Updated User'),
        ];
    }

    /**
     * Gets query for [[ChatMembers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChatMembers()
    {
        return $this->hasMany(ChatMember::className(), ['room_id' => 'id']);
    }

    /**
     * 
     */
    public function generateEncription()
    {
        $this->encryption = Yii::$app->security->generateRandomString(8);
        $this->encryption .= " " . Yii::$app->security->generateRandomString(8);
        $this->encryption .= " " . Yii::$app->security->generateRandomString(8);
        $this->encryption .= " " . Yii::$app->security->generateRandomString(8);
        $this->encryption .= " " . Yii::$app->security->generateRandomString(8);
        $this->encryption .= " " . Yii::$app->security->generateRandomString(8);
        $this->encryption .= " " . Yii::$app->security->generateRandomString(8);
        $this->encryption .= " " . Yii::$app->security->generateRandomString(8);
    }
}
