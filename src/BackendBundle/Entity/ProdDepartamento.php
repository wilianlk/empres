<?php

namespace BackendBundle\Entity;

/**
 * ProdDepartamento
 */
class ProdDepartamento
{
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
    private $nombreIng = 'NULL';

    /**
     * @var string
     */
    private $labelA1 = 'NULL';

    /**
     * @var string
     */
    private $labelA2 = 'NULL';

    /**
     * @var string
     */
    private $labelA3 = 'NULL';

    /**
     * @var string
     */
    private $labelA4;

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
     * @return ProdDepartamento
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
     * @return ProdDepartamento
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
     * Set labelA1
     *
     * @param string $labelA1
     *
     * @return ProdDepartamento
     */
    public function setLabelA1($labelA1)
    {
        $this->labelA1 = $labelA1;

        return $this;
    }

    /**
     * Get labelA1
     *
     * @return string
     */
    public function getLabelA1()
    {
        return $this->labelA1;
    }

    /**
     * Set labelA2
     *
     * @param string $labelA2
     *
     * @return ProdDepartamento
     */
    public function setLabelA2($labelA2)
    {
        $this->labelA2 = $labelA2;

        return $this;
    }

    /**
     * Get labelA2
     *
     * @return string
     */
    public function getLabelA2()
    {
        return $this->labelA2;
    }

    /**
     * Set labelA3
     *
     * @param string $labelA3
     *
     * @return ProdDepartamento
     */
    public function setLabelA3($labelA3)
    {
        $this->labelA3 = $labelA3;

        return $this;
    }

    /**
     * Get labelA3
     *
     * @return string
     */
    public function getLabelA3()
    {
        return $this->labelA3;
    }

    /**
     * Set labelA4
     *
     * @param string $labelA4
     *
     * @return ProdDepartamento
     */
    public function setLabelA4($labelA4)
    {
        $this->labelA4 = $labelA4;

        return $this;
    }

    /**
     * Get labelA4
     *
     * @return string
     */
    public function getLabelA4()
    {
        return $this->labelA4;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return ProdDepartamento
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
     * @return ProdDepartamento
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
     * @return ProdDepartamento
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
     * @return ProdDepartamento
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
     * @return ProdDepartamento
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
     * @return ProdDepartamento
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
     * @return ProdDepartamento
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
