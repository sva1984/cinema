<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "film_staff".
 *
 * @property int $film_id
 * @property int $staff_id
 *
 * @property Film $film
 * @property Staff $staff
 */
class FilmStaff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'film_staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['film_id', 'staff_id'], 'required'],
            [['film_id', 'staff_id'], 'integer'],
            [['film_id', 'staff_id'], 'unique', 'targetAttribute' => ['film_id', 'staff_id']],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Film::className(), 'targetAttribute' => ['film_id' => 'id']],
            [['staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::className(), 'targetAttribute' => ['staff_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'film_id' => 'Film ID',
            'staff_id' => 'Staff ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Film::className(), ['id' => 'film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(Staff::className(), ['id' => 'staff_id']);
    }
}
