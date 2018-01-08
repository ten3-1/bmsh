<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
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
    private $nomCategorie;

    // Getters & Setters
    public function getId()
    {
        return $this->id;
    }
    public function getNomCategorie()
    {
        return $this->nomCategorie;
    }
    public function setId($id)
    {
        return $this->id = $id;
    }
    public function setNomCategorie($nomCategorie)
    {
        return $this->nomCategorie = $nomCategorie;
    }

}
