<?php

namespace app\models;

use Yii;
use app\models\PsgcprovinceSearch;

/**
 * This is the model class for table "psgcprovince".
 *
 * @property int $Id
 * @property int $RegionId
 * @property string $PsgCodeProvince
 * @property string $ProvinceName
 * @property int $Status
 * @property string $Uuid
 *
 * @property Psgcmunicipalitycity[] $psgcmunicipalitycities
 * @property Psgcregion $region
 */
class Psgcprovince extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'psgcprovince';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['RegionId', 'PsgCodeProvince', 'ProvinceName', 'Status'], 'required'],
            [['RegionId', 'Status'], 'integer'],
            [['PsgCodeProvince'], 'string', 'max' => 15],
            [['ProvinceName'], 'string', 'max' => 500],
            [['Uuid'], 'string', 'max' => 60],
            [['RegionId'], 'exist', 'skipOnError' => true, 'targetClass' => Psgcregion::className(), 'targetAttribute' => ['RegionId' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'RegionId' => 'Region ID',
            'PsgCodeProvince' => 'Psg Code Province',
            'ProvinceName' => 'Province',
            'Status' => 'Status',
            'Uuid' => 'Uuid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPsgcmunicipalitycities()
    {
        return $this->hasMany(Psgcmunicipalitycity::className(), ['ProvinceId' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Psgcregion::className(), ['Id' => 'RegionId']);
    }
}
