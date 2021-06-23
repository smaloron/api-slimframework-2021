<?php


namespace App\Model;


class Quote
{

    private int $id;

    private string $text;

    private string $author;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Quote
     */
    public function setId(int $id): Quote
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Quote
     */
    public function setText(string $text): Quote
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return Quote
     */
    public function setAuthor(string $author): Quote
    {
        $this->author = $author;

        return $this;
    }



}