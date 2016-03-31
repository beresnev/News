<?php
/* @var $this NewsAdminController */
/* @var $model NewsModel */
/* @var $topic_model TopicModel */

$this->breadcrumbs=array(
	$this->module->description => array('index'),
	'Добавление',
);

// добавление пунктов меню
$this->menu=array(
	array('label'=>'Все новости', 'url'=>array('index')),
);
?>

<h2>Добавление</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>