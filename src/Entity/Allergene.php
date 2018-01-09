<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AllergeneRepository")
 */
class Allergene
{
    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }
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
    private $nomAllergene;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $icone;

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getNomAllergene()
    {
        return $this->nomAllergene;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getIcone()
    {
        return $this->icone;
    }
    // Setters
    public function setId($id)
    {
        return $this->id = $id;
    }
    public function setNomAlergene($nomAllergene)
    {
        return $this->nomAllergene = $nomAllergene;
    }
    public function setDescription($description)
    {
        return $this->description = $description;
    }
    public function setIcone($icone)
    {
        return $this->icone = $icone;
    }
}
