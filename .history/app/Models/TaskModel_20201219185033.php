<?php
namespace  App/Models;

use CodeIgniter/Model;

class TaskModel.php extends Model
{
    protected table      = 'tableName';
    protected primaryKey = 'id';

    protected returnType = 'array';
    protected useSoftDeletes = true;

    protected allowedFields = [];

    protected useTimestamps = false;
    protected createdField  = 'created_at';
    protected updatedField  = 'updated_at';
    protected deletedField  = 'deleted_at';

    protected validationRules    = [];
    protected validationMessages = [];
    protected skipValidation     = false;
}