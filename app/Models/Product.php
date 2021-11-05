<?php


namespace App\Models;


class Product
{
    protected int $id;
    protected string $title;
    protected string $description;
    protected float $price;
    protected string $sku;
    protected string $image;


    /// GET

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }


    ///SET

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @param string $sku
     */
    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }


    //crud

    /**
     * @param array $data
     * @return int
     */
    public function create(array $data): int
    {
        return 1;
    }

    /**
     * @param int $id
     * @return Product
     */
    public function read(int $id): Product
    {
        $this->title = 'My first Product';
        $this->description = 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ';
        $this->price = 2.56;
        $this->sku = 'MVC-SP-PHP-01';
        $this->image = 'https://via.placeholder.com/150';

        return $this;
    }

    /**
     * @param int $id
     * @param int $data
     * @return Product
     */
    public function update(int $id, int $data): Product
    {
        return $this;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return true;
    }
}

