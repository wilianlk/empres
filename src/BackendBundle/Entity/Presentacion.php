<?php

namespace BackendBundle\Entity;

/**
 * Presentacion
 */
class Presentacion
{
    /**
     * @var integer
     */
    private $idPresentacion;

    /**
     * @var string
     */
    private $nombrePresentacion;

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
     * @var string
     */
    private $descripcionPresentacion;

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
     * Set nombrePresentacion
     *
     * @param string $nombrePresentacion
     *
     * @return Presentacion
     */
    public function setNombrePresentacion($nombrePresentacion)
    {
        $this->nombrePresentacion = $nombrePresentacion;

        return $this;
    }

    /**
     * Get nombrePresentacion
     *
     * @return string
     */
    public function getNombrePresentacion()
    {
        return $this->nombrePresentacion;
    }


    /**
     * Set descripcionPresentacion
     *
     * @param string $descripcionPresentacion
     *
     * @return Presentacion
     */
    public function setDescripcionPresentacion($descripcionPresentacion)
    {
        $this->descripcionPresentacion = $descripcionPresentacion;

        return $this;
    }

    /**
     * Get descripcionPresentacion
     *
     * @return string
     */
    public function getDescripcionPresentacion()
    {
        return $this->descripcionPresentacion;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Presentacion
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
     * @return Presentacion
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
     * @return Presentacion
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
     * @return Presentacion
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
