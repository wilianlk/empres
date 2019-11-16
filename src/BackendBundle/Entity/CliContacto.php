<?php

namespace BackendBundle\Entity;

/**
 * CliContacto
 */
class CliContacto
{
    /**
     * @var integer
     */
    private $idClienteContacto;

    /**
     * @var integer
     */
    private $idCliente;

    /**
     * @var string
     */
    private $identificacion;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $apellido;

    /**
     * @var string
     */
    private $cargo;

    /**
     * @var integer
     */
    private $idIdioma;

    /**
     * @var integer
     */
    private $idCiudad;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $autorizaNewsletter = '0';

    /**
     * @var string
     */
    private $zipCode;

    /**
     * @var string
     */
    private $genero;

    /**
     * @var string
     */
    private $fechaNacimiento;

    /**
     * @var string
     */
    private $observaciones;

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
     * Get idClienteContacto
     *
     * @return integer
     */
    public function getIdClienteContacto()
    {
        return $this->idClienteContacto;
    }

    /**
     * Set idCliente
     *
     * @param integer $idCliente
     *
     * @return CliContacto
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    /**
     * Get idCliente
     *
     * @return integer
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Set identificacion
     *
     * @param string $identificacion
     *
     * @return CliContacto
     */
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;

        return $this;
    }

    /**
     * Get identificacion
     *
     * @return string
     */
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return CliContacto
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
     * Set apellido
     *
     * @param string $apellido
     *
     * @return CliContacto
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     *
     * @return CliContacto
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set idIdioma
     *
     * @param integer $idIdioma
     *
     * @return CliContacto
     */
    public function setIdIdioma($idIdioma)
    {
        $this->idIdioma = $idIdioma;

        return $this;
    }

    /**
     * Get idIdioma
     *
     * @return integer
     */
    public function getIdIdioma()
    {
        return $this->idIdioma;
    }

    /**
     * Set idCiudad
     *
     * @param integer $idCiudad
     *
     * @return CliContacto
     */
    public function setIdCiudad($idCiudad)
    {
        $this->idCiudad = $idCiudad;

        return $this;
    }

    /**
     * Get idCiudad
     *
     * @return integer
     */
    public function getIdCiudad()
    {
        return $this->idCiudad;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return CliContacto
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set autorizaNewsletter
     *
     * @param boolean $autorizaNewsletter
     *
     * @return CliContacto
     */
    public function setAutorizaNewsletter($autorizaNewsletter)
    {
        $this->autorizaNewsletter = $autorizaNewsletter;

        return $this;
    }

    /**
     * Get autorizaNewsletter
     *
     * @return boolean
     */
    public function getAutorizaNewsletter()
    {
        return $this->autorizaNewsletter;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return CliContacto
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set genero
     *
     * @param string $genero
     *
     * @return CliContacto
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return string
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set fechaNacimiento
     *
     * @param string $fechaNacimiento
     *
     * @return CliContacto
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return string
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return CliContacto
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return CliContacto
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
     * @return CliContacto
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
     * @return CliContacto
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
     * @return CliContacto
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
