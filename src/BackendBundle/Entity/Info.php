<?php

namespace BackendBundle\Entity;

/**
 * Info
 */
class Info
{
    /**
     * @var integer
     */
    private $idInfo;

    /**
     * @var integer
     */
    private $idEmployee;

    /**
     * @var string
     */
    private $fullname = '';

    /**
     * @var string
     */
    private $inout = '';

    /**
     * @var integer
     */
    private $timestamp;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var string
     */
    private $ipaddress = '';

    /**
     * @var string
     */
    private $os;

    /**
     * @var string
     */
    private $browser;

    /**
     * @var string
     */
    private $screenResolu;

    /**
     * @var string
     */
    private $device;


    /**
     * Get idInfo
     *
     * @return integer
     */
    public function getIdInfo()
    {
        return $this->idInfo;
    }

    /**
     * Set idEmployee
     *
     * @param integer $idEmployee
     *
     * @return Info
     */
    public function setIdEmployee($idEmployee)
    {
        $this->idEmployee = $idEmployee;

        return $this;
    }

    /**
     * Get idEmployee
     *
     * @return integer
     */
    public function getIdEmployee()
    {
        return $this->idEmployee;
    }

    /**
     * Set fullname
     *
     * @param string $fullname
     *
     * @return Info
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set inout
     *
     * @param string $inout
     *
     * @return Info
     */
    public function setInout($inout)
    {
        $this->inout = $inout;

        return $this;
    }

    /**
     * Get inout
     *
     * @return string
     */
    public function getInout()
    {
        return $this->inout;
    }

    /**
     * Set timestamp
     *
     * @param integer $timestamp
     *
     * @return Info
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return integer
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Info
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set ipaddress
     *
     * @param string $ipaddress
     *
     * @return Info
     */
    public function setIpaddress($ipaddress)
    {
        $this->ipaddress = $ipaddress;

        return $this;
    }

    /**
     * Get ipaddress
     *
     * @return string
     */
    public function getIpaddress()
    {
        return $this->ipaddress;
    }

    /**
     * Set os
     *
     * @param string $os
     *
     * @return Info
     */
    public function setOs($os)
    {
        $this->os = $os;

        return $this;
    }

    /**
     * Get os
     *
     * @return string
     */
    public function getOs()
    {
        return $this->os;
    }

    /**
     * Set browser
     *
     * @param string $browser
     *
     * @return Info
     */
    public function setBrowser($browser)
    {
        $this->browser = $browser;

        return $this;
    }

    /**
     * Get browser
     *
     * @return string
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * Set screenResolu
     *
     * @param string $screenResolu
     *
     * @return Info
     */
    public function setScreenResolu($screenResolu)
    {
        $this->screenResolu = $screenResolu;

        return $this;
    }

    /**
     * Get screenResolu
     *
     * @return string
     */
    public function getScreenResolu()
    {
        return $this->screenResolu;
    }

    /**
     * Set device
     *
     * @param string $device
     *
     * @return Info
     */
    public function setDevice($device)
    {
        $this->device = $device;

        return $this;
    }

    /**
     * Get device
     *
     * @return string
     */
    public function getDevice()
    {
        return $this->device;
    }
}

