<?php

namespace BackendBundle\Entity;

/**
 * Configuracion
 */
class Configuracion
{
    /**
     * @var integer
     */
    private $idConfig;

    /**
     * @var string
     */
    private $nombreConfig;


    /**
     * Get idConfig
     *
     * @return integer
     */
    public function getIdConfig()
    {
        return $this->idConfig;
    }

    /**
     * Set nombreConfig
     *
     * @param string $nombreConfig
     *
     * @return Configuracion
     */
    public function setNombreConfig($nombreConfig)
    {
        $this->nombreConfig = $nombreConfig;

        return $this;
    }

    /**
     * Get nombreConfig
     *
     * @return string
     */
    public function getNombreConfig()
    {
        return $this->nombreConfig;
    }
}
