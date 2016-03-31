<?php
/* Представление для просмотра */
/* @var $this NewsAdminController */
/* @var $model NewsModel */

$this->breadcrumbs=array(
	$this->module->description => array('index'),
	$model->name,
);
?>

<h3><?php echo CHtml::encode($model->name); ?></h3>

<?php 
		echo (
				CHtml::encode( 
						$model->getAttributeLabel('publication_date').': '
						.Yii::app()->dateFormatter->format("dd.MM.yyyy", $model->publication_date).",  "
						.$model->getAttributeLabel('topic.name').': '
						.$model->topic->name)
				); 
?>

<div class="view">
	<?php echo CHtml::encode($model->txt); ?>
</div>

<div align="right"><?php echo CHtml::link('Все новости', array('index')); ?></div>
