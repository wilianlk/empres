<?php

namespace BackendBundle\Entity;

/**
 * Employees
 */
class Employees
{
    /**
     * @var integer
     */
    private $idEmployee;

    /**
     * @var string
     */
    private $empfullname = '';

    /**
     * @var integer
     */
    private $tstamp;

    /**
     * @var string
     */
    private $employeePasswd = '';

    /**
     * @var string
     */
    private $displayname = '';

    /**
     * @var string
     */
    private $email = '';

    /**
     * @var string
     */
    private $groups = '';

    /**
     * @var string
     */
    private $office = '';

    /**
     * @var \DateTime
     */
    private $admissionDate;

    /**
     * @var integer
     */
    private $attempts = '0';

    /**
     * @var string
     */
    private $currenttime;

    /**
     * @var boolean
     */
    private $admin = '0';

    /**
     * @var boolean
     */
    private $reports = '0';

    /**
     * @var boolean
     */
    private $timeAdmin = '0';

    /**
     * @var boolean
     */
    private $disabled = '0';


    /**
     * Get idEmployee
     *
     * @return integer
     */
    public function getIdEmployee()
    {
        return $this->idEmployee;
    }

    /**
     * Set empfullname
     *
     * @param string $empfullname
     *
     * @return Employees
     */
    public function setEmpfullname($empfullname)
    {
        $this->empfullname = $empfullname;

        return $this;
    }

    /**
     * Get empfullname
     *
     * @return string
     */
    public function getEmpfullname()
    {
        return $this->empfullname;
    }

    /**
     * Set tstamp
     *
     * @param integer $tstamp
     *
     * @return Employees
     */
    public function setTstamp($tstamp)
    {
        $this->tstamp = $tstamp;

        return $this;
    }

    /**
     * Get tstamp
     *
     * @return integer
     */
    public function getTstamp()
    {
        return $this->tstamp;
    }

    /**
     * Set employeePasswd
     *
     * @param string $employeePasswd
     *
     * @return Employees
     */
    public function setEmployeePasswd($employeePasswd)
    {
        $this->employeePasswd = $employeePasswd;

        return $this;
    }

    /**
     * Get employeePasswd
     *
     * @return string
     */
    public function getEmployeePasswd()
    {
        return $this->employeePasswd;
    }

    /**
     * Set displayname
     *
     * @param string $displayname
     *
     * @return Employees
     */
    public function setDisplayname($displayname)
    {
        $this->displayname = $displayname;

        return $this;
    }

    /**
     * Get displayname
     *
     * @return string
     */
    public function getDisplayname()
    {
        return $this->displayname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Employees
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set groups
     *
     * @param string $groups
     *
     * @return Employees
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;

        return $this;
    }

    /**
     * Get groups
     *
     * @return string
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Set office
     *
     * @param string $office
     *
     * @return Employees
     */
    public function setOffice($office)
    {
        $this->office = $office;

        return $this;
    }

    /**
     * Get office
     *
     * @return string
     */
    public function getOffice()
    {
        return $this->office;
    }

    /**
     * Set admissionDate
     *
     * @param \DateTime $admissionDate
     *
     * @return Employees
     */
    public function setAdmissionDate($admissionDate)
    {
        $this->admissionDate = $admissionDate;

        return $this;
    }

    /**
     * Get admissionDate
     *
     * @return \DateTime
     */
    public function getAdmissionDate()
    {
        return $this->admissionDate;
    }

    /**
     * Set attempts
     *
     * @param integer $attempts
     *
     * @return Employees
     */
    public function setAttempts($attempts)
    {
        $this->attempts = $attempts;

        return $this;
    }

    /**
     * Get attempts
     *
     * @return integer
     */
    public function getAttempts()
    {
        return $this->attempts;
    }

    /**
     * Set currenttime
     *
     * @param string $currenttime
     *
     * @return Employees
     */
    public function setCurrenttime($currenttime)
    {
        $this->currenttime = $currenttime;

        return $this;
    }

    /**
     * Get currenttime
     *
     * @return string
     */
    public function getCurrenttime()
    {
        return $this->currenttime;
    }

    /**
     * Set admin
     *
     * @param boolean $admin
     *
     * @return Employees
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get admin
     *
     * @return boolean
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set reports
     *
     * @param boolean $reports
     *
     * @return Employees
     */
    public function setReports($reports)
    {
        $this->reports = $reports;

        return $this;
    }

    /**
     * Get reports
     *
     * @return boolean
     */
    public function getReports()
    {
        return $this->reports;
    }

    /**
     * Set timeAdmin
     *
     * @param boolean $timeAdmin
     *
     * @return Employees
     */
    public function setTimeAdmin($timeAdmin)
    {
        $this->timeAdmin = $timeAdmin;

        return $this;
    }

    /**
     * Get timeAdmin
     *
     * @return boolean
     */
    public function getTimeAdmin()
    {
        return $this->timeAdmin;
    }

    /**
     * Set disabled
     *
     * @param boolean $disabled
     *
     * @return Employees
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;

        return $this;
    }

    /**
     * Get disabled
     *
     * @return boolean
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    public function __toString()
    {
        return (string)$this->currenttime;
    }
}

