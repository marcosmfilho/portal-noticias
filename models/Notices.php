<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notices".
 *
 * @property int $id
 * @property string $author
 * @property string $title
 * @property string $body
 * @property string $image
 * @property string $date_created
 * @property string $date_updated
 * @property int $notices_status_id
 *
 * @property NoticesStatus $noticesStatus
 */
class Notices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author', 'title', 'body', 'notices_status_id'], 'required'],
            [['date_created', 'date_updated'], 'safe'],
            [['notices_status_id'], 'integer'],
            [['author', 'title'], 'string', 'max' => 45],
            [['body'], 'string', 'max' => 2000],
            [['image'], 'string', 'max' => 200],
            [['notices_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => NoticesStatus::className(), 'targetAttribute' => ['notices_status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => 'Author',
            'title' => 'Title',
            'body' => 'Body',
            'image' => 'Image',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'notices_status_id' => 'Notices Status ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoticesStatus()
    {
        return $this->hasOne(NoticesStatus::className(), ['id' => 'notices_status_id']);
    }
}
