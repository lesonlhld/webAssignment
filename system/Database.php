<?php

namespace System;

use PDO;

/**
 * Database
 * Use PDO (PHP Data Object) to interact with MySQL Database
 * Throw an exception if connection fails
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Database
{
    // Config
    // For localhost
    private $server_dev = 'localhost';
    private $username_dev = 'web_database';
    private $password_dev = 'web_database_password';
    private $dbname_dev = 'web_assignment';

    // For domain
    private $server_pro = 'sql6.freemysqlhosting.net';
    private $username_pro = 'sql6436525';
    private $password_pro = 'CzsrXyxFwE';
    private $dbname_pro = 'sql6436525';

    private $charset = 'utf8mb4';

    protected $pdo;

    // Setting Database Source Name (DSN)
    function __construct()
    {
        try {
            switch (ENVIRONMENT) {
                case 'development':
                    $dsn = 'mysql:host=' . $this->server_dev . ';dbname=' . $this->dbname_dev . ';charset=' . $this->charset;
                    $user_name = $this->username_dev;
                    $password = $this->password_dev;
                    break;

                case 'production':
                    $dsn = 'mysql:host=' . $this->server_pro . ';dbname=' . $this->dbname_pro . ';charset=' . $this->charset;
                    $user_name = $this->username_pro;
                    $password = $this->password_pro;
                    break;

                default:
                    exit('The application environment is not set correctly.');
                    break;
            }
            $this->pdo = new PDO(
                $dsn,
                $user_name,
                $password,
                [
                    PDO::ATTR_PERSISTENT            => true,
                    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION
                ]
            );
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {
            exit('Could not connect to any database servers with error: ' . $e->getMessage());
        } catch (\PDOException $e) {
            echo 'ERROR!';
            print_r($e);
        }
    }
}
