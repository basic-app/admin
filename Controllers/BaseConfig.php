<?php

namespace BasicApp\Admin\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use StdClass;

abstract class BaseConfig extends \BasicApp\Core\AdminController
{

	public function index()
	{
        $modelClass = $this->request->getGet('class');

        if (!$modelClass)
        {
            throw new PageNotFoundException;
        }

        $messages = [];

        $query = $modelClass::factory();

        $model = $query::createEntity();

        $post = $this->request->getPost();

        if ($post || $_FILES)
        {
            foreach($post as $key => $value)
            {
                if (property_exists($model, $key))
                {
                    $model->$key = $value;
                }
            }

            $object = new StdClass;

            foreach(get_object_vars($model) as $key => $value)
            {
                $object->$key = $value;
            }

            if ($query->save($object))
            {
                $messages[] = t('admin', 'The changes have been successfully saved.');
            
                $model = $query::createEntity(); // refresh
            }
        }

        $errors = $query->getErrors();

        if ($errors === null)
        {
            $errors = [];
        }

		return $this->render('Admin/Config/index', [
			'model' => $model,
            'modelClass' => $modelClass,
			'errors' => $errors,
			'messages' => $messages
		]);
	}

}