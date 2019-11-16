<?php

namespace BackendBundle\Entity;

/**
 * InfoSupervisor
 */
class InfoSupervisor
{
    /**
     * @var integer
     */
    private $idInfoSupervisor;

    /**
     * @var integer
     */
    private $idSupervisor;

    /**
     * @var array
     */
    private $revisedSupervisor;

    /**
     * @var string
     */
    private $supervisorNotes;

    /**
     * @var string
     */
    private $options;


    /**
     * Get idInfoSupervisor
     *
     * @return integer
     */
    public function getIdInfoSupervisor()
    {
        return $this->idInfoSupervisor;
    }

    /**
     * Set idSupervisor
     *
     * @param integer $idSupervisor
     *
     * @return InfoSupervisor
     */
    public function setIdSupervisor($idSupervisor)
    {
        $this->idSupervisor = $idSupervisor;

        return $this;
    }

    /**
     * Get idSupervisor
     *
     * @return integer
     */
    public function getIdSupervisor()
    {
        return $this->idSupervisor;
    }

    /**
     * Set revisedSupervisor
     *
     * @param array $revisedSupervisor
     *
     * @return InfoSupervisor
     */
    public function setRevisedSupervisor($revisedSupervisor)
    {
        $this->revisedSupervisor = $revisedSupervisor;

        return $this;
    }

    /**
     * Get revisedSupervisor
     *
     * @return array
     */
    public function getRevisedSupervisor()
    {
        return $this->revisedSupervisor;
    }

    /**
     * Set supervisorNotes
     *
     * @param string $supervisorNotes
     *
     * @return InfoSupervisor
     */
    public function setSupervisorNotes($supervisorNotes)
    {
        $this->supervisorNotes = $supervisorNotes;

        return $this;
    }

    /**
     * Get supervisorNotes
     *
     * @return string
     */
    public function getSupervisorNotes()
    {
        return $this->supervisorNotes;
    }

    /**
     * Set options
     *
     * @param string $options
     *
     * @return InfoSupervisor
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get options
     *
     * @return string
     */
    public function getOptions()
    {
        return $this->options;
    }
}

