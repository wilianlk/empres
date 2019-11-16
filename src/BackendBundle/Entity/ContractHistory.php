<?php

namespace BackendBundle\Entity;

/**
 * ContractHistory
 */
class ContractHistory
{
    /**
     * @var integer
     */
    private $idContractHistory;

    /**
     * @var integer
     */
    private $idEmployee;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var integer
     */
    private $idTypeContract;


    /**
     * Get idContractHistory
     *
     * @return integer
     */
    public function getIdContractHistory()
    {
        return $this->idContractHistory;
    }

    /**
     * Set idEmployee
     *
     * @param integer $idEmployee
     *
     * @return ContractHistory
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
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return ContractHistory
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
     * @return ContractHistory
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
     * Set idTypeContract
     *
     * @param integer $idTypeContract
     *
     * @return ContractHistory
     */
    public function setIdTypeContract($idTypeContract)
    {
        $this->idTypeContract = $idTypeContract;

        return $this;
    }

    /**
     * Get idTypeContract
     *
     * @return integer
     */
    public function getIdTypeContract()
    {
        return $this->idTypeContract;
    }
}
