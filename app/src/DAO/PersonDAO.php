<?php
namespace App\DAO;

use App\Model\Person;
use PDO;

class PersonDAO extends AbstractDAO
{
    /**
     * PersonDAO constructor.
     */
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "persons");
    }


    /**
     * Insertion d'un objet Person dans la BD
     * @param Person $person
     */
    public function insertOne(Person $person){
        $sql = "INSERT INTO persons (name, firstName) VALUES (?,?)";
        $data = [
            $person->getName(),
            $person->getFirstName()
        ];
        $this->doInsert($sql, $data, $person);
    }

    public function updateOne(Person $person){
        $sql = "UPDATE persons SET name=?, firstName=? WHERE id= ?";
        $data = [
            $person->getName(),
            $person->getFirstName(),
            $person->getId()
        ];
        $this->doExecute($sql, $data);
    }









}