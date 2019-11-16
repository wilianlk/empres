<?php

namespace BackendBundle\Entity;

/**
 * UserLogCreditos
 */
class UserLogCreditos
{
    /**
     * @var integer
     */
    private $idUserLogCreditos;

    /**
     * @var \DateTime
     */
    private $año;

    /**
     * @var string
     */
    private $mes;

    /**
     * @var integer
     */
    private $idUser;

    /**
     * @var integer
     */
    private $idTienda;

    /**
     * @var float
     */
    private $monto;


    /**
     * Get idUserLogCreditos
     *
     * @return integer
     */
    public function getIdUserLogCreditos()
    {
        return $this->idUserLogCreditos;
    }

    /**
     * Set año
     *
     * @param \DateTime $año
     *
     * @return UserLogCreditos
     */
    public function setAño($año)
    {
        $this->año = $año;

        return $this;
    }

    /**
     * Get año
     *
     * @return \DateTime
     */
    public function getAño()
    {
        return $this->año;
    }

    /**
     * Set mes
     *
     * @param string $mes
     *
     * @return UserLogCreditos
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return string
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return UserLogCreditos
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idTienda
     *
     * @param integer $idTienda
     *
     * @return UserLogCreditos
     */
    public function setIdTienda($idTienda)
    {
        $this->idTienda = $idTienda;

        return $this;
    }

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
     * Set monto
     *
     * @param float $monto
     *
     * @return UserLogCreditos
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
}
