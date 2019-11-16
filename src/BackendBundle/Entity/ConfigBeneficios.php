<?php

namespace BackendBundle\Entity;

/**
 * ConfigBeneficios
 */
class ConfigBeneficios
{
    /**
     * @var integer
     */
    private $idConfigBeneficios;

    /**
     * @var string
     */
    private $idBeneficio;

    /**
     * @var string
     */
    private $idConfig;

    /**
     * @var integer
     */
    private $cantidad;

    /**
     * @var string
     */
    private $unidadMedida;

    /**
     * Get idConfigBeneficios
     *
     * @return integer
     */
    public function getIdConfigBeneficios()
    {
        return $this->idConfigBeneficios;
    }

    /**
     * Set idBeneficio
     *
     * @param string $idBeneficio
     *
     * @return ConfigBeneficios
     */
    public function setIdBeneficio($idBeneficio)
    {
        $this->idBeneficio = $idBeneficio;

        return $this;
    }

    /**
     * Get idBeneficio
     *
     * @return string
     */
    public function getIdBeneficio()
    {
        return $this->idBeneficio;
    }

    /**
     * Set idConfig
     *
     * @param string $idConfig
     *
     * @return ConfigBeneficios
     */
    public function setIdConfig($idConfig)
    {
        $this->idConfig = $idConfig;

        return $this;
    }

    /**
     * Get idConfig
     *
     * @return string
     */
    public function getIdConfig()
    {
        return $this->idConfig;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return ConfigBeneficios
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
     * Set unidadMedida
     *
     * @param string $unidadMedida
     *
     * @return ConfigBeneficios
     */
    public function setUnidadMedida($unidadMedida)
    {
        $this->unidadMedida = $unidadMedida;

        return $this;
    }

    /**
     * Get unidadMedida
     *
     * @return string
     */
    public function getUnidadMedida()
    {
        return $this->unidadMedida;
    }
}
