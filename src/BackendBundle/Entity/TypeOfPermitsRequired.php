<?php

namespace BackendBundle\Entity;

/**
 * TypeOfPermitsRequired
 */
class TypeOfPermitsRequired
{
    /**
     * @var integer
     */
    private $idTypeOfPermits;

    /**
     * @var string
     */
    private $name;


    /**
     * Get idTypeOfPermits
     *
     * @return integer
     */
    public function getIdTypeOfPermits()
    {
        return $this->idTypeOfPermits;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return TypeOfPermitsRequired
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

