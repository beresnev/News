<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property string $id
 * @property string $topic_id
 * @property string $name
 * @property string $publication_date
 * @property string $txt
 *
 * The followings are the available model relations:
 * @property Topic $topic
 */
class NewsModel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('topic_id, name, publication_date', 'required'),
			array('topic_id', 'length', 'max'=>10),
			array('name', 'length', 'max'=>50),
			array('txt', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'topic' => array(self::BELONGS_TO, 'TopicModel', 'topic_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'topic_id' => 'Тема',
			'name' => 'Название',
			'publication_date' => 'Дата публикации',
			'txt' => 'Текст',
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
