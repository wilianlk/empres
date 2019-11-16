<?php

namespace BackendBundle\Entity;

/**
 * DayScheduleGroup
 */
class DayScheduleGroup
{
    /**
     * @var integer
     */
    private $idDayScheduleGroup;

    /**
     * @var string
     */
    private $dayOfWeek;

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
     * Get idDayScheduleGroup
     *
     * @return integer
     */
    public function getIdDayScheduleGroup()
    {
        return $this->idDayScheduleGroup;
    }

    /**
     * Set dayOfWeek
     *
     * @param string $dayOfWeek
     *
     * @return DayScheduleGroup
     */
    public function setDayOfWeek($dayOfWeek)
    {
        $this->dayOfWeek = $dayOfWeek;

        return $this;
    }

    /**
     * Get dayOfWeek
     *
     * @return string
     */
    public function getDayOfWeek()
    {
        return $this->dayOfWeek;
    }

    /**
     * Set idGroupSchedule
     *
     * @param integer $idGroupSchedule
     *
     * @return DayScheduleGroup
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
     * @return DayScheduleGroup
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
     * @return DayScheduleGroup
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
}

