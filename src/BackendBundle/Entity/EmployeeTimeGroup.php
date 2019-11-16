<?php

namespace BackendBundle\Entity;

/**
 * EmployeeTimeGroup
 */
class EmployeeTimeGroup
{
    /**
     * @var integer
     */
    private $idEmployeeTimeGroup;

    /**
     * @var integer
     */
    private $idEmployee;

    /**
     * @var integer
     */
    private $idGroupSchedule;

    /**
     * @var string
     */
    private $hourIn;

    /**
     * @var string
     */
    private $hourOut;

    /**
     * @var \DateTime
     */
    private $startDate;


    /**
     * Get idEmployeeTimeGroup
     *
     * @return integer
     */
    public function getIdEmployeeTimeGroup()
    {
        return $this->idEmployeeTimeGroup;
    }

    /**
     * Set idEmployee
     *
     * @param integer $idEmployee
     *
     * @return EmployeeTimeGroup
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
     * Set idGroupSchedule
     *
     * @param integer $idGroupSchedule
     *
     * @return EmployeeTimeGroup
     */
    public function setIdGroupSchedule($idGroupSchedule)
    {
        $this->idGroupSchedule = $idGroupSchedule;

        return $this;
    }

    /**
     * Get idGroupSchedule
     *
     * @return integer
     */
    public function getIdGroupSchedule()
    {
        return $this->idGroupSchedule;
    }

    /**
     * Set hourIn
     *
     * @param string $hourIn
     *
     * @return EmployeeTimeGroup
     */
    public function setHourIn($hourIn)
    {
        $this->hourIn = $hourIn;

        return $this;
    }

    /**
     * Get hourIn
     *
     * @return string
     */
    public function getHourIn()
    {
        return $this->hourIn;
    }

    /**
     * Set hourOut
     *
     * @param string $hourOut
     *
     * @return EmployeeTimeGroup
     */
    public function setHourOut($hourOut)
    {
        $this->hourOut = $hourOut;

        return $this;
    }

    /**
     * Get hourOut
     *
     * @return string
     */
    public function getHourOut()
    {
        return $this->hourOut;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return EmployeeTimeGroup
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }
}

