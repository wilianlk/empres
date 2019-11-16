<?php

namespace BackendBundle\Entity;

/**
 * Groups
 */
class Groups
{
    /**
     * @var integer
     */
    private $groupid;

    /**
     * @var string
     */
    private $groupname = '';

    /**
     * @var integer
     */
    private $officeid = '0';


    /**
     * Get groupid
     *
     * @return integer
     */
    public function getGroupid()
    {
        return $this->groupid;
    }

    /**
     * Set groupname
     *
     * @param string $groupname
     *
     * @return Groups
     */
    public function setGroupname($groupname)
    {
        $this->groupname = $groupname;

        return $this;
    }

    /**
     * Get groupname
     *
     * @return string
     */
    public function getGroupname()
    {
        return $this->groupname;
    }

    /**
     * Set officeid
     *
     * @param integer $officeid
     *
     * @return Groups
     */
    public function setOfficeid($officeid)
    {
        $this->officeid = $officeid;

        return $this;
    }

    /**
     * Get officeid
     *
     * @return integer
     */
    public function getOfficeid()
    {
        return $this->officeid;
    }
}
