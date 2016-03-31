<?php
/* @var $this NewsAdminController */
/* @var $model NewsModel */
/* @var $form CActiveForm */
?>

<?php
	$cs = Yii::app()->clientScript;
	$cs->registerCssFile(Yii::app()->baseUrl.'/css/ui/jquery-ui.css');
	$cs->registerScriptFile(Yii::app()->baseUrl.'/js/jquery-1.12.0.js');
	$cs->registerScriptFile(Yii::app()->baseUrl.'/js/ui/jquery-ui.js');

	// подключаем jqueryui календарь к полю ввода даты
	$cs->registerScript('datepicker',
			"$(function(){ $('#NewsModel_publication_date').datepicker({dateFormat:'dd.mm.yy'}); });",
			CClientScript::POS_HEAD
			);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, помеченные <span class="required">*</span> обязательны к заполнению.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'topic_id'); ?>
		<?php 
			$tmodel = new TopicModel();
			$list = $tmodel->getAllTopics();
			echo $form->dropDownList($model, 'topic_id', $list, array('prompt'=>'')); 
		?>
		<?php echo $form->error($model,'topic_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'publication_date'); ?>
		<?php echo $form->textField($model,'publication_date', 
				array('id'=>'NewsModel_publication_date', 
						'pattern'=>'([0-2]\d|3[01])\.(0\d|1[012])\.([12]\d{3})',
						'value'=>Yii::app()->dateFormatter->format("dd.MM.yyyy", $model->publication_date)
		)); ?>
		<?php echo $form->error($model,'publication_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'txt'); ?>
		<?php echo $form->textArea($model,'txt',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'txt'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->