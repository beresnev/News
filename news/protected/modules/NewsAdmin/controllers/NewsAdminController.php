<?php

class NewsAdminController extends Controller
{
	public $layout='//layouts/admin_column_1';

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
	 * Добавление
	 */
	public function actionCreate()
	{
		$model=new NewsModel;

		if(isset($_POST['NewsModel']))
		{
			$model->attributes=$_POST['NewsModel'];
			// добавляем к дате еще и время чтобы при сортировке последние были вверху
			$model->publication_date = 
			  Yii::app()->dateFormatter->format("yyyy-MM-dd", $model->publication_date).' '
			  .Yii::app()->dateFormatter->format("hh:mm:ss", time());
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Редактирование
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['NewsModel']))
		{
			$model->attributes=$_POST['NewsModel'];
			// добавляем к дате еще и время чтобы при сортировке последние были вверху
			$model->publication_date = 
			  Yii::app()->dateFormatter->format("yyyy-MM-dd", $model->publication_date).' '
			  .Yii::app()->dateFormatter->format("hh:mm:ss", time());
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Удаление
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
	}

	/**
	 * Список всех новостей.
	 * Сортировка по дате публикации последние вверху.
	 * Выводить 5 записей на странице.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('NewsModel', array(
    		'criteria'=>array(
        	'order'=>'publication_date DESC',
    		),
    		'pagination'=>array(
        	'pageSize'=>5,
    		),
		));
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
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
