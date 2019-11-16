<?php

namespace BackendBundle\Entity;

/**
 * TiendaInventarioLog
 */
class TiendaInventarioLog
{
    /**
     * @var integer
     */
    private $idTiendaInventarioLog;

    /**
     * @var integer
     */
    private $cantidad;

    /**
     * @var string
     */
    private $tipo = '\'I\'';

    /**
     * @var boolean
     */
    private $procesado = '0';

    /**
     * @var string
     */
    private $locacion = 'NULL';

    /**
     * @var integer
     */
    private $idProveedorDespacho = 'NULL';

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
     * @var \BackendBundle\Entity\Tienda
     */
    private $idTienda;

    /**
     * @var \BackendBundle\Entity\Producto
     */
    private $idProducto;

    /**
     * @var \BackendBundle\Entity\GenTipoMovimInventarioLog
     */
    private $idTipoMovimInventarioLog;

    /**
     * @var \BackendBundle\Entity\Users
     */
    private $createdBy;

    /**
     * @var \BackendBundle\Entity\Users
     */
    private $updatedBy;

    /**
     * @var \BackendBundle\Entity\Users
     */
    private $deletedBy;


    /**
     * Get idTiendaInventarioLog
     *
     * @return integer
     */
    public function getIdTiendaInventarioLog()
    {
        return $this->idTiendaInventarioLog;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return TiendaInventarioLog
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return TiendaInventarioLog
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
     * Set procesado
     *
     * @param boolean $procesado
     *
     * @return TiendaInventarioLog
     */
    public function setProcesado($procesado)
    {
        $this->procesado = $procesado;

        return $this;
    }

    /**
     * Get procesado
     *
     * @return boolean
     */
    public function getProcesado()
    {
        return $this->procesado;
    }

    /**
     * Set locacion
     *
     * @param string $locacion
     *
     * @return TiendaInventarioLog
     */
    public function setLocacion($locacion)
    {
        $this->locacion = $locacion;

        return $this;
    }

    /**
     * Get locacion
     *
     * @return string
     */
    public function getLocacion()
    {
        return $this->locacion;
    }

    /**
     * Set idProveedorDespacho
     *
     * @param integer $idProveedorDespacho
     *
     * @return TiendaInventarioLog
     */
    public function setIdProveedorDespacho($idProveedorDespacho)
    {
        $this->idProveedorDespacho = $idProveedorDespacho;

        return $this;
    }

    /**
     * Get idProveedorDespacho
     *
     * @return integer
     */
    public function getIdProveedorDespacho()
    {
        return $this->idProveedorDespacho;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return TiendaInventarioLog
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
     * @return TiendaInventarioLog
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
     * @return TiendaInventarioLog
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
     * Set idTienda
     *
     * @param \BackendBundle\Entity\Tienda $idTienda
     *
     * @return TiendaInventarioLog
     */
    public function setIdTienda(\BackendBundle\Entity\Tienda $idTienda = null)
    {
        $this->idTienda = $idTienda;

        return $this;
    }

    /**
     * Get idTienda
     *
     * @return \BackendBundle\Entity\Tienda
     */
    public function getIdTienda()
    {
        return $this->idTienda;
    }

    /**
     * Set idProducto
     *
     * @param \BackendBundle\Entity\Producto $idProducto
     *
     * @return TiendaInventarioLog
     */
    public function setIdProducto(\BackendBundle\Entity\Producto $idProducto = null)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    /**
     * Get idProducto
     *
     * @return \BackendBundle\Entity\Producto
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Set idTipoMovimInventarioLog
     *
     * @param \BackendBundle\Entity\GenTipoMovimInventarioLog $idTipoMovimInventarioLog
     *
     * @return TiendaInventarioLog
     */
    public function setIdTipoMovimInventarioLog(\BackendBundle\Entity\GenTipoMovimInventarioLog $idTipoMovimInventarioLog = null)
    {
        $this->idTipoMovimInventarioLog = $idTipoMovimInventarioLog;

        return $this;
    }

    /**
     * Get idTipoMovimInventarioLog
     *
     * @return \BackendBundle\Entity\GenTipoMovimInventarioLog
     */
    public function getIdTipoMovimInventarioLog()
    {
        return $this->idTipoMovimInventarioLog;
    }

    /**
     * Set createdBy
     *
     * @param \BackendBundle\Entity\Users $createdBy
     *
     * @return TiendaInventarioLog
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
     * Set updatedBy
     *
     * @param \BackendBundle\Entity\Users $updatedBy
     *
     * @return TiendaInventarioLog
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

    /**
     * Set deletedBy
     *
     * @param \BackendBundle\Entity\Users $deletedBy
     *
     * @return TiendaInventarioLog
     */
    public function setDeletedBy(\BackendBundle\Entity\Users $deletedBy = null)
    {
        $this->deletedBy = $deletedBy;

        return $this;
    }

    /**
     * Get deletedBy
     *
     * @return \BackendBundle\Entity\Users
     */
    public function getDeletedBy()
    {
        return $this->deletedBy;
    }
}
