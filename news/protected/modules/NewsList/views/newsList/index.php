<?php
/* @var $this NewsAdminController */
/* @var $dataProvider CActiveDataProvider */

$Months = array(
		"01" => "январь",
		"02" => "февраль",
		"03" => "март",
		"04" => "апрель",
		"05" => "май",
		"06" => "июнь",
		"07" => "июль",
		"08" => "август",
		"09" => "сентябрь",
		"10" => "октябрь",
		"11" => "ноябрь",
		"12" => "декабрь"
);

$this->breadcrumbs=array(
	$this->module->description,
);

// формируем меню "По дате"
$this->menu_date = array();
$date_array = NewsModel::model()->findAllBySql(
	"select distinct date_format(publication_date, '%Y-%m') as publication_date from news order by 1 desc");
$year_tmp = '0';
foreach ($date_array as $obj)
{
	$d_arr = explode('-', $obj->publication_date);
	$year = $d_arr[0];
	$month = $d_arr[1];

	// год
	if ($year !== $year_tmp)
	{
		//$count = NewsModel::model()->count('year(publication_date)=:year', array(':year'=>$year));
		$menu_date_array = array();
		//$menu_date_array['label'] = $year." ($count)";
		$menu_date_array['label'] = $year;
		$d_arr[1]=null;
		$menu_date_array['url'] = array('index', 'year'=>$year);
		$this->menu_date[] = $menu_date_array;
		$year_tmp = $year;
	}
	
	// месяц
	if ($year === $year_tmp)
	{
		$count = NewsModel::model()->count('year(publication_date)=:year && month(publication_date)=:month', 
				array(':year'=>$year, ':month'=>$month));
		$menu_date_array = array();
		$menu_date_array['label'] = $Months[$month]." ($count)";
		$menu_date_array['linkOptions'] = array('style' => 'text-indent: 1.5em;');
		$menu_date_array['url'] = array('index', 'year'=>$year, 'month'=>$month);
		$this->menu_date[] = $menu_date_array;
	}
	
}

// формируем меню "По теме"
$this->menu_topic = array();
$topic_model_array = TopicModel::model()->findAll();
foreach ($topic_model_array as $obj) 
{
	$count = NewsModel::model()->count('topic_id=:topic_id', array(':topic_id'=>$obj->id));
	$menu_topic_array = array();
	$menu_topic_array['label'] = $obj->name." ($count)";
	$menu_topic_array['url'] = array('index', 'topic'=>$obj->id);
	$this->menu_topic[] = $menu_topic_array; 
}
?>

<h2><?php echo $this->module->description; ?></h2>

<?php 
$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
));
?>
