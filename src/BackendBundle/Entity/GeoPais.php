<?php

namespace BackendBundle\Entity;

/**
 * GeoPais
 */
class GeoPais
{
    /**
     * @var integer
     */
    private $idPais;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $isoCode2;

    /**
     * @var string
     */
    private $isoCode3;

    /**
     * @var integer
     */
    private $addressFormatId;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \BackendBundle\Entity\Users
     */
    private $createdBy;

    /**
     * @var \BackendBundle\Entity\Users
     */
    private $updatedBy;


    /**
     * Get idPais
     *
     * @return integer
     */
    public function getIdPais()
    {
        return $this->idPais;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return GeoPais
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set isoCode2
     *
     * @param string $isoCode2
     *
     * @return GeoPais
     */
    public function setIsoCode2($isoCode2)
    {
        $this->isoCode2 = $isoCode2;

        return $this;
    }

    /**
     * Get isoCode2
     *
     * @return string
     */
    public function getIsoCode2()
    {
        return $this->isoCode2;
    }

    /**
     * Set isoCode3
     *
     * @param string $isoCode3
     *
     * @return GeoPais
     */
    public function setIsoCode3($isoCode3)
    {
        $this->isoCode3 = $isoCode3;

        return $this;
    }

    /**
     * Get isoCode3
     *
     * @return string
     */
    public function getIsoCode3()
    {
        return $this->isoCode3;
    }

    /**
     * Set addressFormatId
     *
     * @param integer $addressFormatId
     *
     * @return GeoPais
     */
    public function setAddressFormatId($addressFormatId)
    {
        $this->addressFormatId = $addressFormatId;

        return $this;
    }

    /**
     * Get addressFormatId
     *
     * @return integer
     */
    public function getAddressFormatId()
    {
        return $this->addressFormatId;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return GeoPais
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
     * @return GeoPais
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
     * @param \BackendBundle\Entity\Users $createdBy
     *
     * @return GeoPais
     */
    public function setCreatedBy(\BackendBundle\Entity\Users $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \BackendBundle\Entity\Users
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedBy
     *
     * @param \BackendBundle\Entity\Users $updatedBy
     *
     * @return GeoPais
     */
    public function setUpdatedBy(\BackendBundle\Entity\Users $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return \BackendBundle\Entity\Users
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }
}
