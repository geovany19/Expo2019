<?php
//Clase para realizar las operaciones en la base de datos
class Database
{
    private static $connection = null;
    private static $statement = null;
    private static $id = null;

/*
    Método para establecer la conexión con la base de datos utilizando las credenciales respectivas.
    No recibe parámetros y no devuelve ningún valor, capturando las excepciones del servidor de bases de datos.
*/
    private function connect()
    {
        $server = 'localhost';
        $database = 'sismed';
        $username = 'root';
        $password = '';
        try {
            @self::$connection = new PDO('mysql:host=' . $server . '; dbname=' . $database . '; charset=utf8', $username, $password);
        } catch (PDOException $error) {
            exit(self::getException($error->getCode(), $error->getMessage()));
        }
    }

    /*
    Método para anular la conexión con la base de datos y capturar la información de las excepciones en las sentencias SQL.
    No recibe parámetros y no devuelve ningún valor.
    */
    private function disconnect()
    {
        self::$connection = null;
        $error = self::$statement->errorInfo();
        if ($error[0] != '00000') {
            exit(self::getException($error[1], $error[2]));
        }
    }


}
