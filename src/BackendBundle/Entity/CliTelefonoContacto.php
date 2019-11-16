<?php

namespace BackendBundle\Entity;

/**
 * CliTelefonoContacto
 */
class CliTelefonoContacto
{
    /**
     * @var integer
     */
    private $idTelefonoContacto;

    /**
     * @var integer
     */
    private $idClienteContacto;

    /**
     * @var integer
     */
    private $idProveedorCelular;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var string
     */
    private $numero;

    /**
     * @var string
     */
    private $extension;

    /**
     * @var boolean
     */
    private $autorizaSms;

    /**
     * @var string
     */
    private $horario;

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
    private $deletedAt;

    /**
     * @var integer
     */
    private $createdBy;

    /**
     * @var integer
     */
    private $updatedBy;

    /**
     * @var integer
     */
    private $deletedBy;


    /**
     * Get idTelefonoContacto
     *
     * @return integer
     */
    public function getIdTelefonoContacto()
    {
        return $this->idTelefonoContacto;
    }

    /**
     * Set idClienteContacto
     *
     * @param integer $idClienteContacto
     *
     * @return CliTelefonoContacto
     */
    public function setIdClienteContacto($idClienteContacto)
    {
        $this->idClienteContacto = $idClienteContacto;

        return $this;
    }

    /**
     * Get idClienteContacto
     *
     * @return integer
     */
    public function getIdClienteContacto()
    {
        return $this->idClienteContacto;
    }

    /**
     * Set idProveedorCelular
     *
     * @param integer $idProveedorCelular
     *
     * @return CliTelefonoContacto
     */
    public function setIdProveedorCelular($idProveedorCelular)
    {
        $this->idProveedorCelular = $idProveedorCelular;

        return $this;
    }

    /**
     * Get idProveedorCelular
     *
     * @return integer
     */
    public function getIdProveedorCelular()
    {
        return $this->idProveedorCelular;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return CliTelefonoContacto
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set numero
     *
     * @param string $numero
     *
     * @return CliTelefonoContacto
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set extension
     *
     * @param string $extension
     *
     * @return CliTelefonoContacto
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set autorizaSms
     *
     * @param boolean $autorizaSms
     *
     * @return CliTelefonoContacto
     */
    public function setAutorizaSms($autorizaSms)
    {
        $this->autorizaSms = $autorizaSms;

        return $this;
    }

    /**
     * Get autorizaSms
     *
     * @return boolean
     */
    public function getAutorizaSms()
    {
        return $this->autorizaSms;
    }

    /**
     * Set grupoHorario
     *
     * @param string $horario
     *
     * @return CliTelefonoContacto
     */
    public function setHorario($horario)
    {
        $this->horario = $horario;

        return $this;
    }

    /**
     * Get grupoHorario
     *
     * @return string
     */
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return CliTelefonoContacto
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
     * @return CliTelefonoContacto
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
     * @return CliTelefonoContacto
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
     * @return CliTelefonoContacto
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
     * @return CliTelefonoContacto
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
     * @return CliTelefonoContacto
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
