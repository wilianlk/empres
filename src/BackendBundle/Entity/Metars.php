<?php

namespace BackendBundle\Entity;

/**
 * Metars
 */
class Metars
{
    /**
     * @var string
     */
    private $station = '';

    /**
     * @var string
     */
    private $metar = '';

    /**
     * @var \DateTime
     */
    private $timestamp = 'CURRENT_TIMESTAMP';


    /**
     * Get station
     *
     * @return string
     */
    public function getStation()
    {
        return $this->station;
    }

    /**
     * Set metar
     *
     * @param string $metar
     *
     * @return Metars
     */
    public function setMetar($metar)
    {
        $this->metar = $metar;

        return $this;
    }

    /**
     * Get metar
     *
     * @return string
     */
    public function getMetar()
    {
        return $this->metar;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     *
     * @return Metars
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
}
