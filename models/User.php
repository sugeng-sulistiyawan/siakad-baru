<?php

namespace app\models;

use borales\extensions\phoneInput\PhoneInputBehavior;
use diecoding\helpers\Date;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string|null $verification_token
 * @property string|null $auth_active
 * @property int|null $last_login
 * @property string $kode_user
 * @property string|null $nama_lengkap
 * @property string|null $no_hp
 * @property string|null $photo
 * @property string|null $jenis_kelamin
 * @property string|null $alamat
 * @property string|null $tentang
 * @property string|null $institusi
 * @property string|null $no_identitas
 * @property string|null $jenis_identitas
 *
 * @inheritdoc
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $pathFile = "/uploads/user";
    public $_file;

    const STATUS_DELETED  = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE   = 10;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => PhoneInputBehavior::class,
                'phoneAttribute' => 'no_hp',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = [
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => self::class],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => self::class],

            ['password_hash', 'required', 'when' => function ($model) {
                return $this->isNewRecord;
            }, 'whenClient' => "function (attribute, value) {
                return " . $this->isNewRecord . ";
            }"],
            ['password_hash', 'string', 'min' => 6],
        ];

        return ArrayHelper::merge(parent::rules(), $rules);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Dibuat Pada'),
            'updated_at' => Yii::t('app', 'Diubah Pada'),
            'verification_token' => Yii::t('app', 'Verification Token'),
            'auth_active' => Yii::t('app', 'Auth Active'),
            'last_login' => Yii::t('app', 'Last Login'),
            'kode_user' => Yii::t('app', 'Kode User'),
            'nama_lengkap' => Yii::t('app', 'Nama Lengkap'),
            'no_hp' => Yii::t('app', 'No Hp'),
            'photo' => Yii::t('app', 'Photo'),
            'jenis_kelamin' => Yii::t('app', 'Jenis Kelamin'),
            'alamat' => Yii::t('app', 'Alamat'),
            'tentang' => Yii::t('app', 'Tentang'),
            'institusi' => Yii::t('app', 'Institusi'),
            'no_identitas' => Yii::t('app', 'No Identitas'),
            'jenis_identitas' => Yii::t('app', 'Jenis Identitas'),

            '_file' => Yii::t('app', 'Photo'),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by username
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token)
    {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * Generates kode user
     */
    public function generateKodeUser()
    {
        $this->kode_user = strtoupper(Yii::$app->security->generateRandomString(8) . Date::currentDateTime('isdHYm'));
    }
}
