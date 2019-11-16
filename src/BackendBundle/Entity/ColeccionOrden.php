<?php

namespace BackendBundle\Entity;

/**
 * ColeccionOrden
 */
class ColeccionOrden
{
    /**
     * @var integer
     */
    private $posicion;

    /**
     * @var \BackendBundle\Entity\ProdDepartamento
     */
    private $idDepartamento;


    /**
     * Set posicion
     *
     * @param integer $posicion
     *
     * @return ColeccionOrden
     */
    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;

        return $this;
    }

    /**
     * Get posicion
     *
     * @return integer
     */
    public function getPosicion()
    {
        return $this->posicion;
    }

    /**
     * Set idDepartamento
     *
     * @param \BackendBundle\Entity\ProdDepartamento $idDepartamento
     *
     * @return ColeccionOrden
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
     * @var integer
     */
    private $idColeccionOrden;


    /**
     * Get idColeccionOrden
     *
     * @return integer
     */
    public function getIdColeccionOrden()
    {
        return $this->idColeccionOrden;
    }
}
