<?php

namespace BackendBundle\Entity;

/**
 * GenTipoCompra
 */
class GenTipoCompra
{
    /**
     * @var integer
     */
    private $idTipoCompra;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var boolean
     */
    private $isActive = '1';

    /**
     * @var integer
     */
    private $semanas = '1';

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
     * Get idTipoCompra
     *
     * @return integer
     */
    public function getIdTipoCompra()
    {
        return $this->idTipoCompra;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return GenTipoCompra
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
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return GenTipoCompra
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set semanas
     *
     * @param integer $semanas
     *
     * @return GenTipoCompra
     */
    public function setSemanas($semanas)
    {
        $this->semanas = $semanas;

        return $this;
    }

    /**
     * Get semanas
     *
     * @return integer
     */
    public function getSemanas()
    {
        return $this->semanas;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return GenTipoCompra
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
     * @return GenTipoCompra
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
     * @return GenTipoCompra
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
     * @return GenTipoCompra
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
