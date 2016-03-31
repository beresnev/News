<?php

class NewsListController extends Controller
{
	public $layout='//layouts/news_list_column_1';

	/**
	 * Просмотр
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Список новостей.
	 * Сортировка по дате публикации последние вверху.
	 * Выводить 5 записей на странице.
	 * @param string $year год из даты публикации
	 * @param string $month месяц из даты публикации
	 * @param integer $topic идентификатор темы 
	 */
	public function actionIndex($year=null, $month=null, $topic=null)
	{
		$criteria_array = array();
		
		// выбираем записи по дате публикации
		if (!is_null($year))
		{
			// по году и месяцу
			if (!is_null($month))
			{
				$criteria_array['condition'] = 'year(publication_date)=:year && month(publication_date)=:month';
				$criteria_array['params'] = array(':year'=>$year, ':month'=>$month);
			}
			// за весь год
			else
			{
				$criteria_array['condition'] = 'year(publication_date)=:year';
				$criteria_array['params'] = array(':year'=>$year);
			}
		}
		// выбираем записи по теме
		elseif (!is_null($topic))
		{
			$criteria_array['condition'] = 'topic_id=:topic_id';
			$criteria_array['params'] = array(':topic_id'=>$topic);
		}
    	
		// сортировка последние вверху
		$criteria_array['order'] = 'publication_date DESC';
		
		$dataProvider = new CActiveDataProvider('NewsModel', array(
    		'criteria'=>$criteria_array,
    		'pagination'=>array('pageSize'=>5),
		));
		
		$this->render('index', array('dataProvider'=>$dataProvider));
	}

	/**
	 * Поиск по идентификатору
	 * @param integer $id the ID of the model to be loaded
	 * @return News the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=NewsModel::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}
