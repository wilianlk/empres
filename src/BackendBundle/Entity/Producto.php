<?php

namespace BackendBundle\Entity;

/**
 * Producto
 */
class Producto
{
    /**
     * @var integer
     */
    private $idProducto;

    /**
     * @var string
     */
    private $campo1 = 'NULL';

    /**
     * @var string
     */
    private $campo2 = 'NULL';

    /**
     * @var string
     */
    private $campo3 = 'NULL';

    /**
     * @var string
     */
    private $campo4;

    /**
     * @var string
     */
    private $codigoBarras = 'NULL';

    /**
     * @var float
     */
    private $costo = 'NULL';

    /**
     * @var float
     */
    private $precioBodega;

    /**
     * @var float
     */
    private $precioDetal;

    /**
     * @var float
     */
    private $precioWeb;

    /**
     * @var integer
     */
    private $tax = '0';

    /**
     * @var string
     */
    private $descuento = '0.00';

    /**
     * @var string
     */
    private $peso = 'NULL';

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
     * @var \BackendBundle\Entity\ProdReferencia
     */
    private $idProductoReferencia;

    /**
     * @var \BackendBundle\Entity\Users
     */
    private $createdBy;

    /**
     * @var \BackendBundle\Entity\ProdColor
     */
    private $idColor;

    /**
     * @var \BackendBundle\Entity\ProdTalla
     */
    private $idTalla;

    /**
     * @var \BackendBundle\Entity\Users
     */
    private $updatedBy;


    /**
     * Get idProducto
     *
     * @return integer
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Set campo1
     *
     * @param string $campo1
     *
     * @return Producto
     */
    public function setCampo1($campo1)
    {
        $this->campo1 = $campo1;

        return $this;
    }

    /**
     * Get campo1
     *
     * @return string
     */
    public function getCampo1()
    {
        return $this->campo1;
    }

    /**
     * Set campo2
     *
     * @param string $campo2
     *
     * @return Producto
     */
    public function setCampo2($campo2)
    {
        $this->campo2 = $campo2;

        return $this;
    }

    /**
     * Get campo2
     *
     * @return string
     */
    public function getCampo2()
    {
        return $this->campo2;
    }

    /**
     * Set campo3
     *
     * @param string $campo3
     *
     * @return Producto
     */
    public function setCampo3($campo3)
    {
        $this->campo3 = $campo3;

        return $this;
    }

    /**
     * Get campo3
     *
     * @return string
     */
    public function getCampo3()
    {
        return $this->campo3;
    }

    /**
     * Set campo4
     *
     * @param string $campo4
     *
     * @return Producto
     */
    public function setCampo4($campo4)
    {
        $this->campo4 = $campo4;

        return $this;
    }

    /**
     * Get campo4
     *
     * @return string
     */
    public function getCampo4()
    {
        return $this->campo4;
    }

    /**
     * Set codigoBarras
     *
     * @param string $codigoBarras
     *
     * @return Producto
     */
    public function setCodigoBarras($codigoBarras)
    {
        $this->codigoBarras = $codigoBarras;

        return $this;
    }

    /**
     * Get codigoBarras
     *
     * @return string
     */
    public function getCodigoBarras()
    {
        return $this->codigoBarras;
    }

    /**
     * Set costo
     *
     * @param float $costo
     *
     * @return Producto
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;

        return $this;
    }

    /**
     * Get costo
     *
     * @return float
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set precioBodega
     *
     * @param float $precioBodega
     *
     * @return Producto
     */
    public function setPrecioBodega($precioBodega)
    {
        $this->precioBodega = $precioBodega;

        return $this;
    }

    /**
     * Get precioBodega
     *
     * @return float
     */
    public function getPrecioBodega()
    {
        return $this->precioBodega;
    }

    /**
     * Set precioDetal
     *
     * @param float $precioDetal
     *
     * @return Producto
     */
    public function setPrecioDetal($precioDetal)
    {
        $this->precioDetal = $precioDetal;

        return $this;
    }

    /**
     * Get precioDetal
     *
     * @return float
     */
    public function getPrecioDetal()
    {
        return $this->precioDetal;
    }

    /**
     * Set precioWeb
     *
     * @param float $precioWeb
     *
     * @return Producto
     */
    public function setPrecioWeb($precioWeb)
    {
        $this->precioWeb = $precioWeb;

        return $this;
    }

    /**
     * Get precioWeb
     *
     * @return float
     */
    public function getPrecioWeb()
    {
        return $this->precioWeb;
    }

    /**
     * Set tax
     *
     * @param integer $tax
     *
     * @return Producto
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get tax
     *
     * @return integer
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set descuento
     *
     * @param string $descuento
     *
     * @return Producto
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
     * Set peso
     *
     * @param string $peso
     *
     * @return Producto
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get peso
     *
     * @return string
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Producto
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
     * @return Producto
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
     * @return Producto
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
     * @return Producto
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
     * Set idProductoReferencia
     *
     * @param \BackendBundle\Entity\ProdReferencia $idProductoReferencia
     *
     * @return Producto
     */
    public function setIdProductoReferencia(\BackendBundle\Entity\ProdReferencia $idProductoReferencia = null)
    {
        $this->idProductoReferencia = $idProductoReferencia;

        return $this;
    }

    /**
     * Get idProductoReferencia
     *
     * @return \BackendBundle\Entity\ProdReferencia
     */
    public function getIdProductoReferencia()
    {
        return $this->idProductoReferencia;
    }

    /**
     * Set createdBy
     *
     * @param \BackendBundle\Entity\Users $createdBy
     *
     * @return Producto
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
     * Set idColor
     *
     * @param \BackendBundle\Entity\ProdColor $idColor
     *
     * @return Producto
     */
    public function setIdColor(\BackendBundle\Entity\ProdColor $idColor = null)
    {
        $this->idColor = $idColor;

        return $this;
    }

    /**
     * Get idColor
     *
     * @return \BackendBundle\Entity\ProdColor
     */
    public function getIdColor()
    {
        return $this->idColor;
    }

    /**
     * Set idTalla
     *
     * @param \BackendBundle\Entity\ProdTalla $idTalla
     *
     * @return Producto
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
     * @return Producto
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
