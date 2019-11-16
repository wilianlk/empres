<?php

namespace BackendBundle\Entity;

/**
 * ColeccionDetalle
 */
class ColeccionDetalle
{
    /**
     * @var integer
     */
    private $idColeccionDetalle;

    /**
     * @var integer
     */
    private $idColeccion;

    /**
     * @var integer
     */
    private $idProductoReferencia;

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
    private $createdBy = 'NULL';

    /**
     * @var integer
     */
    private $updatedBy = 'NULL';

    /**
     * @var integer
     */
    private $deletedBy = 'NULL';


    /**
     * Get idColeccionDetalle
     *
     * @return integer
     */
    public function getIdColeccionDetalle()
    {
        return $this->idColeccionDetalle;
    }

    /**
     * Set idColeccion
     *
     * @param integer $idColeccion
     *
     * @return ColeccionDetalle
     */
    public function setIdColeccion($idColeccion)
    {
        $this->idColeccion = $idColeccion;

        return $this;
    }

    /**
     * Get idColeccion
     *
     * @return integer
     */
    public function getIdColeccion()
    {
        return $this->idColeccion;
    }

    /**
     * Set idProductoReferencia
     *
     * @param integer $idProductoReferencia
     *
     * @return ColeccionDetalle
     */
    public function setIdProductoReferencia($idProductoReferencia)
    {
        $this->idProductoReferencia = $idProductoReferencia;

        return $this;
    }

    /**
     * Get idProductoReferencia
     *
     * @return integer
     */
    public function getIdProductoReferencia()
    {
        return $this->idProductoReferencia;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ColeccionDetalle
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
     * @return ColeccionDetalle
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
     * @return ColeccionDetalle
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
     * Set createdBy
     *
     * @param integer $createdBy
     *
     * @return ColeccionDetalle
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
     * @return ColeccionDetalle
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

    /**
     * Set deletedBy
     *
     * @param integer $deletedBy
     *
     * @return ColeccionDetalle
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
}
