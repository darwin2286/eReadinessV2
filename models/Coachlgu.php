<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coachlgu".
 *
 * @property int $Id
 * @property int $CoachId
 * @property int $ProvinceId
 * @property int $PsgcMunicipalityCityId
 * @property int $Status
 * @property string $Uuid
 *
 * @property Psgcmunicipalitycity $psgcMunicipalityCity
 * @property Coaches $coach
 * @property Psgcprovince $province
 */
class Coachlgu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coachlgu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CoachId', 'ProvinceId', 'PsgcMunicipalityCityId', 'Status'], 'required'],
            [['CoachId', 'ProvinceId', 'PsgcMunicipalityCityId', 'Status'], 'integer'],
            [['Uuid'], 'string', 'max' => 60],
            [['PsgcMunicipalityCityId'], 'exist', 'skipOnError' => true, 'targetClass' => Psgcmunicipalitycity::className(), 'targetAttribute' => ['PsgcMunicipalityCityId' => 'Id']],
            [['CoachId'], 'exist', 'skipOnError' => true, 'targetClass' => Coaches::className(), 'targetAttribute' => ['CoachId' => 'Id']],
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
            'CoachId' => 'Coach ID',
            'ProvinceId' => 'Province ID',
            'PsgcMunicipalityCityId' => 'Psgc Municipality City ID',
            'Status' => 'Status',
            'Uuid' => 'Uuid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPsgcMunicipalityCity()
    {
        return $this->hasOne(Psgcmunicipalitycity::className(), ['Id' => 'PsgcMunicipalityCityId']);
    }
   
    public function getLguProfile()
    {
        return $this->hasOne(LguProfile::className(), ['Id' => 'PsgcMunicipalityCityId']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoach()
    {
        return $this->hasOne(Coaches::className(), ['Id' => 'CoachId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(Psgcprovince::className(), ['Id' => 'ProvinceId']);
    }
}
