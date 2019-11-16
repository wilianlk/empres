<?php

namespace BackendBundle\Entity;

/**
 * CliSaldoAFavorLog
 */
class CliSaldoAFavorLog
{
    /**
     * @var integer
     */
    private $idSaldoAFavorLog;

    /**
     * @var integer
     */
    private $idSaldoAFavor;

    /**
     * @var integer
     */
    private $idCliente;

    /**
     * @var string
     */
    private $motivo;

    /**
     * @var float
     */
    private $monto;

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
     * Get idSaldoAFavorLog
     *
     * @return integer
     */
    public function getIdSaldoAFavorLog()
    {
        return $this->idSaldoAFavorLog;
    }

    /**
     * Set idSaldoAFavor
     *
     * @param integer $idSaldoAFavor
     *
     * @return CliSaldoAFavorLog
     */
    public function setIdSaldoAFavor($idSaldoAFavor)
    {
        $this->idSaldoAFavor = $idSaldoAFavor;

        return $this;
    }

    /**
     * Get idSaldoAFavor
     *
     * @return integer
     */
    public function getIdSaldoAFavor()
    {
        return $this->idSaldoAFavor;
    }

    /**
     * Set idCliente
     *
     * @param integer $idCliente
     *
     * @return CliSaldoAFavorLog
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
     * Set motivo
     *
     * @param string $motivo
     *
     * @return CliSaldoAFavorLog
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;

        return $this;
    }

    /**
     * Get motivo
     *
     * @return string
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Set monto
     *
     * @param float $monto
     *
     * @return CliSaldoAFavorLog
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return float
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return CliSaldoAFavorLog
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
     * @return CliSaldoAFavorLog
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
     * @return CliSaldoAFavorLog
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
     * @return CliSaldoAFavorLog
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
