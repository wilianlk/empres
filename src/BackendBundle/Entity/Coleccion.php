<?php

namespace BackendBundle\Entity;

/**
 * Coleccion
 */
class Coleccion
{
    /**
     * @var integer
     */
    private $idColeccion;

    /**
     * @var string
     */
    private $numeroColeccion;

    /**
     * @var string
     */
    private $yearColeccion;

    /**
     * @var string
     */
    private $descripcion = 'NULL';

    /**
     * @var \DateTime
     */
    private $fechaLanzamiento;

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
     * Get idColeccion
     *
     * @return integer
     */
    public function getIdColeccion()
    {
        return $this->idColeccion;
    }

    /**
     * Set numeroColeccion
     *
     * @param string $numeroColeccion
     *
     * @return Coleccion
     */
    public function setNumeroColeccion($numeroColeccion)
    {
        $this->numeroColeccion = $numeroColeccion;

        return $this;
    }

    /**
     * Get numeroColeccion
     *
     * @return string
     */
    public function getNumeroColeccion()
    {
        return $this->numeroColeccion;
    }

    /**
     * Set yearColeccion
     *
     * @param string $yearColeccion
     *
     * @return Coleccion
     */
    public function setYearColeccion($yearColeccion)
    {
        $this->yearColeccion = $yearColeccion;

        return $this;
    }

    /**
     * Get yearColeccion
     *
     * @return string
     */
    public function getYearColeccion()
    {
        return $this->yearColeccion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Coleccion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fechaLanzamiento
     *
     * @param \DateTime $fechaLanzamiento
     *
     * @return Coleccion
     */
    public function setFechaLanzamiento($fechaLanzamiento)
    {
        $this->fechaLanzamiento = $fechaLanzamiento;

        return $this;
    }

    /**
     * Get fechaLanzamiento
     *
     * @return \DateTime
     */
    public function getFechaLanzamiento()
    {
        return $this->fechaLanzamiento;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Coleccion
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
     * @return Coleccion
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
     * @return Coleccion
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
     * @return Coleccion
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
     * @return Coleccion
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
     * @return Coleccion
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
