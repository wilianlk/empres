<?php

namespace BackendBundle\Entity;

/**
 * UseBenefit
 */
class UseBenefit
{
    /**
     * @var integer
     */
    private $idUseBenefit;

    /**
     * @var string
     */
    private $idEmployee;

    /**
     * @var integer
     */
    private $idBeneficio;

    /**
     * @var integer
     */
    private $quantity;

    /**
     * @var string
     */
    private $unitMeasure;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var string
     */
    private $createdAt;


    /**
     * Get idUseBenefit
     *
     * @return integer
     */
    public function getIdUseBenefit()
    {
        return $this->idUseBenefit;
    }

    /**
     * Set idEmployee
     *
     * @param string $idEmployee
     *
     * @return UseBenefit
     */
    public function setIdEmployee($idEmployee)
    {
        $this->idEmployee = $idEmployee;

        return $this;
    }

    /**
     * Get idEmployee
     *
     * @return string
     */
    public function getIdEmployee()
    {
        return $this->idEmployee;
    }

    /**
     * Set idBeneficio
     *
     * @param integer $idBeneficio
     *
     * @return UseBenefit
     */
    public function setIdBeneficio($idBeneficio)
    {
        $this->idBeneficio = $idBeneficio;

        return $this;
    }

    /**
     * Get idBeneficio
     *
     * @return integer
     */
    public function getIdBeneficio()
    {
        return $this->idBeneficio;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return UseBenefit
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set unitMeasure
     *
     * @param string $unitMeasure
     *
     * @return UseBenefit
     */
    public function setUnitMeasure($unitMeasure)
    {
        $this->unitMeasure = $unitMeasure;

        return $this;
    }

    /**
     * Get unitMeasure
     *
     * @return string
     */
    public function getUnitMeasure()
    {
        return $this->unitMeasure;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return UseBenefit
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

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return UseBenefit
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set createdAt
     *
     * @param string $createdAt
     *
     * @return UseBenefit
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

}
