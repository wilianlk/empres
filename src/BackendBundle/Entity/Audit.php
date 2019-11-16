<?php

namespace BackendBundle\Entity;

/**
 * Audit
 */
class Audit
{
    /**
     * @var integer
     */
    private $modifiedWhen;

    /**
     * @var string
     */
    private $modifiedByIp = '';

    /**
     * @var string
     */
    private $modifiedByUser = '';

    /**
     * @var integer
     */
    private $modifiedFrom;

    /**
     * @var integer
     */
    private $modifiedTo;

    /**
     * @var string
     */
    private $modifiedWhy = '';

    /**
     * @var string
     */
    private $userModified = '';


    /**
     * Get modifiedWhen
     *
     * @return integer
     */
    public function getModifiedWhen()
    {
        return $this->modifiedWhen;
    }

    /**
     * Set modifiedByIp
     *
     * @param string $modifiedByIp
     *
     * @return Audit
     */
    public function setModifiedByIp($modifiedByIp)
    {
        $this->modifiedByIp = $modifiedByIp;

        return $this;
    }

    /**
     * Get modifiedByIp
     *
     * @return string
     */
    public function getModifiedByIp()
    {
        return $this->modifiedByIp;
    }

    /**
     * Set modifiedByUser
     *
     * @param string $modifiedByUser
     *
     * @return Audit
     */
    public function setModifiedByUser($modifiedByUser)
    {
        $this->modifiedByUser = $modifiedByUser;

        return $this;
    }

    /**
     * Get modifiedByUser
     *
     * @return string
     */
    public function getModifiedByUser()
    {
        return $this->modifiedByUser;
    }

    /**
     * Set modifiedFrom
     *
     * @param integer $modifiedFrom
     *
     * @return Audit
     */
    public function setModifiedFrom($modifiedFrom)
    {
        $this->modifiedFrom = $modifiedFrom;

        return $this;
    }

    /**
     * Get modifiedFrom
     *
     * @return integer
     */
    public function getModifiedFrom()
    {
        return $this->modifiedFrom;
    }

    /**
     * Set modifiedTo
     *
     * @param integer $modifiedTo
     *
     * @return Audit
     */
    public function setModifiedTo($modifiedTo)
    {
        $this->modifiedTo = $modifiedTo;

        return $this;
    }

    /**
     * Get modifiedTo
     *
     * @return integer
     */
    public function getModifiedTo()
    {
        return $this->modifiedTo;
    }

    /**
     * Set modifiedWhy
     *
     * @param string $modifiedWhy
     *
     * @return Audit
     */
    public function setModifiedWhy($modifiedWhy)
    {
        $this->modifiedWhy = $modifiedWhy;

        return $this;
    }

    /**
     * Get modifiedWhy
     *
     * @return string
     */
    public function getModifiedWhy()
    {
        return $this->modifiedWhy;
    }

    /**
     * Set userModified
     *
     * @param string $userModified
     *
     * @return Audit
     */
    public function setUserModified($userModified)
    {
        $this->userModified = $userModified;

        return $this;
    }

    /**
     * Get userModified
     *
     * @return string
     */
    public function getUserModified()
    {
        return $this->userModified;
    }
}
