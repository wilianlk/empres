<?php

namespace BackendBundle\Entity;

/**
 * Tienda
 */
class Tienda
{
    /**
     * @var integer
     */
    private $idTienda;

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
    private $direccion = 'NULL';

    /**
     * @var string
     */
    private $zipCode = 'NULL';

    /**
     * @var string
     */
    private $telefono1 = 'NULL';

    /**
     * @var string
     */
    private $telefono2 = 'NULL';

    /**
     * @var string
     */
    private $url = 'NULL';

    /**
     * @var string
     */
    private $webservices = 'NULL';

    /**
     * @var string
     */
    private $polizaVenta = 'NULL';

    /**
     * @var string
     */
    private $polizaDevolucion = 'NULL';

    /**
     * @var string
     */
    private $polizaSeparado = 'NULL';

    /**
     * @var integer
     */
    private $nroFacturaIni = '1';

    /**
     * @var integer
     */
    private $vigenciaSeparado = '30';

    /**
     * @var boolean
     */
    private $estado = '1';

    /**
     * @var string
     */
    private $backgroundImage;

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
     * @var \BackendBundle\Entity\GeoCiudad
     */
    private $idCiudad;

    /**
     * @var \BackendBundle\Entity\TiendaTipo
     */
    private $idTiendaTipo;

    /**
     * @var \BackendBundle\Entity\Users
     */
    private $updatedBy;


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
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Tienda
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
     * @return Tienda
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
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Tienda
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
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Tienda
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
     * Set telefono1
     *
     * @param string $telefono1
     *
     * @return Tienda
     */
    public function setTelefono1($telefono1)
    {
        $this->telefono1 = $telefono1;

        return $this;
    }

    /**
     * Get telefono1
     *
     * @return string
     */
    public function getTelefono1()
    {
        return $this->telefono1;
    }

    /**
     * Set telefono2
     *
     * @param string $telefono2
     *
     * @return Tienda
     */
    public function setTelefono2($telefono2)
    {
        $this->telefono2 = $telefono2;

        return $this;
    }

    /**
     * Get telefono2
     *
     * @return string
     */
    public function getTelefono2()
    {
        return $this->telefono2;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Tienda
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set webservices
     *
     * @param string $webservices
     *
     * @return Tienda
     */
    public function setWebservices($webservices)
    {
        $this->webservices = $webservices;

        return $this;
    }

    /**
     * Get webservices
     *
     * @return string
     */
    public function getWebservices()
    {
        return $this->webservices;
    }

    /**
     * Set polizaVenta
     *
     * @param string $polizaVenta
     *
     * @return Tienda
     */
    public function setPolizaVenta($polizaVenta)
    {
        $this->polizaVenta = $polizaVenta;

        return $this;
    }

    /**
     * Get polizaVenta
     *
     * @return string
     */
    public function getPolizaVenta()
    {
        return $this->polizaVenta;
    }

    /**
     * Set polizaDevolucion
     *
     * @param string $polizaDevolucion
     *
     * @return Tienda
     */
    public function setPolizaDevolucion($polizaDevolucion)
    {
        $this->polizaDevolucion = $polizaDevolucion;

        return $this;
    }

    /**
     * Get polizaDevolucion
     *
     * @return string
     */
    public function getPolizaDevolucion()
    {
        return $this->polizaDevolucion;
    }

    /**
     * Set polizaSeparado
     *
     * @param string $polizaSeparado
     *
     * @return Tienda
     */
    public function setPolizaSeparado($polizaSeparado)
    {
        $this->polizaSeparado = $polizaSeparado;

        return $this;
    }

    /**
     * Get polizaSeparado
     *
     * @return string
     */
    public function getPolizaSeparado()
    {
        return $this->polizaSeparado;
    }

    /**
     * Set nroFacturaIni
     *
     * @param integer $nroFacturaIni
     *
     * @return Tienda
     */
    public function setNroFacturaIni($nroFacturaIni)
    {
        $this->nroFacturaIni = $nroFacturaIni;

        return $this;
    }

    /**
     * Get nroFacturaIni
     *
     * @return integer
     */
    public function getNroFacturaIni()
    {
        return $this->nroFacturaIni;
    }

    /**
     * Set vigenciaSeparado
     *
     * @param integer $vigenciaSeparado
     *
     * @return Tienda
     */
    public function setVigenciaSeparado($vigenciaSeparado)
    {
        $this->vigenciaSeparado = $vigenciaSeparado;

        return $this;
    }

    /**
     * Get vigenciaSeparado
     *
     * @return integer
     */
    public function getVigenciaSeparado()
    {
        return $this->vigenciaSeparado;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Tienda
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
     * Set backgroundImage
     *
     * @param string $backgroundImage
     *
     * @return Tienda
     */
    public function setBackgroundImage($backgroundImage)
    {
        $this->backgroundImage = $backgroundImage;

        return $this;
    }

    /**
     * Get backgroundImage
     *
     * @return string
     */
    public function getBackgroundImage()
    {
        return $this->backgroundImage;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Tienda
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
     * @return Tienda
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
     * @return Tienda
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
     * @return Tienda
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
     * @return Tienda
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
     * Set idCiudad
     *
     * @param \BackendBundle\Entity\GeoCiudad $idCiudad
     *
     * @return Tienda
     */
    public function setIdCiudad(\BackendBundle\Entity\GeoCiudad $idCiudad = null)
    {
        $this->idCiudad = $idCiudad;

        return $this;
    }

    /**
     * Get idCiudad
     *
     * @return \BackendBundle\Entity\GeoCiudad
     */
    public function getIdCiudad()
    {
        return $this->idCiudad;
    }

    /**
     * Set idTiendaTipo
     *
     * @param \BackendBundle\Entity\TiendaTipo $idTiendaTipo
     *
     * @return Tienda
     */
    public function setIdTiendaTipo(\BackendBundle\Entity\TiendaTipo $idTiendaTipo = null)
    {
        $this->idTiendaTipo = $idTiendaTipo;

        return $this;
    }

    /**
     * Get idTiendaTipo
     *
     * @return \BackendBundle\Entity\TiendaTipo
     */
    public function getIdTiendaTipo()
    {
        return $this->idTiendaTipo;
    }

    /**
     * Set updatedBy
     *
     * @param \BackendBundle\Entity\Users $updatedBy
     *
     * @return Tienda
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
