<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "survey_contact_person".
 *
 * @property int $Id
 * @property string $full_name
 * @property string $agency
 * @property string $email_address
 * @property string $contact_number
 * @property string $designation
 * @property int $status
 */
class SurveyContactPerson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'survey_contact_person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'full_name', 'agency', 'email_address', 'contact_number', 'designation', 'status'], 'required'],
            [['Id', 'status'], 'integer'],
            [['full_name', 'agency', 'designation'], 'string', 'max' => 200],
            [['email_address'], 'string', 'max' => 100],
            [['contact_number'], 'string', 'max' => 50],
            [['Id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'full_name' => 'Full Name',
            'agency' => 'Agency',
            'email_address' => 'Email Address',
            'contact_number' => 'Contact Number',
            'designation' => 'Designation',
            'status' => 'Status',
        ];
    }
}
