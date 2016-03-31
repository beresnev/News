<?php

/**
 * This is the model class for table "topic".
 *
 * The followings are the available columns in table 'topic':
 * @property string $id
 * @property string $name
 *
 * The followings are the available model relations:
 * @property News[] $news
 */
class TopicModel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'topic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>50),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'news' => array(self::HAS_MANY, 'NewsModel', 'topic_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Тема',
		);
	}

	/**
	 * формирование списка тем для dropDownList
	 */
	public function getAllTopics(){
		
		$topics = self::model()->findAll(
				array('order' => 'name')
				);
		
		$list = CHtml::listData($topics, 'id', 'name');
		
		return $list;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Topic the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
