<?php

namespace BackendBundle\Entity;

/**
 * Dbversion
 */
class Dbversion
{
    /**
     * @var string
     */
    private $dbversion = '0.0';


    /**
     * Get dbversion
     *
     * @return string
     */
    public function getDbversion()
    {
        return $this->dbversion;
    }
}
