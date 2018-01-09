<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
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
    private $nomProduit;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")*
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie")
     * @ORM\JoinColumn(nullable=true)
     */
    private $categorie;
    /**
     * @ORM\Column(type="integer")*
     * @ORM\ManyToMany(targetEntity="App\Entity\Allergene")
     * @ORM\JoinColumn(nullable=true)
     */
    private $allergene;
    /**
     * @ORM\Column(type="string", length=64)
     */
    private $photo;

    /**
     * @ORM\Column(type="integer")
     */
     private $label;

     /**
     * @ORM\Column(type="integer")
     */
    private $active;
    /**
     * @ORM\Column(type="string", length=64)
     */
    private $urlProd;

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getNomProduit()
    {
        return $this->nomProduit;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getCategorie()
    {
        return $this->categorie;
    }
    public function getAllergene()
    {
        return $this->allergene;
    }
    public function getPhoto()
    {
        return $this->photo;
    }
    public function getLabel()
    {
        return $this->label;
    }
    public function getActive()
    {
        return $this->active;
    }
    public function getUrlProd()
    {
        return $this->urlProd;
    }
    // Setters
    public function setId($id)
    {
        return $this->id = $id;
    }
    public function setNomProduit($nomProduit)
    {
        return $this->nomProduit = $nomProduit;
    }
    public function setDescription($description)
    {
        return $this->description = $description;
    }
    public function setCategorie(Categorie $categorie)
    {
        return $this->categorie = $categorie;
    }
    public function setAllergene(Categorie $allergene)
    {
        return $this->allergene = $allergene;
    }
    public function setPhoto($photo)
    {
        return $this->photo  = $photo;
    }
    public function setLabel($label)
    {
        return $this->label = $label;
    }
    public function setActive($active)
    {
        return $this->active = $active;
    }
    public function setUrlProd($urlProd)
    {
        return $this->urlProd = $urlProd;
    }
}
