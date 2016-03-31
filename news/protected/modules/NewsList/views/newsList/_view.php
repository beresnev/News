<?php
// это представление для строки  zii.widgets.CListView
/* @var $this NewsAdminController */
/* @var $data NewsModel */

$len=strlen($data->txt);
// добавляем многоточие если текст приходится сокращать
$dots = $len>256||$len==0 ? '...' : '';
?>

<div class="view">

	<b><?php echo CHtml::encode($data->name); ?></b>
	<br />

	<?php 
		echo (
				CHtml::encode( 
						$data->getAttributeLabel('publication_date').': '
						.Yii::app()->dateFormatter->format("dd.MM.yyyy", $data->publication_date).",  "
						.$data->getAttributeLabel('topic.name').': '
						.$data->topic->name)
				); 
	?>
	<br /><br />

	<?php echo CHtml::encode(substr($data->txt, 0, 256).$dots);	?>
	<br /><br />

	<div align="right">
	<?php 
		// выключаем ссылки если новость короткая и читать далее нечего
		$len<256 ? print('читать далее') : print(CHtml::link('читать далее', array('view', 'id'=>$data->id))); 
	?>
	</div>

</div>