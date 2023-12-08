<?php
class DB extends DBmysql
{

    public $dbhost     = 'mariadb';
    public $dbuser     = 'root';
    public $dbpassword = '123456';
    public $dbdefault  = 'psgitsm';


    public function __construct($choice = null)
    {
        $this->dbhost     = getenv("GLPI_DB_HOST") ?: $this->dbhost;
        $this->dbuser     = getenv("GLPI_DB_USER") ?: $this->dbuser;
        $this->dbpassword =  getenv("GLPI_DB_PASSWORD") ?: $this->dbpassword;
        $this->dbdefault  = getenv("GLPI_DB_DATABASE") ?: $this->dbdefault;

        parent::__construct($choice);
    }
}
