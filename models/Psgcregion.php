<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "psgcregion".
 *
 * @property int $Id
 * @property string $PsgCodeRegion
 * @property string $RegionCode
 * @property string $RegionName
 * @property int $Status
 * @property string $Uuid
 *
 * @property Psgcprovince[] $psgcprovinces
 */
class Psgcregion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'psgcregion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PsgCodeRegion', 'RegionCode', 'RegionName'], 'required'],
            [['Status'], 'integer'],
            [['PsgCodeRegion'], 'string', 'max' => 15],
            [['RegionCode'], 'string', 'max' => 100],
            [['RegionName'], 'string', 'max' => 500],
            [['Uuid'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'PsgCodeRegion' => 'Psg Code Region',
            'RegionCode' => 'Region Code',
            'RegionName' => 'Region',
            'Status' => 'Status',
            'Uuid' => 'Uuid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPsgcprovinces()
    {
        return $this->hasMany(Psgcprovince::className(), ['RegionId' => 'Id']);
    }
}
