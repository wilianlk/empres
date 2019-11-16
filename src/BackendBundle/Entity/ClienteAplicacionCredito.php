<?php

namespace BackendBundle\Entity;

/**
 * ClienteAplicacionCredito
 */
class ClienteAplicacionCredito
{
    /**
     * @var integer
     */
    private $idCreditoClientes;

    /**
     * @var integer
     */
    private $idCliente;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $address;

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
     * @var string
     */
    private $zipCode;

    /**
     * @var string
     */
    private $mobile;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $language;

    /**
     * @var \DateTime
     */
    private $birthdate;

    /**
     * @var string
     */
    private $income;

    /**
     * @var integer
     */
    private $tipoIdentificacion;

    /**
     * @var string
     */
    private $tipoIdentificacionNumber;

    /**
     * @var string
     */
    private $tipoIdentificacionStateCountry;

    /**
     * @var \DateTime
     */
    private $tipoIdentificacionDueDate;

    /**
     * @var string
     */
    private $personalReferenceName;

    /**
     * @var string
     */
    private $personalReferenceLastName;

    /**
     * @var string
     */
    private $personalReferenceMobile;

    /**
     * @var string
     */
    private $personalReferenceRelation;

    /**
     * @var string
     */
    private $personalReferenceName2;

    /**
     * @var string
     */
    private $personalReferenceLastName2;

    /**
     * @var string
     */
    private $personalReferenceMobile2;

    /**
     * @var string
     */
    private $personalReferenceRelation2;

    /**
     * @var string
     */
    private $signatureRequired;

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
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     */
    private $updatedAt = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     */
    private $createdBy = '1';

    /**
     * @var integer
     */
    private $updatedBy = '1';


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
     * Set idCliente
     *
     * @param integer $idCliente
     *
     * @return ClienteAplicacionCredito
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    /**
     * Get idCliente
     *
     * @return integer
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ClienteAplicacionCredito
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
     * Set lastname
     *
     * @param string $lastname
     *
     * @return ClienteAplicacionCredito
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return ClienteAplicacionCredito
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set floor
     *
     * @param string $floor
     *
     * @return ClienteAplicacionCredito
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
     * @return ClienteAplicacionCredito
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
     * @return ClienteAplicacionCredito
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
     * @param string $zipCode
     *
     * @return ClienteAplicacionCredito
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return ClienteAplicacionCredito
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return ClienteAplicacionCredito
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set language
     *
     * @param string $language
     *
     * @return ClienteAplicacionCredito
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     *
     * @return ClienteAplicacionCredito
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set income
     *
     * @param string $income
     *
     * @return ClienteAplicacionCredito
     */
    public function setIncome($income)
    {
        $this->income = $income;

        return $this;
    }

    /**
     * Get income
     *
     * @return string
     */
    public function getIncome()
    {
        return $this->income;
    }

    /**
     * Set tipoIdentificacion
     *
     * @param integer $tipoIdentificacion
     *
     * @return ClienteAplicacionCredito
     */
    public function setTipoIdentificacion($tipoIdentificacion)
    {
        $this->tipoIdentificacion = $tipoIdentificacion;

        return $this;
    }

    /**
     * Get tipoIdentificacion
     *
     * @return integer
     */
    public function getTipoIdentificacion()
    {
        return $this->tipoIdentificacion;
    }

    /**
     * Set tipoIdentificacionNumber
     *
     * @param string $tipoIdentificacionNumber
     *
     * @return ClienteAplicacionCredito
     */
    public function setTipoIdentificacionNumber($tipoIdentificacionNumber)
    {
        $this->tipoIdentificacionNumber = $tipoIdentificacionNumber;

        return $this;
    }

    /**
     * Get tipoIdentificacionNumber
     *
     * @return string
     */
    public function getTipoIdentificacionNumber()
    {
        return $this->tipoIdentificacionNumber;
    }

    /**
     * Set tipoIdentificacionStateCountry
     *
     * @param string $tipoIdentificacionStateCountry
     *
     * @return ClienteAplicacionCredito
     */
    public function setTipoIdentificacionStateCountry($tipoIdentificacionStateCountry)
    {
        $this->tipoIdentificacionStateCountry = $tipoIdentificacionStateCountry;

        return $this;
    }

    /**
     * Get tipoIdentificacionStateCountry
     *
     * @return string
     */
    public function getTipoIdentificacionStateCountry()
    {
        return $this->tipoIdentificacionStateCountry;
    }

    /**
     * Set tipoIdentificacionDueDate
     *
     * @param \DateTime $tipoIdentificacionDueDate
     *
     * @return ClienteAplicacionCredito
     */
    public function setTipoIdentificacionDueDate($tipoIdentificacionDueDate)
    {
        $this->tipoIdentificacionDueDate = $tipoIdentificacionDueDate;

        return $this;
    }

    /**
     * Get tipoIdentificacionDueDate
     *
     * @return \DateTime
     */
    public function getTipoIdentificacionDueDate()
    {
        return $this->tipoIdentificacionDueDate;
    }

    /**
     * Set personalReferenceName
     *
     * @param string $personalReferenceName
     *
     * @return ClienteAplicacionCredito
     */
    public function setPersonalReferenceName($personalReferenceName)
    {
        $this->personalReferenceName = $personalReferenceName;

        return $this;
    }

    /**
     * Get personalReferenceName
     *
     * @return string
     */
    public function getPersonalReferenceName()
    {
        return $this->personalReferenceName;
    }

    /**
     * Set personalReferenceLastName
     *
     * @param string $personalReferenceLastName
     *
     * @return ClienteAplicacionCredito
     */
    public function setPersonalReferenceLastName($personalReferenceLastName)
    {
        $this->personalReferenceLastName = $personalReferenceLastName;

        return $this;
    }

    /**
     * Get personalReferenceLastName
     *
     * @return string
     */
    public function getPersonalReferenceLastName()
    {
        return $this->personalReferenceLastName;
    }

    /**
     * Set personalReferenceMobile
     *
     * @param string $personalReferenceMobile
     *
     * @return ClienteAplicacionCredito
     */
    public function setPersonalReferenceMobile($personalReferenceMobile)
    {
        $this->personalReferenceMobile = $personalReferenceMobile;

        return $this;
    }

    /**
     * Get personalReferenceMobile
     *
     * @return string
     */
    public function getPersonalReferenceMobile()
    {
        return $this->personalReferenceMobile;
    }

    /**
     * Set personalReferenceRelation
     *
     * @param string $personalReferenceRelation
     *
     * @return ClienteAplicacionCredito
     */
    public function setPersonalReferenceRelation($personalReferenceRelation)
    {
        $this->personalReferenceRelation = $personalReferenceRelation;

        return $this;
    }

    /**
     * Get personalReferenceRelation
     *
     * @return string
     */
    public function getPersonalReferenceRelation()
    {
        return $this->personalReferenceRelation;
    }

    /**
     * Set personalReferenceName2
     *
     * @param string $personalReferenceName2
     *
     * @return ClienteAplicacionCredito
     */
    public function setPersonalReferenceName2($personalReferenceName2)
    {
        $this->personalReferenceName2 = $personalReferenceName2;

        return $this;
    }

    /**
     * Get personalReferenceName2
     *
     * @return string
     */
    public function getPersonalReferenceName2()
    {
        return $this->personalReferenceName2;
    }

    /**
     * Set personalReferenceLastName2
     *
     * @param string $personalReferenceLastName2
     *
     * @return ClienteAplicacionCredito
     */
    public function setPersonalReferenceLastName2($personalReferenceLastName2)
    {
        $this->personalReferenceLastName2 = $personalReferenceLastName2;

        return $this;
    }

    /**
     * Get personalReferenceLastName2
     *
     * @return string
     */
    public function getPersonalReferenceLastName2()
    {
        return $this->personalReferenceLastName2;
    }

    /**
     * Set personalReferenceMobile2
     *
     * @param string $personalReferenceMobile2
     *
     * @return ClienteAplicacionCredito
     */
    public function setPersonalReferenceMobile2($personalReferenceMobile2)
    {
        $this->personalReferenceMobile2 = $personalReferenceMobile2;

        return $this;
    }

    /**
     * Get personalReferenceMobile2
     *
     * @return string
     */
    public function getPersonalReferenceMobile2()
    {
        return $this->personalReferenceMobile2;
    }

    /**
     * Set personalReferenceRelation2
     *
     * @param string $personalReferenceRelation2
     *
     * @return ClienteAplicacionCredito
     */
    public function setPersonalReferenceRelation2($personalReferenceRelation2)
    {
        $this->personalReferenceRelation2 = $personalReferenceRelation2;

        return $this;
    }

    /**
     * Get personalReferenceRelation2
     *
     * @return string
     */
    public function getPersonalReferenceRelation2()
    {
        return $this->personalReferenceRelation2;
    }

    /**
     * Set signatureRequired
     *
     * @param string $signatureRequired
     *
     * @return ClienteAplicacionCredito
     */
    public function setSignatureRequired($signatureRequired)
    {
        $this->signatureRequired = $signatureRequired;

        return $this;
    }

    /**
     * Get signatureRequired
     *
     * @return string
     */
    public function getSignatureRequired()
    {
        return $this->signatureRequired;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return ClienteAplicacionCredito
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
     * @return ClienteAplicacionCredito
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
     * @return ClienteAplicacionCredito
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
     * @return ClienteAplicacionCredito
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
     * @return ClienteAplicacionCredito
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
     * @return ClienteAplicacionCredito
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

