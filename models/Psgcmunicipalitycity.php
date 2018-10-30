<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "psgcmunicipalitycity".
 *
 * @property int $Id
 * @property int $ProvinceId
 * @property string $PsgCodeMunicipalityCity
 * @property string $MunicipalityCityName
 * @property int $Level
 * @property int $Status
 * @property string $Uuid
 *
 * @property LguProfile[] $lguProfiles
 * @property Psgcprovince $province
 */
class Psgcmunicipalitycity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'psgcmunicipalitycity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ProvinceId', 'PsgCodeMunicipalityCity', 'MunicipalityCityName', 'Level', 'Status', 'Uuid'], 'required'],
            [['ProvinceId', 'Level', 'Status'], 'integer'],
            [['PsgCodeMunicipalityCity'], 'string', 'max' => 15],
            [['MunicipalityCityName'], 'string', 'max' => 500],
            [['Uuid'], 'string', 'max' => 60],
            [['ProvinceId'], 'exist', 'skipOnError' => true, 'targetClass' => Psgcprovince::className(), 'targetAttribute' => ['ProvinceId' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'ProvinceId' => 'Province ID',
            'PsgCodeMunicipalityCity' => 'Psg Code Municipality City',
            'MunicipalityCityName' => 'LGU Name',
            'Level' => 'Level',
            'Status' => 'Status',
            'Uuid' => 'Uuid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguProfiles()
    {
        return $this->hasMany(LguProfile::className(), ['MunicipalityCityId' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(Psgcprovince::className(), ['Id' => 'ProvinceId']);
    }
}
