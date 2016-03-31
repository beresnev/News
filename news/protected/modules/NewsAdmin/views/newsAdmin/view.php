<?php
/* @var $this NewsAdminController */
/* @var $model NewsModel */

$this->breadcrumbs=array(
	$this->module->description => array('index'),
	$model->name,
);

// добавление пунктов меню
$this->menu=array(
	array('label'=>'Все новости', 'url'=>array('index')),
	array('label'=>'Добавить новость', 'url'=>array('create')),
	array('label'=>'Редактировать', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 
			'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),
					'confirm'=>'Вы уверены, что хотите удалить данный элемент?')),
);
?>

<h2>Просмотр</h2>

<?php 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
			array (
					'label' => $model->getAttributeLabel('topic.name'),
					'name' => 'topic.name'
			),
			array (
					'name' => 'name'
			),
			array (
					'name' => 'publication_date',
					'value' => Yii::app()->dateFormatter->format("dd.MM.yyyy", $model->publication_date)
			),
			array (
					'name' => 'txt'
			)
	),
)); 
?>
