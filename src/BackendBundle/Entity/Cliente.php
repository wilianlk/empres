<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 */
class Cliente
{
    /**
     * @var integer
     */

    private $idCliente;

    /**
     * @var integer
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
     * @var integer
     */
    private $idIdioma;

    /**
     * @var integer
     */
    private $idMedioConocimiento;

    /**
     * @var integer
     */
    private $idTipoCliente;

    /**
     * @var integer
     */
    private $idTipoCompra;

    /**
     * @var boolean
     */
    private $mayorista;

    /**
     * @var integer
     */
    private $idCiudad;

    /**
     * @var string
     */
    private $empresa;

    /**
     * @var string
     */
    private $cargo;

    /**
     * @var string
     */
    private $tipoNegocio;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $zipCode;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var string
     */
    private $genero;

    /**
     * @var string
     */
    private $fechaNacimiento;

    /**
     * @var boolean
     */
    private $autorizaNewsletter = '0';

    /**
     * @var float
     */
    private $creditoAsignado = '0';

    /**
     * @var float
     */
    private $cupoCredito = '0';

    /**
     * @var boolean
     */
    private $taxExcempt;

    /**
     * @var \DateTime
     */
    private $taxExpire;

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
     * @var integer
     */
    private $descuentoCatalogo;


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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * Set idIdioma
     *
     * @param integer $idIdioma
     *
     * @return Cliente
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
     * Set idMedioConocimiento
     *
     * @param integer $idMedioConocimiento
     *
     * @return Cliente
     */
    public function setIdMedioConocimiento($idMedioConocimiento)
    {
        $this->idMedioConocimiento = $idMedioConocimiento;

        return $this;
    }

    /**
     * Get idMedioConocimiento
     *
     * @return integer
     */
    public function getIdMedioConocimiento()
    {
        return $this->idMedioConocimiento;
    }

    /**
     * Set idTipoCliente
     *
     * @param integer $idTipoCliente
     *
     * @return Cliente
     */
    public function setIdTipoCliente($idTipoCliente)
    {
        $this->idTipoCliente = $idTipoCliente;

        return $this;
    }

    /**
     * Get idTipoCliente
     *
     * @return integer
     */
    public function getIdTipoCliente()
    {
        return $this->idTipoCliente;
    }

    /**
     * Set idTipoCompra
     *
     * @param integer $idTipoCompra
     *
     * @return Cliente
     */
    public function setIdTipoCompra($idTipoCompra)
    {
        $this->idTipoCompra = $idTipoCompra;

        return $this;
    }

    /**
     * Get idTipoCompra
     *
     * @return integer
     */
    public function getIdTipoCompra()
    {
        return $this->idTipoCompra;
    }

    /**
     * Set mayorista
     *
     * @param boolean $mayorista
     *
     * @return Cliente
     */
    public function setMayorista($mayorista)
    {
        $this->mayorista = $mayorista;

        return $this;
    }

    /**
     * Get mayorista
     *
     * @return boolean
     */
    public function getMayorista()
    {
        return $this->mayorista;
    }

    /**
     * Set idCiudad
     *
     * @param integer $idCiudad
     *
     * @return Cliente
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
     * Set empresa
     *
     * @param string $empresa
     *
     * @return Cliente
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return string
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     *
     * @return Cliente
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
     * Set tipoNegocio
     *
     * @param string $tipoNegocio
     *
     * @return Cliente
     */
    public function setTipoNegocio($tipoNegocio)
    {
        $this->tipoNegocio = $tipoNegocio;

        return $this;
    }

    /**
     * Get tipoNegocio
     *
     * @return string
     */
    public function getTipoNegocio()
    {
        return $this->tipoNegocio;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Cliente
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
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Cliente
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
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Cliente
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set genero
     *
     * @param string $genero
     *
     * @return Cliente
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
     * @return Cliente
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
     * Set autorizaNewsletter
     *
     * @param boolean $autorizaNewsletter
     *
     * @return Cliente
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
     * Set creditoAsignado
     *
     * @param float $creditoAsignado
     *
     * @return Cliente
     */
    public function setCreditoAsignado($creditoAsignado)
    {
        $this->creditoAsignado = $creditoAsignado;

        return $this;
    }

    /**
     * Get creditoAsignado
     *
     * @return float
     */
    public function getCreditoAsignado()
    {
        return $this->creditoAsignado;
    }

    /**
     * Set cupoCredito
     *
     * @param float $cupoCredito
     *
     * @return Cliente
     */
    public function setCupoCredito($cupoCredito)
    {
        $this->cupoCredito = $cupoCredito;

        return $this;
    }

    /**
     * Get cupoCredito
     *
     * @return float
     */
    public function getCupoCredito()
    {
        return $this->cupoCredito;
    }

    /**
     * Set taxExcempt
     *
     * @param boolean $taxExcempt
     *
     * @return Cliente
     */
    public function setTaxExcempt($taxExcempt)
    {
        $this->taxExcempt = $taxExcempt;

        return $this;
    }

    /**
     * Get taxExcempt
     *
     * @return boolean
     */
    public function getTaxExcempt()
    {
        return $this->taxExcempt;
    }

    /**
     * Set taxExpire
     *
     * @param \DateTime $taxExpire
     *
     * @return Cliente
     */
    public function setTaxExpire($taxExpire)
    {
        $this->taxExpire = $taxExpire;

        return $this;
    }

    /**
     * Get taxExpire
     *
     * @return \DateTime
     */
    public function getTaxExpire()
    {
        return $this->taxExpire;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * Set descuentoCatalogo
     *
     * @param integer $descuentoCatalogo
     *
     * @return Cliente
     */
    public function setDescuentoCatalogo($descuentoCatalogo)
    {
        $this->descuentoCatalogo = $descuentoCatalogo;

        return $this;
    }

    /**
     * Get descuentoCatalogo
     *
     * @return integer
     */
    public function getDescuentoCatalogo()
    {
        return $this->descuentoCatalogo;
    }

    /**
     * Set idCliente
     *
     * @param \BackendBundle\Entity\CliContacto $idCliente
     *
     * @return Cliente
     */
    public function setIdCliente(\BackendBundle\Entity\CliContacto $idCliente = null)
    {
        $this->idCliente = $idCliente;

        return $this;
    }
}
