<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin;

use BasicApp\Crud\CrudTrait;
use BasicApp\Crud\CreateCrudActionTrait;

class BaseAdminCrudController extends AdminController
{

    use CrudTrait;

    use CreateCrudActionTrait;

	protected $modelClass;

	protected $searchModelClass;

	protected $perPage;

	protected $orderBy;

    protected $primaryKey;

	protected $parentKey;
    
}