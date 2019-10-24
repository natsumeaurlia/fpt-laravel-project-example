<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\AbstractCRUDController;
use App\Http\Request\Admin\BulkRequest;
use App\Http\Request\Admin\IndexRequest;
use App\Http\Request\Admin\Users\UpdateRequest;
use App\Http\Request\Admin\Users\StoreRequest;
use App\Models\User;

/**
 * Class UserController
 * @package App\Http\Controllers\Admin\Users
 */
class UserController extends AbstractCRUDController
{
    public const VIEW_ALIAS = 'admin.users';
    public const ROUTE_ALIAS = 'admin.users';

    protected function model()
    {
        $this->model = new User();
    }

    protected function indexRequestClassName()
    {
        $this->indexRequestClassName = IndexRequest::class;
    }

    protected function storeRequestClassName()
    {
        $this->storeRequestClassName = StoreRequest::class;
    }

    protected function updateRequestClassName()
    {
        $this->updateRequestClassName = UpdateRequest::class;
    }

    protected function bulkRequestClassName()
    {
        $this->updateRequestClassName = BulkRequest::class;
    }
}
