<?php

namespace BackendBundle\Entity;

/**
 * TiendaCampos
 */
class TiendaCampos
{
    /**
     * @var integer
     */
    private $idTiendaCampos;

    /**
     * @var integer
     */
    private $idUser;

    /**
     * @var integer
     */
    private $idTienda;

    /**
     * @var integer
     */
    private $campo;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var integer
     */
    private $createdBy;

    /**
     * @var integer
     */
    private $updatedBy;


    /**
     * Get idTiendaCampos
     *
     * @return integer
     */
    public function getIdTiendaCampos()
    {
        return $this->idTiendaCampos;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return TiendaCampos
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idTienda
     *
     * @param integer $idTienda
     *
     * @return TiendaCampos
     */
    public function setIdTienda($idTienda)
    {
        $this->idTienda = $idTienda;

        return $this;
    }

    /**
     * Get idTienda
     *
     * @return integer
     */
    public function getIdTienda()
    {
        return $this->idTienda;
    }

    /**
     * Set campo
     *
     * @param integer $campo
     *
     * @return TiendaCampos
     */
    public function setCampo($campo)
    {
        $this->campo = $campo;

        return $this;
    }

    /**
     * Get campo
     *
     * @return integer
     */
    public function getCampo()
    {
        return $this->campo;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return TiendaCampos
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
     * @return TiendaCampos
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
     * Set createdBy
     *
     * @param integer $createdBy
     *
     * @return TiendaCampos
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
     * @return TiendaCampos
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
