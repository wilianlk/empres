<?php

namespace BackendBundle\Entity;

/**
 * ProdTallaDepartamento
 */
class ProdTallaDepartamento
{
    /**
     * @var integer
     */
    private $idTallaDepartamento;

    /**
     * @var string
     */
    private $tallaEs = 'NULL';

    /**
     * @var string
     */
    private $tallaIng = 'NULL';

    /**
     * @var integer
     */
    private $orden = '0';

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
     * @var \BackendBundle\Entity\ProdDepartamento
     */
    private $idDepartamento;

    /**
     * @var \BackendBundle\Entity\Users
     */
    private $createdBy;

    /**
     * @var \BackendBundle\Entity\ProdTalla
     */
    private $idTalla;

    /**
     * @var \BackendBundle\Entity\Users
     */
    private $updatedBy;


    /**
     * Get idTallaDepartamento
     *
     * @return integer
     */
    public function getIdTallaDepartamento()
    {
        return $this->idTallaDepartamento;
    }

    /**
     * Set tallaEs
     *
     * @param string $tallaEs
     *
     * @return ProdTallaDepartamento
     */
    public function setTallaEs($tallaEs)
    {
        $this->tallaEs = $tallaEs;

        return $this;
    }

    /**
     * Get tallaEs
     *
     * @return string
     */
    public function getTallaEs()
    {
        return $this->tallaEs;
    }

    /**
     * Set tallaIng
     *
     * @param string $tallaIng
     *
     * @return ProdTallaDepartamento
     */
    public function setTallaIng($tallaIng)
    {
        $this->tallaIng = $tallaIng;

        return $this;
    }

    /**
     * Get tallaIng
     *
     * @return string
     */
    public function getTallaIng()
    {
        return $this->tallaIng;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     *
     * @return ProdTallaDepartamento
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
     * @return ProdTallaDepartamento
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
     * @return ProdTallaDepartamento
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
     * @return ProdTallaDepartamento
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
     * @return ProdTallaDepartamento
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
     * Set idDepartamento
     *
     * @param \BackendBundle\Entity\ProdDepartamento $idDepartamento
     *
     * @return ProdTallaDepartamento
     */
    public function setIdDepartamento(\BackendBundle\Entity\ProdDepartamento $idDepartamento = null)
    {
        $this->idDepartamento = $idDepartamento;

        return $this;
    }

    /**
     * Get idDepartamento
     *
     * @return \BackendBundle\Entity\ProdDepartamento
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    /**
     * Set createdBy
     *
     * @param \BackendBundle\Entity\Users $createdBy
     *
     * @return ProdTallaDepartamento
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
     * Set idTalla
     *
     * @param \BackendBundle\Entity\ProdTalla $idTalla
     *
     * @return ProdTallaDepartamento
     */
    public function setIdTalla(\BackendBundle\Entity\ProdTalla $idTalla = null)
    {
        $this->idTalla = $idTalla;

        return $this;
    }

    /**
     * Get idTalla
     *
     * @return \BackendBundle\Entity\ProdTalla
     */
    public function getIdTalla()
    {
        return $this->idTalla;
    }

    /**
     * Set updatedBy
     *
     * @param \BackendBundle\Entity\Users $updatedBy
     *
     * @return ProdTallaDepartamento
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
