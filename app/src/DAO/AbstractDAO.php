<?php


namespace App\DAO;


abstract class AbstractDAO
{
    protected string $tableName;

    protected \PDO $pdo;

    protected string $selectOneQuery;

    /**
     * PersonDAO constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo, string $tableName)
    {
        $this->pdo = $pdo;
        $this->tableName = $this->secureSQLString($tableName);
    }

    protected function secureSQLString($value){
        return "`".str_replace(";", "",$value)."`";
    }

    public function deleteOneById(int $id){
        $sql = "DELETE FROM ". $this->tableName ." WHERE id=?";
        $statement = $this->pdo->prepare($sql);
        return $statement->execute([$id]);
    }

    public function findAll(){
        $sql = "SELECT * FROM {$this->tableName}";
        $statement = $this->pdo->query($sql);
        return $statement->fetchAll();
    }

    public function findOneById(int $id){
        $sql = "SELECT * FROM {$this->tableName} WHERE id=?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch();
    }

    protected function doInsert(string $sqlQuery, array $data, $entity){
        $statement = $this->pdo->prepare($sqlQuery);
        $statement->execute($data);
        // Récupération de l'id généré dans la BD
        $entity->setId($this->pdo->lastInsertId());
    }

    protected function doExecute(string $sql, array $data){
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }
}