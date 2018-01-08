<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BoutiquesRepository")
 */
class Boutiques
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    // add your own fields
     /**
     * @ORM\Column(type="string", length=150)
     */
     private $nomBoutique;
     /**
     * @ORM\Column(type="string", length=500)
     */
     private $adressBoutique;
     /**
     * @ORM\Column(type="string", length=300)
     */
     private $horaires;
     /**
     * @ORM\Column(type="integer")
     */
     private $telephone;
     
   
    
     // Getters & Setters
    
     public function getNomBoutique()
    {
        return $this->nomBoutique;
    }
    public function setNomBoutique($nomBoutique)
    {
        return $this->nomBoutique = $nomBoutique;
    }
    
        public function getAdressBoutique()
    {
        return $this->adressBoutique;
    }
    public function setAdressBoutique($adressBoutique)
    {
        return $this->adressBoutique = $adressBoutique;
    }
    
    
     public function getHoraires()
    {
        return $this->horaires;
    }
    public function setHoraires($horaires)
    {
        return $this->horaires = $horaires;
    }
    
    
     public function getTelephone()
    {
        return $this->telephone;
    }
    public function setTelephone($telephone)
    {
        return $this->telephone = $telephone;
    }
     
}
