<?php

namespace BackendBundle\Entity;

/**
 * PresentacionDetalle
 */
class PresentacionDetalle
{
    /**
     * @var integer
     */
    private $idPresentacionDetalle;

    /**
     * @var integer
     */
    private $idPresentacion;

    /**
     * @var integer
     */
    private $idColeccion = 'NULL';

    /**
     * @var integer
     */
    private $idReferencia = 'NULL';

    /**
     * @var integer
     */
    private $orden = 'NULL';

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updateAt;

    /**
     * @var integer
     */
    private $createdBy;

    /**
     * @var integer
     */
    private $updatedBy;


    /**
     * Get idPresentacionDetalle
     *
     * @return integer
     */
    public function getIdPresentacionDetalle()
    {
        return $this->idPresentacionDetalle;
    }

    /**
     * Set idPresentacion
     *
     * @param integer $idPresentacion
     *
     * @return PresentacionDetalle
     */
    public function setIdPresentacion($idPresentacion)
    {
        $this->idPresentacion = $idPresentacion;

        return $this;
    }

    /**
     * Get idPresentacion
     *
     * @return integer
     */
    public function getIdPresentacion()
    {
        return $this->idPresentacion;
    }

    /**
     * Set idColeccion
     *
     * @param integer $idColeccion
     *
     * @return PresentacionDetalle
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
     * Set idReferencia
     *
     * @param integer $idReferencia
     *
     * @return PresentacionDetalle
     */
    public function setIdReferencia($idReferencia)
    {
        $this->idReferencia = $idReferencia;

        return $this;
    }

    /**
     * Get idReferencia
     *
     * @return integer
     */
    public function getIdReferencia()
    {
        return $this->idReferencia;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     *
     * @return PresentacionDetalle
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return integer
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PresentacionDetalle
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
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return PresentacionDetalle
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     *
     * @return PresentacionDetalle
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
     * @return PresentacionDetalle
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
