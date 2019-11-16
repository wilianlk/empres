<?php

namespace BackendBundle\Entity;

/**
 * Offices
 */
class Offices
{
    /**
     * @var integer
     */
    private $officeid;

    /**
     * @var string
     */
    private $officename = '';


    /**
     * Get officeid
     *
     * @return integer
     */
    public function getOfficeid()
    {
        return $this->officeid;
    }

    /**
     * Set officename
     *
     * @param string $officename
     *
     * @return Offices
     */
    public function setOfficename($officename)
    {
        $this->officename = $officename;

        return $this;
    }

    /**
     * Get officename
     *
     * @return string
     */
    public function getOfficename()
    {
        return $this->officename;
    }
    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $state;


    /**
     * Set country
     *
     * @param string $country
     *
     * @return Offices
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Offices
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }
}
