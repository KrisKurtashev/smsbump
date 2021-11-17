<?php


class Database
{
    protected $connection;


    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);

            if ( mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    protected function connectPDO()
    {

        try {
            $this->connection = new PDO('mysql:host='. DB_HOST . ';dbname=' . DB_DATABASE_NAME , DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
            die();
        }
    }

    public function select($query = "" , $params = [])
    {
        try {
            $stmt = $this->executeStatement( $query , $params );
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close(); return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }

        return false;
    }


    private function executeStatement($query = "" , $params = [])
    {
        try {

            $stmt = $this->connection->prepare( $query );

            if($stmt === false) {

                throw New Exception("Unable to do prepared statement: " . $query);
            }

            if( $params ) {
                $arraySize = count($params);

                switch ($arraySize) {
                    case 2:
                        $stmt->bind_param($params[0], $params[1]);
                        break;
                    case 4:
                        $stmt->bind_param($params[0], $params[1], $params[2], $params[3] );
                        break;
                }
               // call_user_func_array(array(&$stmt, 'bind_param'), $params);
                //$stmt->bind_param($params[0], $params[1]);
            }

            $stmt->execute();

            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }
}