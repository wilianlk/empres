<?php

namespace BackendBundle\Entity;

/**
 * ProdColor
 */
class ProdColor
{
    /**
     * @var integer
     */
    private $idColor;

    /**
     * @var string
     */
    private $codigo = 'NULL';

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $nombreIng = 'NULL';

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
     * @var \BackendBundle\Entity\SfGuardUser
     */
    private $createdBy;

    /**
     * @var \BackendBundle\Entity\SfGuardUser
     */
    private $updatedBy;


    /**
     * Get idColor
     *
     * @return integer
     */
    public function getIdColor()
    {
        return $this->idColor;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return ProdColor
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
     * @return ProdColor
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
     * Set nombreIng
     *
     * @param string $nombreIng
     *
     * @return ProdColor
     */
    public function setNombreIng($nombreIng)
    {
        $this->nombreIng = $nombreIng;

        return $this;
    }

    /**
     * Get nombreIng
     *
     * @return string
     */
    public function getNombreIng()
    {
        return $this->nombreIng;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return ProdColor
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
     * @return ProdColor
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
     * @return ProdColor
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
     * @return ProdColor
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
     * @return ProdColor
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
     * @param \BackendBundle\Entity\SfGuardUser $createdBy
     *
     * @return ProdColor
     */
    public function setCreatedBy(\BackendBundle\Entity\SfGuardUser $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \BackendBundle\Entity\SfGuardUser
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedBy
     *
     * @param \BackendBundle\Entity\SfGuardUser $updatedBy
     *
     * @return ProdColor
     */
    public function setUpdatedBy(\BackendBundle\Entity\SfGuardUser $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return \BackendBundle\Entity\SfGuardUser
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }
}
