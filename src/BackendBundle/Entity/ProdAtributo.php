<?php

namespace BackendBundle\Entity;

/**
 * ProdAtributo
 */
class ProdAtributo
{
    /**
     * @var integer
     */
    private $idAtributo;

    /**
     * @var integer
     */
    private $idProductoReferencia;

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
     * Set idAtributo
     *
     * @param integer $idAtributo
     *
     * @return ProdAtributo
     */
    public function setIdAtributo($idAtributo)
    {
        $this->idAtributo = $idAtributo;

        return $this;
    }

    /**
     * Get idAtributo
     *
     * @return integer
     */
    public function getIdAtributo()
    {
        return $this->idAtributo;
    }

    /**
     * Set idProductoReferencia
     *
     * @param integer $idProductoReferencia
     *
     * @return ProdAtributo
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
     * Set createdBy
     *
     * @param integer $createdBy
     *
     * @return ProdAtributo
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
     * @return ProdAtributo
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
     * @return ProdAtributo
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
     * @return ProdAtributo
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
