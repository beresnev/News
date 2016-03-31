<?php
/* @var $this NewsAdminController */
/* @var $model NewsModel */

$this->breadcrumbs=array(
	$this->module->description => array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Редактирование',
);

// добавление пунктов меню
$this->menu=array(
	array('label'=>'Все новости', 'url'=>array('index')),
	array('label'=>'Добавить новость', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h2>Редактирование</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>