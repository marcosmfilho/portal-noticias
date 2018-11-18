<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notices_status".
 *
 * @property int $id
 * @property string $name_status
 * @property string $date_created
 *
 * @property Notices[] $notices
 */
class NoticesStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notices_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_created'], 'safe'],
            [['name_status'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_status' => 'Name Status',
            'date_created' => 'Date Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotices()
    {
        return $this->hasMany(Notices::className(), ['notices_status_id' => 'id']);
    }
}
