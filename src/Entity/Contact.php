<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    protected string $civilite;
    protected string $name;
    protected string $email_contact;
    protected string $telephone;
    protected string $raison;
    protected string $avec;
    protected string $disponibilite;
    protected string $description;
    protected string $charges;

    /**
     * @return string
     */
    public function getCivilite(): string
    {
        return $this->civilite;
    }

    /**
     * @param string $civilite
     * @return Contact
     */
    public function setCivilite(string $civilite): Contact
    {
        $this->civilite = $civilite;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Contact
     */
    public function setName(string $name): Contact
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailContact(): string
    {
        return $this->email_contact;
    }

    /**
     * @param string $email_contact
     * @return Contact
     */
    public function setEmailContact(string $email_contact): Contact
    {
        $this->email_contact = $email_contact;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     * @return Contact
     */
    public function setTelephone(string $telephone): Contact
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * @return string
     */
    public function getRaison(): string
    {
        return $this->raison;
    }

    /**
     * @param string $raison
     * @return Contact
     */
    public function setRaison(string $raison): Contact
    {
        $this->raison = $raison;
        return $this;
    }

    /**
     * @return string
     */
    public function getAvec(): string
    {
        return $this->avec;
    }

    /**
     * @param string $avec
     * @return Contact
     */
    public function setAvec(string $avec): Contact
    {
        $this->avec = $avec;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisponibilite(): string
    {
        return $this->disponibilite;
    }

    /**
     * @param string $disponibilite
     * @return Contact
     */
    public function setDisponibilite(string $disponibilite): Contact
    {
        $this->disponibilite = $disponibilite;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Contact
     */
    public function setDescription(string $description): Contact
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getCharges(): string
    {
        return $this->charges;
    }

    /**
     * @param string $charges
     * @return Contact
     */
    public function setCharges(string $charges): Contact
    {
        $this->charges = $charges;
        return $this;
    }
}