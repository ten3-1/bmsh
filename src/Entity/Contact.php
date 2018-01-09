<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
     /**
     * @ORM\Column(type="string", length=200)
     */
    private $nomContact;
    /**
     * @ORM\Column(type="string", length=200)
     */
    private $emailContact;
    /**
     * @ORM\Column(type="string", length=500)
     */
    private $messageContact;

    // add your own fields
    
    
    // Getters & Setters
     public function getNomContact()
    {
        return $this->nomNomContact;
    }
    public function setNomContact($nomContact)
    {
        return $this->nomContact = $nomContact;
    }

        public function getEmailContact()
    {
        return $this->emailContact;
    }
    public function setEmailContact($emailContact)
    {
        return $this->emailContact = $emailContact;
    }

     public function getMessageContact()
    {
        return $this->messageContact;
    }
    public function setMessageContact($messageContact)
    {
        return $this->messageContact = $messageContact;
    }

}
