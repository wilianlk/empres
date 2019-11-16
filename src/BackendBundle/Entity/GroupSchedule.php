<?php

namespace BackendBundle\Entity;

/**
 * GroupSchedule
 */
class GroupSchedule
{
    /**
     * @var integer
     */
    private $idGroupschedule;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $toleranceBeforeIn;

    /**
     * @var integer
     */
    private $toleranceAfterIn;

    /**
     * @var integer
     */
    private $toleranceBeforeOut;

    /**
     * @var integer
     */
    private $toleranceAfterOut;


    /**
     * Get idGroupschedule
     *
     * @return integer
     */
    public function getIdGroupschedule()
    {
        return $this->idGroupschedule;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return GroupSchedule
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

    /**
     * Set toleranceBeforeIn
     *
     * @param integer $toleranceBeforeIn
     *
     * @return GroupSchedule
     */
    public function setToleranceBeforeIn($toleranceBeforeIn)
    {
        $this->toleranceBeforeIn = $toleranceBeforeIn;

        return $this;
    }

    /**
     * Get toleranceBeforeIn
     *
     * @return integer
     */
    public function getToleranceBeforeIn()
    {
        return $this->toleranceBeforeIn;
    }

    /**
     * Set toleranceAfterIn
     *
     * @param integer $toleranceAfterIn
     *
     * @return GroupSchedule
     */
    public function setToleranceAfterIn($toleranceAfterIn)
    {
        $this->toleranceAfterIn = $toleranceAfterIn;

        return $this;
    }

    /**
     * Get toleranceAfterIn
     *
     * @return integer
     */
    public function getToleranceAfterIn()
    {
        return $this->toleranceAfterIn;
    }

    /**
     * Set toleranceBeforeOut
     *
     * @param integer $toleranceBeforeOut
     *
     * @return GroupSchedule
     */
    public function setToleranceBeforeOut($toleranceBeforeOut)
    {
        $this->toleranceBeforeOut = $toleranceBeforeOut;

        return $this;
    }

    /**
     * Get toleranceBeforeOut
     *
     * @return integer
     */
    public function getToleranceBeforeOut()
    {
        return $this->toleranceBeforeOut;
    }

    /**
     * Set toleranceAfterOut
     *
     * @param integer $toleranceAfterOut
     *
     * @return GroupSchedule
     */
    public function setToleranceAfterOut($toleranceAfterOut)
    {
        $this->toleranceAfterOut = $toleranceAfterOut;

        return $this;
    }

    /**
     * Get toleranceAfterOut
     *
     * @return integer
     */
    public function getToleranceAfterOut()
    {
        return $this->toleranceAfterOut;
    }
}

