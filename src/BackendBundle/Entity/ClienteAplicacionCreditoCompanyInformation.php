<?php

namespace BackendBundle\Entity;

/**
 * ClienteAplicacionCreditoCompanyInformation
 */
class ClienteAplicacionCreditoCompanyInformation
{
    /**
     * @var integer
     */
    private $idCreditoClienteCompanyInformation;

    /**
     * @var integer
     */
    private $idCreditoClientes;

    /**
     * @var string
     */
    private $bussinesType;

    /**
     * @var string
     */
    private $bussinesName;

    /**
     * @var integer
     */
    private $taxId;

    /**
     * @var string
     */
    private $businessAddress;

    /**
     * @var string
     */
    private $floor;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $city;

    /**
     * @var integer
     */
    private $zipCode;

    /**
     * @var integer
     */
    private $businessPhoneNumber;

    /**
     * @var integer
     */
    private $yearsInBussines;

    /**
     * @var integer
     */
    private $bussinesAnnualNetIncome;

    /**
     * @var \DateTime
     */
    private $deletedAt;

    /**
     * @var integer
     */
    private $deletedBy;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var integer
     */
    private $createdBy;

    /**
     * @var integer
     */
    private $updatedBy;


    /**
     * Get idCreditoClienteCompanyInformation
     *
     * @return integer
     */
    public function getIdCreditoClienteCompanyInformation()
    {
        return $this->idCreditoClienteCompanyInformation;
    }

    /**
     * Set idCreditoClientes
     *
     * @param integer $idCreditoClientes
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setIdCreditoClientes($idCreditoClientes)
    {
        $this->idCreditoClientes = $idCreditoClientes;

        return $this;
    }

    /**
     * Get idCreditoClientes
     *
     * @return integer
     */
    public function getIdCreditoClientes()
    {
        return $this->idCreditoClientes;
    }

    /**
     * Set bussinesType
     *
     * @param string $bussinesType
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setBussinesType($bussinesType)
    {
        $this->bussinesType = $bussinesType;

        return $this;
    }

    /**
     * Get bussinesType
     *
     * @return string
     */
    public function getBussinesType()
    {
        return $this->bussinesType;
    }

    /**
     * Set bussinesName
     *
     * @param string $bussinesName
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setBussinesName($bussinesName)
    {
        $this->bussinesName = $bussinesName;

        return $this;
    }

    /**
     * Get bussinesName
     *
     * @return string
     */
    public function getBussinesName()
    {
        return $this->bussinesName;
    }

    /**
     * Set taxId
     *
     * @param integer $taxId
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setTaxId($taxId)
    {
        $this->taxId = $taxId;

        return $this;
    }

    /**
     * Get taxId
     *
     * @return integer
     */
    public function getTaxId()
    {
        return $this->taxId;
    }

    /**
     * Set businessAddress
     *
     * @param string $businessAddress
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setBusinessAddress($businessAddress)
    {
        $this->businessAddress = $businessAddress;

        return $this;
    }

    /**
     * Get businessAddress
     *
     * @return string
     */
    public function getBusinessAddress()
    {
        return $this->businessAddress;
    }

    /**
     * Set floor
     *
     * @param string $floor
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;

        return $this;
    }

    /**
     * Get floor
     *
     * @return string
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set zipCode
     *
     * @param integer $zipCode
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return integer
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set businessPhoneNumber
     *
     * @param integer $businessPhoneNumber
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setBusinessPhoneNumber($businessPhoneNumber)
    {
        $this->businessPhoneNumber = $businessPhoneNumber;

        return $this;
    }

    /**
     * Get businessPhoneNumber
     *
     * @return integer
     */
    public function getBusinessPhoneNumber()
    {
        return $this->businessPhoneNumber;
    }

    /**
     * Set yearsInBussines
     *
     * @param integer $yearsInBussines
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setYearsInBussines($yearsInBussines)
    {
        $this->yearsInBussines = $yearsInBussines;

        return $this;
    }

    /**
     * Get yearsInBussines
     *
     * @return integer
     */
    public function getYearsInBussines()
    {
        return $this->yearsInBussines;
    }

    /**
     * Set bussinesAnnualNetIncome
     *
     * @param integer $bussinesAnnualNetIncome
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setBussinesAnnualNetIncome($bussinesAnnualNetIncome)
    {
        $this->bussinesAnnualNetIncome = $bussinesAnnualNetIncome;

        return $this;
    }

    /**
     * Get bussinesAnnualNetIncome
     *
     * @return integer
     */
    public function getBussinesAnnualNetIncome()
    {
        return $this->bussinesAnnualNetIncome;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set deletedBy
     *
     * @param integer $deletedBy
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setDeletedBy($deletedBy)
    {
        $this->deletedBy = $deletedBy;

        return $this;
    }

    /**
     * Get deletedBy
     *
     * @return integer
     */
    public function getDeletedBy()
    {
        return $this->deletedBy;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedBy
     *
     * @param integer $updatedBy
     *
     * @return ClienteAplicacionCreditoCompanyInformation
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return integer
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }
}

