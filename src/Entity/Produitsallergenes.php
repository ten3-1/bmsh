<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitsallergenesRepository")
 */
class Produitsallergenes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields
    /**
     * @ORM\Column(type="integer", length=128)
     */
    private $idProduit;

    /**
     * @ORM\Column(type="integer", length=256)
     */
    private $idAllergene;

    // Getters & Setters
    public function getId()
    {
        return $this->id;
    }
    public function getIdProduit()
    {
        return $this->idProduit;
    }
    public function getIdAllergene()
    {
        return $this->idAllergene;
    }
    public function setId()
    {
        return $this->id = $id;
    }
    public function setIdProduit($idProduit)
    {
        return $this->idProduit = $idProduit;
    }
    public function setIdAllergene($idAllergene)
    {
        return $this->idAllergene = $idAllergene;
    }
}
