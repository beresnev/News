<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column_2',
	 * meaning using a single column layout. See 'protected/views/layouts/column_2.php'.
	 */
	public $layout='//layouts/column_2';
	
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	// меню для админки
	public $menu=array();
	// меню для модуля просмотра новостей (вывод всех годов для которых есть публикации, для каждого года вывод месяцев)
	public $menu_date=array();
	// меню для модуля просмотра новостей (вывод всех тем)
	public $menu_topic=array();
	
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
}