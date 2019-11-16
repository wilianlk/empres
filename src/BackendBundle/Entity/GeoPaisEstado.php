<?php

namespace BackendBundle\Entity;

/**
 * GeoPaisEstado
 */
class GeoPaisEstado
{
    /**
     * @var integer
     */
    private $idPaisEstado;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $abreviatura = 'NULL';

    /**
     * @var boolean
     */
    private $estado = '1';

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \DateTime
     */
    private $deletedAt = 'NULL';

    /**
     * @var integer
     */
    private $deletedBy = 'NULL';

    /**
     * @var \BackendBundle\Entity\Users
     */
    private $createdBy;

    /**
     * @var \BackendBundle\Entity\GeoPais
     */
    private $idPais;

    /**
     * @var \BackendBundle\Entity\Users
     */
    private $updatedBy;


    /**
     * Get idPaisEstado
     *
     * @return integer
     */
    public function getIdPaisEstado()
    {
        return $this->idPaisEstado;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return GeoPaisEstado
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
     * Set abreviatura
     *
     * @param string $abreviatura
     *
     * @return GeoPaisEstado
     */
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;

        return $this;
    }

    /**
     * Get abreviatura
     *
     * @return string
     */
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return GeoPaisEstado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return GeoPaisEstado
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
     * @return GeoPaisEstado
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
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return GeoPaisEstado
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
     * @return GeoPaisEstado
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
     * Set createdBy
     *
     * @param \BackendBundle\Entity\Users $createdBy
     *
     * @return GeoPaisEstado
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
     * Set idPais
     *
     * @param \BackendBundle\Entity\GeoPais $idPais
     *
     * @return GeoPaisEstado
     */
    public function setIdPais(\BackendBundle\Entity\GeoPais $idPais = null)
    {
        $this->idPais = $idPais;

        return $this;
    }

    /**
     * Get idPais
     *
     * @return \BackendBundle\Entity\GeoPais
     */
    public function getIdPais()
    {
        return $this->idPais;
    }

    /**
     * Set updatedBy
     *
     * @param \BackendBundle\Entity\Users $updatedBy
     *
     * @return GeoPaisEstado
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
