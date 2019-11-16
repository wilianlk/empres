<?php

namespace BackendBundle\Entity;

/**
 * ProdReferencia
 */
class ProdReferencia
{
    /**
     * @var integer
     */
    private $idProductoReferencia;

    /**
     * @var integer
     */
    private $idMarcaProveedor;

    /**
     * @var string
     */
    private $partidaArancelaria = 'NULL';

    /**
     * @var string
     */
    private $referencia;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $nombreIng = 'NULL';

    /**
     * @var string
     */
    private $descripcion = 'NULL';

    /**
     * @var string
     */
    private $descripcionIng = 'NULL';

    /**
     * @var string
     */
    private $descCallcenter = 'NULL';

    /**
     * @var string
     */
    private $imagen1 = 'NULL';

    /**
     * @var string
     */
    private $imagen2 = 'NULL';

    /**
     * @var string
     */
    private $imagen3 = 'NULL';

    /**
     * @var string
     */
    private $imagen4 = 'NULL';

    /**
     * @var boolean
     */
    private $estado = '1';

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
    private $createdBy = 'NULL';

    /**
     * @var integer
     */
    private $updatedBy = 'NULL';

    /**
     * @var integer
     */
    private $deletedBy = 'NULL';

    /**
     * @var string
     */
    private $imagen5 = 'NULL';

    /**
     * @var string
     */
    private $imagen6 = 'NULL';

    /**
     * @var string
     */
    private $referenciaProveedor = 'NULL';

    /**
     * @var \BackendBundle\Entity\ProdDepartamento
     */
    private $idDepartamento;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idAtributo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idAtributo = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set idMarcaProveedor
     *
     * @param integer $idMarcaProveedor
     *
     * @return ProdReferencia
     */
    public function setIdMarcaProveedor($idMarcaProveedor)
    {
        $this->idMarcaProveedor = $idMarcaProveedor;

        return $this;
    }

    /**
     * Get idMarcaProveedor
     *
     * @return integer
     */
    public function getIdMarcaProveedor()
    {
        return $this->idMarcaProveedor;
    }

    /**
     * Set partidaArancelaria
     *
     * @param string $partidaArancelaria
     *
     * @return ProdReferencia
     */
    public function setPartidaArancelaria($partidaArancelaria)
    {
        $this->partidaArancelaria = $partidaArancelaria;

        return $this;
    }

    /**
     * Get partidaArancelaria
     *
     * @return string
     */
    public function getPartidaArancelaria()
    {
        return $this->partidaArancelaria;
    }

    /**
     * Set referencia
     *
     * @param string $referencia
     *
     * @return ProdReferencia
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;

        return $this;
    }

    /**
     * Get referencia
     *
     * @return string
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return ProdReferencia
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
     * Set nombreIng
     *
     * @param string $nombreIng
     *
     * @return ProdReferencia
     */
    public function setNombreIng($nombreIng)
    {
        $this->nombreIng = $nombreIng;

        return $this;
    }

    /**
     * Get nombreIng
     *
     * @return string
     */
    public function getNombreIng()
    {
        return $this->nombreIng;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return ProdReferencia
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set descripcionIng
     *
     * @param string $descripcionIng
     *
     * @return ProdReferencia
     */
    public function setDescripcionIng($descripcionIng)
    {
        $this->descripcionIng = $descripcionIng;

        return $this;
    }

    /**
     * Get descripcionIng
     *
     * @return string
     */
    public function getDescripcionIng()
    {
        return $this->descripcionIng;
    }

    /**
     * Set descCallcenter
     *
     * @param string $descCallcenter
     *
     * @return ProdReferencia
     */
    public function setDescCallcenter($descCallcenter)
    {
        $this->descCallcenter = $descCallcenter;

        return $this;
    }

    /**
     * Get descCallcenter
     *
     * @return string
     */
    public function getDescCallcenter()
    {
        return $this->descCallcenter;
    }

    /**
     * Set imagen1
     *
     * @param string $imagen1
     *
     * @return ProdReferencia
     */
    public function setImagen1($imagen1)
    {
        $this->imagen1 = $imagen1;

        return $this;
    }

    /**
     * Get imagen1
     *
     * @return string
     */
    public function getImagen1()
    {
        return $this->imagen1;
    }

    /**
     * Set imagen2
     *
     * @param string $imagen2
     *
     * @return ProdReferencia
     */
    public function setImagen2($imagen2)
    {
        $this->imagen2 = $imagen2;

        return $this;
    }

    /**
     * Get imagen2
     *
     * @return string
     */
    public function getImagen2()
    {
        return $this->imagen2;
    }

    /**
     * Set imagen3
     *
     * @param string $imagen3
     *
     * @return ProdReferencia
     */
    public function setImagen3($imagen3)
    {
        $this->imagen3 = $imagen3;

        return $this;
    }

    /**
     * Get imagen3
     *
     * @return string
     */
    public function getImagen3()
    {
        return $this->imagen3;
    }

    /**
     * Set imagen4
     *
     * @param string $imagen4
     *
     * @return ProdReferencia
     */
    public function setImagen4($imagen4)
    {
        $this->imagen4 = $imagen4;

        return $this;
    }

    /**
     * Get imagen4
     *
     * @return string
     */
    public function getImagen4()
    {
        return $this->imagen4;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return ProdReferencia
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ProdReferencia
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
     * @return ProdReferencia
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
     * @return ProdReferencia
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
     * @return ProdReferencia
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
     * @return ProdReferencia
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
     * @return ProdReferencia
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
     * Set imagen5
     *
     * @param string $imagen5
     *
     * @return ProdReferencia
     */
    public function setImagen5($imagen5)
    {
        $this->imagen5 = $imagen5;

        return $this;
    }

    /**
     * Get imagen5
     *
     * @return string
     */
    public function getImagen5()
    {
        return $this->imagen5;
    }

    /**
     * Set imagen6
     *
     * @param string $imagen6
     *
     * @return ProdReferencia
     */
    public function setImagen6($imagen6)
    {
        $this->imagen6 = $imagen6;

        return $this;
    }

    /**
     * Get imagen6
     *
     * @return string
     */
    public function getImagen6()
    {
        return $this->imagen6;
    }

    /**
     * Set referenciaProveedor
     *
     * @param string $referenciaProveedor
     *
     * @return ProdReferencia
     */
    public function setReferenciaProveedor($referenciaProveedor)
    {
        $this->referenciaProveedor = $referenciaProveedor;

        return $this;
    }

    /**
     * Get referenciaProveedor
     *
     * @return string
     */
    public function getReferenciaProveedor()
    {
        return $this->referenciaProveedor;
    }

    /**
     * Set idDepartamento
     *
     * @param \BackendBundle\Entity\ProdDepartamento $idDepartamento
     *
     * @return ProdReferencia
     */
    public function setIdDepartamento(\BackendBundle\Entity\ProdDepartamento $idDepartamento = null)
    {
        $this->idDepartamento = $idDepartamento;

        return $this;
    }

    /**
     * Get idDepartamento
     *
     * @return \BackendBundle\Entity\ProdDepartamento
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    /**
     * Add idAtributo
     *
     * @param \BackendBundle\Entity\ProdDeptoAtributo $idAtributo
     *
     * @return ProdReferencia
     */
    public function addIdAtributo(\BackendBundle\Entity\ProdDeptoAtributo $idAtributo)
    {
        $this->idAtributo[] = $idAtributo;

        return $this;
    }

    /**
     * Remove idAtributo
     *
     * @param \BackendBundle\Entity\ProdDeptoAtributo $idAtributo
     */
    public function removeIdAtributo(\BackendBundle\Entity\ProdDeptoAtributo $idAtributo)
    {
        $this->idAtributo->removeElement($idAtributo);
    }

    /**
     * Get idAtributo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdAtributo()
    {
        return $this->idAtributo;
    }
}
