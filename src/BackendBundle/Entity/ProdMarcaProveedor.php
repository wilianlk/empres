<?php

namespace BackendBundle\Entity;

/**
 * ProdMarcaProveedor
 */
class ProdMarcaProveedor
{
    /**
     * @var integer
     */
    private $idMarcaProveedor;

    /**
     * @var boolean
     */
    private $estado = '1';

    /**
     * @var \DateTime
     */
    private $createdAt = 'NULL';

    /**
     * @var \DateTime
     */
    private $updatedAt = 'NULL';

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
     * @var \BackendBundle\Entity\ProdMarca
     */
    private $idMarca;

    /**
     * @var \BackendBundle\Entity\Proveedor
     */
    private $idProveedor;


    /**
     * Get idMarcaProveedor
     *
     * @return integer
     */
    public function getIdMarcaProveedor()
    {
        return $this->idMarcaProveedor;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return ProdMarcaProveedor
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
     * @return ProdMarcaProveedor
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
     * @return ProdMarcaProveedor
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
     * @return ProdMarcaProveedor
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
     * @return ProdMarcaProveedor
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
     * @return ProdMarcaProveedor
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
     * @return ProdMarcaProveedor
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
     * Set idMarca
     *
     * @param \BackendBundle\Entity\ProdMarca $idMarca
     *
     * @return ProdMarcaProveedor
     */
    public function setIdMarca(\BackendBundle\Entity\ProdMarca $idMarca = null)
    {
        $this->idMarca = $idMarca;

        return $this;
    }

    /**
     * Get idMarca
     *
     * @return \BackendBundle\Entity\ProdMarca
     */
    public function getIdMarca()
    {
        return $this->idMarca;
    }

    /**
     * Set idProveedor
     *
     * @param \BackendBundle\Entity\Proveedor $idProveedor
     *
     * @return ProdMarcaProveedor
     */
    public function setIdProveedor(\BackendBundle\Entity\Proveedor $idProveedor = null)
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    /**
     * Get idProveedor
     *
     * @return \BackendBundle\Entity\Proveedor
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }
}
