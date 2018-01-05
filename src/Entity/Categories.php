<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesRepository")
 */
class Categories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields
    /**
     * @ORM\Column(type="string", length=128)
     */
    private $cat;

    // Getters & Setters
    public function getId()
    {
        return $this->id;
    }
    public function getCat()
    {
        return $this->cat;
    }
    public function setId($id)
    {
        return $this->id = $id;
    }
    public function setCat($cat)
    {
        return $this->cat = $cat;
    }
}
