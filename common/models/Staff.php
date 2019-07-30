<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property int $id
 * @property string $name
 * @property string $biography
 * @property string $birth_date
 * @property string $hieght
 * @property int $profession
 * @property int $country_id
 * @property string $img_url
 *
 * @property FilmStaff[] $filmStaff
 * @property Film[] $films
 * @property Country $country
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'img_url'], 'required'],
            [['biography'], 'string'],
            [['birth_date'], 'safe'],
            [['hieght'], 'number'],
            [['profession', 'country_id'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['img_url'], 'string', 'max' => 128],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'biography' => 'Biography',
            'birth_date' => 'Birth Date',
            'hieght' => 'Hieght',
            'profession' => 'Profession',
            'country_id' => 'Country ID',
            'img_url' => 'Img Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmStaff()
    {
        return $this->hasMany(FilmStaff::className(), ['staff_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(Film::className(), ['id' => 'film_id'])->viaTable('film_staff', ['staff_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }
}
