<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;

/**
 * This is the model class for table "user".
 *
 * @property int $Id
 * @property string $Username
 * @property string $AuthKey
 * @property string $Password
 * @property string $PasswordResetToken
 * @property string $Email
 * @property int $LguProfileId
 * @property string $Uuid
 * @property int $IsDeleted
 * @property int $UserType
 * @property int $isLogin
 * @property int $CoachId
 *
 * @property LguProfile $lguProfile
 */
class UserCoach extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Username', 'LguProfileId', 'UserType', 'isLogin'], 'required'],
            [['LguProfileId', 'IsDeleted', 'UserType', 'isLogin','CoachId'], 'integer'],
            [['Username', 'AuthKey', 'Password', 'PasswordResetToken', 'Email'], 'string', 'max' => 255],
            [['Uuid'], 'string', 'max' => 60],
            [['Uuid'], 'thamtech\uuid\validators\UuidValidator'],
            [['LguProfileId'], 'exist', 'skipOnError' => true, 'targetClass' => LguProfile::className(), 'targetAttribute' => ['LguProfileId' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'CoachId' => 'CoachId',
            'Username' => 'Username',
            'AuthKey' => 'Auth Key',
            'Password' => 'Password',
            'PasswordResetToken' => 'Password Reset Token',
            'Email' => 'Email',
            'LguProfileId' => 'Lgu Profile ID',
            'Uuid' => 'Uuid',
            'IsDeleted' => 'Is Deleted',
            'UserType' => 'User Type',
            'isLogin' => 'Is Login',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguProfile()
    {
        return $this->hasOne(LguProfile::className(), ['Id' => 'LguProfileId']);
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return User::findOne(['AccessToken' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return \yii\db\ActiveRecord
     */
    public static function findByUsername($username)
    {
        return User::findOne(['Username' => $username,'isLogin'=>0]);
    }

    /**
     * @return int $Id of the current user
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->AuthKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->AuthKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->Password);
    }

    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * Generates password hash
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->Password = Yii::$app->getSecurity()->generatePasswordHash($password);
    }


  
     /**
     * Generates password hash, Uuid and authentication key before saving
     *
     * @param scenario $insert
     *
     * @return bool if form is valid
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert))
        {
            if ($this->isNewRecord)
            {
                $this->AuthKey = \Yii::$app->security->generateRandomString();
                $this->Uuid = UuidHelper::uuid();
            }

            $this->setPassword($this->Password);
            return true;
        }
        return false;
    }
}
