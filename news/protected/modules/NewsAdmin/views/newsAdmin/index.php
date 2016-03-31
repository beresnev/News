<?php
/* @var $this NewsAdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	$this->module->description,
);

// добавление пунктов меню
$this->menu=array(
	array('label'=>'Добавить новость', 'url'=>array('create')),
);
?>

<h2><?php echo $this->module->description; ?></h2>

<?php 
$this->widget ('zii.widgets.grid.CGridView', 
	array (
		'dataProvider' => $dataProvider,
		'enableSorting' => false,
		'columns' => array(
				array (
						'class' => 'CButtonColumn',
						'template' => '{view}{update}{delete}' 
				),
				array (
						'name' => 'name'
				),
				array (
						'name' => 'publication_date',
						'value' => 'Yii::app()->dateFormatter->format("dd.MM.yyyy", $data->publication_date)'

				),
				array (
						'name' => 'txt',
						'value' => 'substr($data->txt, 0, 256)'
				),
				array (
						'name' => 'topic.name'
				)
		) 
)); 
?>
