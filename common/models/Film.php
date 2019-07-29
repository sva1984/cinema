<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "film".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $year
 * @property int $duration
 * @property int $country_id
 * @property string $raiting
 * @property string $raiting_mpaa
 * @property string $img_url
 * @property string $video_url
 *
 * @property Comment[] $comments
 * @property Country $country
 * @property FilmFavorite[] $filmFavorites
 * @property FilmGenre[] $filmGenres
 * @property Genre[] $genres
 * @property FilmKeyWord[] $filmKeyWords
 * @property KeyWord[] $keyWords
 * @property FilmPrize[] $filmPrizes
 * @property Prize[] $prizes
 * @property FilmStaff[] $filmStaff
 * @property Staff[] $staff
 * @property FilmStuff[] $filmStuffs
 * @property FilmUser[] $filmUsers
 * @property User[] $users
 */
class Film extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'film';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'img_url'], 'required'],
            [['description'], 'string'],
            [['year', 'duration', 'country_id'], 'integer'],
            [['raiting'], 'number'],
            [['title', 'raiting_mpaa', 'img_url', 'video_url'], 'string', 'max' => 64],
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
            'title' => 'Title',
            'description' => 'Description',
            'year' => 'Year',
            'duration' => 'Duration',
            'country_id' => 'Country ID',
            'raiting' => 'Raiting',
            'raiting_mpaa' => 'Raiting Mpaa',
            'img_url' => 'Img Url',
            'video_url' => 'Video Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    public function getCountryName()
    {//защита если удалят страну из справочника
        return isset($this->country)?$this->country->country:'Страна на задана';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmFavorites()
    {
        return $this->hasMany(FilmFavorite::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmGenres()
    {
        return $this->hasMany(FilmGenre::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenres()
    {
        return $this->hasMany(Genre::className(), ['id' => 'genre_id'])->viaTable('film_genre', ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmKeyWords()
    {
        return $this->hasMany(FilmKeyWord::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeyWords()
    {
        return $this->hasMany(KeyWord::className(), ['id' => 'key_word_id'])->viaTable('film_key_word', ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmPrizes()
    {
        return $this->hasMany(FilmPrize::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrizes()
    {
        return $this->hasMany(Prize::className(), ['id' => 'prize_id'])->viaTable('film_prize', ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmStaff()
    {
        return $this->hasMany(FilmStaff::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff::className(), ['id' => 'staff_id'])->viaTable('film_staff', ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmStuffs()
    {
        return $this->hasMany(FilmStuff::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmUsers()
    {
        return $this->hasMany(FilmUser::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('film_user', ['film_id' => 'id']);
    }
}
