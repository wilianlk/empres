<?php

namespace BackendBundle\Entity;

/**
 * SupervisorNotification
 */
class SupervisorNotification
{
    /**
     * @var integer
     */
    private $idSupervisorNotification;

    /**
     * @var boolean
     */
    private $state;

    /**
     * @var string
     */
    private $nota;

    /**
     * @var string
     */
    private $inout;

    /**
     * @var integer
     */
    private $idEmployee;

    /**
     * @var string
     */
    private $typeOfPermit;


    /**
     * Get idSupervisorNotification
     *
     * @return integer
     */
    public function getIdSupervisorNotification()
    {
        return $this->idSupervisorNotification;
    }

    /**
     * Set state
     *
     * @param integer $state
     *
     * @return SupervisorNotification
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set nota
     *
     * @param string $nota
     *
     * @return SupervisorNotification
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return string
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set inout
     *
     * @param string $inout
     *
     * @return SupervisorNotification
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
     * Set idEmployee
     *
     * @param integer $idEmployee
     *
     * @return SupervisorNotification
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
     * Set typeOfPermit
     *
     * @param string $typeOfPermit
     *
     * @return SupervisorNotification
     */
    public function setTypeOfPermit($typeOfPermit)
    {
        $this->typeOfPermit = $typeOfPermit;

        return $this;
    }

    /**
     * Get typeOfPermit
     *
     * @return string
     */
    public function getTypeOfPermit()
    {
        return $this->typeOfPermit;
    }
}

