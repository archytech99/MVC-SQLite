<?php

namespace archytech99\Core;

/**
 * Class SQLiteDatabase
 * @mixin \PDO
 */
class SQLiteDatabase
{
    /**
     * PDO instance
     * @var \PDO
     */
    private $dbh;

    /**
     * statement query PDO
     * @var \PDO
     */
    private $stmt;

    /**
     * connect to the SQLite database
     * @return \PDO
     */
    public function __construct() {
        $dsn = "sqlite:" . SQLITE_FILE;
        $opt = [
            \PDO::ATTR_PERSISTENT => true,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        ];

        if ($this->dbh == null) {
            try {
                $this->dbh = new \PDO($dsn, null, null, $opt);
            } catch (\PDOException $e) {
                die($e->getMessage());
            }
        }
    }

    /**
     * Get the table list in the database
     * @return array
     */
    public function getTableList() {
        $stmt = $this->dbh->query("SELECT name FROM sqlite_master WHERE type = 'table' ORDER BY name");
        $tables = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tables[] = $row['name'];
        }
        
        return $tables;
    }

    /**
     * @param $query
     */
    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    /**
     * @param $param
     * @param $value
     * @param null $type
     */
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch(true) {
                case is_int($value) :
                    $type = \PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = \PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = \PDO::PARAM_NULL;
                    break;
                default :
                    $type = \PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute() {
        $this->stmt->execute();
    }

    public function get() {
        $this->execute();
        $results = $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
        $this->stmt->closeCursor();
        if (count($results) == 0) {
            $results = [
                'status'=> false,
                'results'=>'Data tidak ditemukkan!'
            ];
        } else {
            $results = [
                'status'=> true,
                'results'=> stdClass($results, true)
            ];
        }
        
        return $results;
    }
    
    public function first() {
        $this->execute();
        $results = $this->stmt->fetch(\PDO::FETCH_ASSOC);
        $this->stmt->closeCursor();
        if (!$results) {
            $results = [
                'status'=> false,
                'results'=>'Data tidak ditemukkan!'
            ];
        } else {
            $results = [
                'status'=> true,
                'results'=> stdClass($results)
            ];
        }
        
        return $results;
    }
    
}