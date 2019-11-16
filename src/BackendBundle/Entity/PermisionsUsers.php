<?php

namespace BackendBundle\Entity;

/**
 * PermisionsUsers
 */
class PermisionsUsers
{
    /**
     * @var integer
     */
    private $idPermisionUser;

    /**
     * @var integer
     */
    private $idUser;

    /**
     * @var integer
     */
    private $idPermision;

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
     * Get idPermisionUser
     *
     * @return integer
     */
    public function getIdPermisionUser()
    {
        return $this->idPermisionUser;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return PermisionsUsers
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
     * Set idPermision
     *
     * @param integer $idPermision
     *
     * @return PermisionsUsers
     */
    public function setIdPermision($idPermision)
    {
        $this->idPermision = $idPermision;

        return $this;
    }

    /**
     * Get idPermision
     *
     * @return integer
     */
    public function getIdPermision()
    {
        return $this->idPermision;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     *
     * @return PermisionsUsers
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
     * @return PermisionsUsers
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
     * @return PermisionsUsers
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
     * @return PermisionsUsers
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
}
