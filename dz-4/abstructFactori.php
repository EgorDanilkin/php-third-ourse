<?php

interface AbstractFactory
{
    public function createDBConnection(): DBConnection;

    public function createDBRecrord(): DBRecrord;

    public function createDBQueryBuiler(): DBQueryBuiler;
}

class MySqlFactory implements AbstractFactory
{

    public function createDBConnection(): DBConnection
    {
        return new MySqlDBConnection();
    }

    public function createDBRecrord(): DBRecrord
    {
        return new MySqlDBRecrord();
    }

    public function createDBQueryBuiler(): DBQueryBuiler
    {
        return new MySqlBuiler();
    }
}

class PostgreSqlFactory implements AbstractFactory
{

    public function createDBConnection(): DBConnection
    {
        return new PostgreSqlConnection();
    }

    public function createDBRecrord(): DBRecrord
    {
        return new PostgreSqlRecrord();
    }

    public function createDBQueryBuiler(): DBQueryBuiler
    {
        return new PostgreSqlBuiler();
    }
}

class OracleFactory implements AbstractFactory
{

    public function createDBConnection(): DBConnection
    {
        return new OracleConnection();
    }

    public function createDBRecrord(): DBRecrord
    {
        return new OracleRecrord();
    }

    public function createDBQueryBuiler(): DBQueryBuiler
    {
        return new OracleBuiler();
    }
}

interface DBConnection
{
    public function connection();
}

class MySqlDBConnection implements DBConnection
{

    public function connection() : string
    {
        return 'MySqlDb connection established';
    }
}

class PostgreSqlConnection implements DBConnection
{

    public function connection()
    {
        return 'PostgreDb connection established';
    }
}

class OracleConnection implements DBConnection
{

    public function connection()
    {
        return 'OracleDb connection established';
    }
}

interface DBRecrord
{
    public function writeTable();
}

class MySqlDBRecrord implements DBRecrord
{

    public function writeTable()
    {
        // TODO: Implement writeTable() method.
    }
}

class PostgreSqlRecrord implements DBRecrord
{

    public function writeTable()
    {
        // TODO: Implement writeTable() method.
    }
}

class OracleRecrord implements DBRecrord
{

    public function writeTable()
    {
        // TODO: Implement writeTable() method.
    }
}

interface DBQueryBuiler
{
    public function queryBuiler();
}

class MySqlBuiler implements DBQueryBuiler
{
    public function queryBuiler()
    {
        // TODO: Implement queryBuiler() method.
    }
}

class PostgreSqlBuiler implements DBQueryBuiler
{
    public function queryBuiler()
    {
        // TODO: Implement queryBuiler() method.
    }
}

class OracleBuiler implements DBQueryBuiler
{
    public function queryBuiler()
    {
        // TODO: Implement queryBuiler() method.
    }
}


function clientCode(AbstractFactory $factory)
{
    $connection = $factory->createDBConnection();
    $recrord = $factory->createDBRecrord();
    $builer = $factory->createDBQueryBuiler();

    var_dump($connection->connection());
    var_dump($recrord);
    var_dump($builer);
}

clientCode(new MySqlFactory());

clientCode(new PostgreSqlFactory());

clientCode(new OracleFactory());