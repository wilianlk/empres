<?php

namespace BackendBundle\Entity;

/**
 * Punchlist
 */
class Punchlist
{
    /**
     * @var integer
     */
    private $idPunchlist;

    /**
     * @var string
     */
    private $punchitems = '';

    /**
     * @var string
     */
    private $color = '';

    /**
     * @var boolean
     */
    private $inOrOut;


    /**
     * Get idPunchlist
     *
     * @return integer
     */
    public function getIdPunchlist()
    {
        return $this->idPunchlist;
    }

    /**
     * Set punchitems
     *
     * @param string $punchitems
     *
     * @return Punchlist
     */
    public function setPunchitems($punchitems)
    {
        $this->punchitems = $punchitems;

        return $this;
    }

    /**
     * Get punchitems
     *
     * @return string
     */
    public function getPunchitems()
    {
        return $this->punchitems;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Punchlist
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set inOrOut
     *
     * @param boolean $inOrOut
     *
     * @return Punchlist
     */
    public function setInOrOut($inOrOut)
    {
        $this->inOrOut = $inOrOut;

        return $this;
    }

    /**
     * Get inOrOut
     *
     * @return boolean
     */
    public function getInOrOut()
    {
        return $this->inOrOut;
    }
}
