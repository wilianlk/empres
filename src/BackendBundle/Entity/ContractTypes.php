<?php

namespace BackendBundle\Entity;

/**
 * ContractTypes
 */
class ContractTypes
{
    /**
     * @var integer
     */
    private $idTypeContract;

    /**
     * @var string
     */
    private $contractName;


    /**
     * Get idTypeContract
     *
     * @return integer
     */
    public function getIdTypeContract()
    {
        return $this->idTypeContract;
    }

    /**
     * Set contractName
     *
     * @param string $contractName
     *
     * @return ContractTypes
     */
    public function setContractName($contractName)
    {
        $this->contractName = $contractName;

        return $this;
    }

    /**
     * Get contractName
     *
     * @return string
     */
    public function getContractName()
    {
        return $this->contractName;
    }
}
