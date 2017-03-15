<?php
namespace Database;

class Database
{
    protected $adapter;

    public function __construct()
    {
        $this->adapter = new MySqlAdapter;
    }
}

class MysqlAdapter {}




//不好意思，为了比较，就写在同一个文件里里
//依赖注入
class Database
{
    protected $adapter;

    public function __construct(MysqlAdapter $mysqlAdapter)
    {
        $this->adapter = $mysqlAdapter;
    }
}

class MysqlAdapter {}