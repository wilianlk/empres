<?php

namespace BackendBundle\Entity;

/**
 * ProdDeptoAtributo
 */
class ProdDeptoAtributo
{
    /**
     * @var integer
     */
    private $idAtributo;

    /**
     * @var integer
     */
    private $idDepartamento;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $nombreIng;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $descripcionIng;

    /**
     * @var integer
     */
    private $idTipo;

    /**
     * @var integer
     */
    private $ordenTipo = 'NULL';

    /**
     * @var string
     */
    private $linkFotoDescripcion;

    /**
     * @var string
     */
    private $keywordsEsp;

    /**
     * @var string
     */
    private $keywordsIng;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idProductoReferencia;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idProductoReferencia = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set idDepartamento
     *
     * @param integer $idDepartamento
     *
     * @return ProdDeptoAtributo
     */
    public function setIdDepartamento($idDepartamento)
    {
        $this->idDepartamento = $idDepartamento;

        return $this;
    }

    /**
     * Get idDepartamento
     *
     * @return integer
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return ProdDeptoAtributo
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
     * @return ProdDeptoAtributo
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
     * @return ProdDeptoAtributo
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
     * @return ProdDeptoAtributo
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
     * Set idTipo
     *
     * @param integer $idTipo
     *
     * @return ProdDeptoAtributo
     */
    public function setIdTipo($idTipo)
    {
        $this->idTipo = $idTipo;

        return $this;
    }

    /**
     * Get idTipo
     *
     * @return integer
     */
    public function getIdTipo()
    {
        return $this->idTipo;
    }

    /**
     * Set ordenTipo
     *
     * @param integer $ordenTipo
     *
     * @return ProdDeptoAtributo
     */
    public function setOrdenTipo($ordenTipo)
    {
        $this->ordenTipo = $ordenTipo;

        return $this;
    }

    /**
     * Get ordenTipo
     *
     * @return integer
     */
    public function getOrdenTipo()
    {
        return $this->ordenTipo;
    }

    /**
     * Set linkFotoDescripcion
     *
     * @param string $linkFotoDescripcion
     *
     * @return ProdDeptoAtributo
     */
    public function setLinkFotoDescripcion($linkFotoDescripcion)
    {
        $this->linkFotoDescripcion = $linkFotoDescripcion;

        return $this;
    }

    /**
     * Get linkFotoDescripcion
     *
     * @return string
     */
    public function getLinkFotoDescripcion()
    {
        return $this->linkFotoDescripcion;
    }

    /**
     * Set keywordsEsp
     *
     * @param string $keywordsEsp
     *
     * @return ProdDeptoAtributo
     */
    public function setKeywordsEsp($keywordsEsp)
    {
        $this->keywordsEsp = $keywordsEsp;

        return $this;
    }

    /**
     * Get keywordsEsp
     *
     * @return string
     */
    public function getKeywordsEsp()
    {
        return $this->keywordsEsp;
    }

    /**
     * Set keywordsIng
     *
     * @param string $keywordsIng
     *
     * @return ProdDeptoAtributo
     */
    public function setKeywordsIng($keywordsIng)
    {
        $this->keywordsIng = $keywordsIng;

        return $this;
    }

    /**
     * Get keywordsIng
     *
     * @return string
     */
    public function getKeywordsIng()
    {
        return $this->keywordsIng;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     *
     * @return ProdDeptoAtributo
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
     * @return ProdDeptoAtributo
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
     * @return ProdDeptoAtributo
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
     * @return ProdDeptoAtributo
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
     * Add idProductoReferencium
     *
     * @param \BackendBundle\Entity\ProdReferencia $idProductoReferencium
     *
     * @return ProdDeptoAtributo
     */
    public function addIdProductoReferencium(\BackendBundle\Entity\ProdReferencia $idProductoReferencium)
    {
        $this->idProductoReferencia[] = $idProductoReferencium;

        return $this;
    }

    /**
     * Remove idProductoReferencium
     *
     * @param \BackendBundle\Entity\ProdReferencia $idProductoReferencium
     */
    public function removeIdProductoReferencium(\BackendBundle\Entity\ProdReferencia $idProductoReferencium)
    {
        $this->idProductoReferencia->removeElement($idProductoReferencium);
    }

    /**
     * Get idProductoReferencia
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdProductoReferencia()
    {
        return $this->idProductoReferencia;
    }
}
