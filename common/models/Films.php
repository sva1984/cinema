<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "films".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $year
 * @property int $duration
 * @property int $country_id
 * @property string $raiting
 * @property string $raiting_mpaa
 *
 * @property Comments[] $comments
 * @property FavoritesMtmFilms[] $favoritesMtmFilms
 * @property Countries $country
 * @property GenreMtmFilms[] $genreMtmFilms
 * @property KeyWordsMtmFilms[] $keyWordsMtmFilms
 * @property PrizesMtmFilms[] $prizesMtmFilms
 * @property StaffMtmFilms[] $staffMtmFilms
 */
class Films extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'films';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['year', 'duration', 'country_id'], 'integer'],
            [['raiting'], 'number'],
            [['title', 'raiting_mpaa'], 'string', 'max' => 64],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'year' => 'Year',
            'duration' => 'Duration',
            'country_id' => 'Country ID',
            'raiting' => 'Raiting',
            'raiting_mpaa' => 'Raiting Mpaa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritesMtmFilms()
    {
        return $this->hasMany(FavoritesMtmFilms::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Countries::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenreMtmFilms()
    {
        return $this->hasMany(GenreMtmFilms::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeyWordsMtmFilms()
    {
        return $this->hasMany(KeyWordsMtmFilms::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrizesMtmFilms()
    {
        return $this->hasMany(PrizesMtmFilms::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaffMtmFilms()
    {
        return $this->hasMany(StaffMtmFilms::className(), ['film_id' => 'id']);
    }
}
