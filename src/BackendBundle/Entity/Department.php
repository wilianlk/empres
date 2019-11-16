<?php

namespace BackendBundle\Entity;

/**
 * Department
 */
class Department
{
    /**
     * @var integer
     */
    private $idDepartment;

    /**
     * @var string
     */
    private $name;


    /**
     * Get idDepartment
     *
     * @return integer
     */
    public function getIdDepartment()
    {
        return $this->idDepartment;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Department
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
