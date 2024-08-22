<?php

namespace app\models;

use Yii;
use borales\extensions\phoneInput\PhoneInputValidator;
use borales\extensions\phoneInput\PhoneInputBehavior;

/**
 * This is the model class for table "students".
 *
 * @property int $ID
 * @property string $Name
 * @property string $Gender
 * @property string $Date_of_birth
 * @property string|null $Phone_Number
 * @property string $School
 * @property string $Program
 * @property string $Major
 * @property int $Year_of_study
 */
class Students extends \yii\db\ActiveRecord
{
    public $phone;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Gender', 'Date_of_birth', 'School', 'Program', 'Major', 'Year_of_study'], 'required'],
            [['Gender', 'Phone_Number'], 'string'],
            [['phone'], PhoneInputValidator::className(), 'region' => ['ZM', 'UA']],
            [['Date_of_birth'], 'safe'],
            [['Year_of_study'], 'integer'],
            [['Name'], 'string', 'max' => 30],
            [['School', 'Program', 'Major'], 'string', 'max' => 50],
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
            'Gender' => 'Gender',
            'Date_of_birth' => 'Date Of Birth',
            'Phone_Number' => 'Phone Number',
            'School' => 'School',
            'Program' => 'Program',
            'Major' => 'Major',
            'Year_of_study' => 'Year Of Study',
        ];
    }

    public function behaviors()
    {
        return [
            'phoneInput' => PhoneInputBehavior::className(),
            [
                'class' => PhoneInputBehavior::className(),
                'countryCodeAttribute' => 'countryCode',
            ],
        ];
    }
}
