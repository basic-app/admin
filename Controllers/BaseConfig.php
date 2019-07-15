<?php

namespace BasicApp\Admin\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use stdClass;

abstract class BaseConfig extends \BasicApp\Admin\AdminController
{

	public function index()
	{
        $modelClass = $this->request->getGet('class');

        if (!$modelClass)
        {
            throw new PageNotFoundException;
        }

        $messages = [];

        $model = $modelClass::factory();

        $row = $model::createEntity();

        $post = $this->request->getPost();

        if ($post || $_FILES)
        {
            foreach($post as $key => $value)
            {
                if (property_exists($row, $key))
                {
                    $row->$key = $value;
                }
            }

            $publicProperties = [];

            foreach(get_object_vars($row) as $key => $value)
            {
                $publicProperties[$key] = $value;
            }

            if ($model->save($publicProperties))
            {
                $messages[] = t('admin', 'The changes have been successfully saved.');
            
                $row = $model::createEntity(); // refresh
            }
        }

        $errors = $model->errors();

        if ($errors === null)
        {
            $errors = [];
        }

		return $this->render('BasicApp\Admin\Config\index', [
			'model' => $model,
            'row' => $row,
            'modelClass' => $modelClass,
			'errors' => $errors,
			'messages' => $messages
		]);
	}

}