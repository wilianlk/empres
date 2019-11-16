<?php

namespace BackendBundle\Entity;

/**
 * TiendaInventario
 */
class TiendaInventario
{
    /**
     * @var integer
     */
    private $idTiendaInventario;

    /**
     * @var float
     */
    private $precio;

    /**
     * @var float
     */
    private $precioPromocion = '0';

    /**
     * @var float
     */
    private $tax = '0';

    /**
     * @var integer
     */
    private $inventarioStock = '0';

    /**
     * @var integer
     */
    private $inventarioHold = '0';

    /**
     * @var integer
     */
    private $inventarioVendido = '0';

    /**
     * @var integer
     */
    private $inventarioTotal = '0';

    /**
     * @var boolean
     */
    private $enVenta = '1';

    /**
     * @var boolean
     */
    private $enPromocion = '0';

    /**
     * @var string
     */
    private $locacion = 'NULL';

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
     * @var string
     */
    private $descuento = '0.00';

    /**
     * @var \BackendBundle\Entity\Users
     */
    private $createdBy;

    /**
     * @var \BackendBundle\Entity\Producto
     */
    private $idProducto;

    /**
     * @var \BackendBundle\Entity\Tienda
     */
    private $idTienda;

    /**
     * @var \BackendBundle\Entity\Users
     */
    private $updatedBy;


    /**
     * Get idTiendaInventario
     *
     * @return integer
     */
    public function getIdTiendaInventario()
    {
        return $this->idTiendaInventario;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return TiendaInventario
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set precioPromocion
     *
     * @param float $precioPromocion
     *
     * @return TiendaInventario
     */
    public function setPrecioPromocion($precioPromocion)
    {
        $this->precioPromocion = $precioPromocion;

        return $this;
    }

    /**
     * Get precioPromocion
     *
     * @return float
     */
    public function getPrecioPromocion()
    {
        return $this->precioPromocion;
    }

    /**
     * Set tax
     *
     * @param float $tax
     *
     * @return TiendaInventario
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get tax
     *
     * @return float
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set inventarioStock
     *
     * @param integer $inventarioStock
     *
     * @return TiendaInventario
     */
    public function setInventarioStock($inventarioStock)
    {
        $this->inventarioStock = $inventarioStock;

        return $this;
    }

    /**
     * Get inventarioStock
     *
     * @return integer
     */
    public function getInventarioStock()
    {
        return $this->inventarioStock;
    }

    /**
     * Set inventarioHold
     *
     * @param integer $inventarioHold
     *
     * @return TiendaInventario
     */
    public function setInventarioHold($inventarioHold)
    {
        $this->inventarioHold = $inventarioHold;

        return $this;
    }

    /**
     * Get inventarioHold
     *
     * @return integer
     */
    public function getInventarioHold()
    {
        return $this->inventarioHold;
    }

    /**
     * Set inventarioVendido
     *
     * @param integer $inventarioVendido
     *
     * @return TiendaInventario
     */
    public function setInventarioVendido($inventarioVendido)
    {
        $this->inventarioVendido = $inventarioVendido;

        return $this;
    }

    /**
     * Get inventarioVendido
     *
     * @return integer
     */
    public function getInventarioVendido()
    {
        return $this->inventarioVendido;
    }

    /**
     * Set inventarioTotal
     *
     * @param integer $inventarioTotal
     *
     * @return TiendaInventario
     */
    public function setInventarioTotal($inventarioTotal)
    {
        $this->inventarioTotal = $inventarioTotal;

        return $this;
    }

    /**
     * Get inventarioTotal
     *
     * @return integer
     */
    public function getInventarioTotal()
    {
        return $this->inventarioTotal;
    }

    /**
     * Set enVenta
     *
     * @param boolean $enVenta
     *
     * @return TiendaInventario
     */
    public function setEnVenta($enVenta)
    {
        $this->enVenta = $enVenta;

        return $this;
    }

    /**
     * Get enVenta
     *
     * @return boolean
     */
    public function getEnVenta()
    {
        return $this->enVenta;
    }

    /**
     * Set enPromocion
     *
     * @param boolean $enPromocion
     *
     * @return TiendaInventario
     */
    public function setEnPromocion($enPromocion)
    {
        $this->enPromocion = $enPromocion;

        return $this;
    }

    /**
     * Get enPromocion
     *
     * @return boolean
     */
    public function getEnPromocion()
    {
        return $this->enPromocion;
    }

    /**
     * Set locacion
     *
     * @param string $locacion
     *
     * @return TiendaInventario
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return TiendaInventario
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
     * @return TiendaInventario
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
     * @return TiendaInventario
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
     * @return TiendaInventario
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
     * Set descuento
     *
     * @param string $descuento
     *
     * @return TiendaInventario
     */
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;

        return $this;
    }

    /**
     * Get descuento
     *
     * @return string
     */
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * Set createdBy
     *
     * @param \BackendBundle\Entity\Users $createdBy
     *
     * @return TiendaInventario
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
     * Set idProducto
     *
     * @param \BackendBundle\Entity\Producto $idProducto
     *
     * @return TiendaInventario
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
     * Set idTienda
     *
     * @param \BackendBundle\Entity\Tienda $idTienda
     *
     * @return TiendaInventario
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
     * Set updatedBy
     *
     * @param \BackendBundle\Entity\Users $updatedBy
     *
     * @return TiendaInventario
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
