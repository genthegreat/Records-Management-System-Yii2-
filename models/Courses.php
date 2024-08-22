<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property string $CourseId
 * @property string $Course_Name
 *
 * @property Lecturers[] $lecturers
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CourseId', 'Course_Name'], 'required'],
            [['CourseId'], 'string', 'max' => 8],
            [['Course_Name'], 'string', 'max' => 50],
            [['CourseId'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CourseId' => 'Course ID',
            'Course_Name' => 'Course Name',
        ];
    }

    /**
     * Gets query for [[Lecturers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLecturers()
    {
        return $this->hasMany(Lecturers::className(), ['Course' => 'CourseId']);
    }
}
