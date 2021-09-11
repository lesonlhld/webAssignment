<?php

namespace System;

/**
 * Database
 * Use PDO (PHP Data Object) to interact with MySQL Database
 * Throw an exception if connection fails
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Database
{
    // Config
    private $server = 'localhost';
    private $username = 'web_database';
    private $password = 'web_database_password';
    private $dbname = 'web_assignment';
    private $charset = 'utf8mb4';

    protected $pdo;
    
    // Setting Database Source Name (DSN)
    function __construct()
    {
        try {
            $dsn = 'mysql:host=' . $this->server . ';dbname=' . $this->dbname . ';charset=' . $this->charset;
            $this->pdo = new \PDO(
                $dsn,
                $this->username,
                $this->password,
                [
                    \PDO::ATTR_PERSISTENT            => true,
                    \PDO::ATTR_ERRMODE               => \PDO::ERRMODE_EXCEPTION
                ]
            );
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {
            exit('Could not connect to any database servers with error: ' . $e->getMessage());
        } catch (\PDOException $e) {
            echo 'ERROR!';
            print_r($e);
        }
    }
}
