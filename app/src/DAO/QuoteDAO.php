<?php


namespace App\DAO;


use App\Model\Quote;
use PDO;

class QuoteDAO extends AbstractDAO
{


    /**
     * QuoteDAO constructor.
     */
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "citations");
    }

    /**
     * Insertion d'un objet Quote dans la BD
     * @param Quote $quote
     */
    public function insertOne(Quote $quote){
        $sql = "INSERT INTO citations (texte, auteur) VALUES (?,?)";
        $data = [
            $quote->getText(),
            $quote->getAuthor()
        ];
        $this->doInsert($sql, $data, $quote);
    }

    /**
     * Mise à jour d'un objet Quote dans la BD
     * @param Quote $quote
     */
    public function updateOne(Quote $quote){
        $sql = "UPDATE citations SET texte=?, auteur=? WHERE id= ?";
        $data = [
            $quote->getText(),
            $quote->getAuthor(),
            $quote->getId()
        ];
        $this->doExecute($sql, $data);
    }

    public function findByTerm(string $term){
        $sql = "SELECT * FROM citations WHERE texte LIKE :term OR auteur LIKE :term";
        $data = ["term" => "%{$term}%"];
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
        return $statement->fetchAll();
    }
}