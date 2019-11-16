<?php

namespace BackendBundle\Entity;

/**
 * TiendaTipo
 */
class TiendaTipo
{
    /**
     * @var integer
     */
    private $idTiendaTipo;

    /**
     * @var string
     */
    private $codigo = 'NULL';

    /**
     * @var string
     */
    private $nombre;

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
     * @var \BackendBundle\Entity\Users
     */
    private $updatedBy;


    /**
     * Get idTiendaTipo
     *
     * @return integer
     */
    public function getIdTiendaTipo()
    {
        return $this->idTiendaTipo;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return TiendaTipo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return TiendaTipo
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
     * Set estado
     *
     * @param boolean $estado
     *
     * @return TiendaTipo
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
     * @return TiendaTipo
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
     * @return TiendaTipo
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
     * @return TiendaTipo
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
     * @return TiendaTipo
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
     * @return TiendaTipo
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
     * @return TiendaTipo
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
