<?php

class NewsListModule extends CWebModule
{
	// переопределяем контроллер по умолчанию
	public $defaultController = 'NewsList';
	
	// описание (высвечивается в заголовках)
	public $description = 'Просмотр новостей';
	
	public function init()
	{
		$this->setImport(array(
			'NewsList.models.*',
			'NewsList.components.*',
		));
	}
}
