<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lecturers".
 *
 * @property int $ID
 * @property string $Name
 * @property string $Department
 * @property string $Type
 * @property string $Course
 *
 * @property Courses $course
 */
class Lecturers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lecturers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'Name', 'Department', 'Type', 'Course'], 'required'],
            [['ID'], 'integer'],
            [['Type'], 'string'],
            [['Name', 'Department'], 'string', 'max' => 50],
            [['Course'], 'string', 'max' => 8],
            [['Course'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::className(), 'targetAttribute' => ['Course' => 'CourseId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Name' => 'Name',
            'Department' => 'Department',
            'Type' => 'Type',
            'Course' => 'Course',
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Courses::className(), ['CourseId' => 'Course']);
    }
}
