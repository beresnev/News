<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-5 last">
	<div id="sidebar1">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'По дате',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu_date,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar1 -->
	<div id="sidebar2">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'По теме',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu_topic,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar2 -->
	<div style="margin-left: 20px;"><?php echo CHtml::link('Все новости', array('index')); ?></div>
</div>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>
