<?php

namespace BackendBundle\Entity;

/**
 * ProdDeptoOrdenAtributo
 */
class ProdDeptoOrdenAtributo
{
    /**
     * @var integer
     */
    private $idDepartamento;

    /**
     * @var integer
     */
    private $orden;

    /**
     * @var integer
     */
    private $idTipoAtributo;

    /**
     * @var integer
     */
    private $createdBy;

    /**
     * @var integer
     */
    private $updatedBy;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;


    /**
     * Set idDepartamento
     *
     * @param integer $idDepartamento
     *
     * @return ProdDeptoOrdenAtributo
     */
    public function setIdDepartamento($idDepartamento)
    {
        $this->idDepartamento = $idDepartamento;

        return $this;
    }

    /**
     * Get idDepartamento
     *
     * @return integer
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     *
     * @return ProdDeptoOrdenAtributo
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
     * Set idTipoAtributo
     *
     * @param integer $idTipoAtributo
     *
     * @return ProdDeptoOrdenAtributo
     */
    public function setIdTipoAtributo($idTipoAtributo)
    {
        $this->idTipoAtributo = $idTipoAtributo;

        return $this;
    }

    /**
     * Get idTipoAtributo
     *
     * @return integer
     */
    public function getIdTipoAtributo()
    {
        return $this->idTipoAtributo;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     *
     * @return ProdDeptoOrdenAtributo
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
     * @return ProdDeptoOrdenAtributo
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ProdDeptoOrdenAtributo
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
     * @return ProdDeptoOrdenAtributo
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
}
