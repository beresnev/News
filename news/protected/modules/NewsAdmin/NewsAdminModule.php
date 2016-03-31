<?php

class NewsAdminModule extends CWebModule
{
	// переопределяем контроллер по умолчанию
	public $defaultController = 'NewsAdmin';

	// описание (высвечивается в заголовках)
	public $description = 'Админка';
	
	public function init()
	{
		$this->setImport(array(
			'NewsAdmin.models.*',
			'NewsAdmin.components.*',
		));
	}

}
