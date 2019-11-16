<?php

namespace BackendBundle\Entity;

/**
 * PermisionUser
 */
class PermisionUser
{
    /**
     * @var integer
     */
    private $idPermisionUser;

    /**
     * @var integer
     */
    private $createdBy;

    /**
     * @var integer
     */
    private $updatedBy;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \BackendBundle\Entity\Permision
     */
    private $idPermision;

    /**
     * @var \BackendBundle\Entity\User
     */
    private $idUser;


    /**
     * Get idPermisionUser
     *
     * @return integer
     */
    public function getIdPermisionUser()
    {
        return $this->idPermisionUser;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     *
     * @return PermisionUser
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
     * @return PermisionUser
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PermisionUser
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
     * @return PermisionUser
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
     * Set idPermision
     *
     * @param \BackendBundle\Entity\Permision $idPermision
     *
     * @return PermisionUser
     */
    public function setIdPermision(\BackendBundle\Entity\Permision $idPermision = null)
    {
        $this->idPermision = $idPermision;

        return $this;
    }

    /**
     * Get idPermision
     *
     * @return \BackendBundle\Entity\Permision
     */
    public function getIdPermision()
    {
        return $this->idPermision;
    }

    /**
     * Set idUser
     *
     * @param \BackendBundle\Entity\User $idUser
     *
     * @return PermisionUser
     */
    public function setIdUser(\BackendBundle\Entity\User $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \BackendBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
