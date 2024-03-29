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
 * @property Comment[] $comments
 * @property FilmStaff[] $filmStaff
 * @property Film[] $films
 * @property Country $country
 */
class Staff extends \yii\db\ActiveRecord
{

    const Actor = 'Актёр';
    const Producer = 'Продюсер';
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

    /**
     * @return string
     */
    public function getCountryName()
    {//защита если удалят страну из справочника
        return isset($this->country)?$this->country->country:'Страна на задана';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['staff_id' => 'id']);
    }

    public function getProfession($profession)
    {
        if ($profession == 1) {
            return self::Actor;
        }
        if ($profession == 2) {
            return self::Producer;
        }
    }
}
