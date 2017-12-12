<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Beneficiary
 *
 * @ORM\Table(name="beneficiary")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BeneficiaryRepository")
 */
class Beneficiary
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_ambassador", type="boolean", nullable=true)
     */
    private $ambassador;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_expert", type="boolean", nullable=true)
     */
    private $expert;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="beneficiaries")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="BookedShift", mappedBy="shifter",cascade={"remove"})
     */
    private $shifts;

    /**
     * @ORM\OneToMany(targetEntity="BookedShift", mappedBy="booker",cascade={"remove"})
     */
    private $booked_shifts;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Beneficiary
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Beneficiary
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Beneficiary
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
     * Set phone
     *
     * @param string $phone
     *
     * @return Beneficiary
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Beneficiary
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set ambassador
     *
     * @param boolean $ambassador
     *
     * @return Beneficiary
     */
    public function setAmbassador($ambassador)
    {
        $this->ambassador = $ambassador;

        return $this;
    }

    /**
     * Get isAmbassador
     *
     * @return boolean
     */
    public function isAmbassador()
    {
        return $this->ambassador;
    }

    /**
     * Set expert
     *
     * @param boolean $expert
     *
     * @return Beneficiary
     */
    public function setExpert($expert)
    {
        $this->expert = $expert;

        return $this;
    }

    /**
     * Get expert
     *
     * @return boolean
     */
    public function isExpert()
    {
        return $this->expert;
    }

    public function isMain()
    {
        return $this === $this->getUser()->getMainBeneficiary();
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->shifts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->booked_shifts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get ambassador
     *
     * @return boolean
     */
    public function getAmbassador()
    {
        return $this->ambassador;
    }

    /**
     * Get expert
     *
     * @return boolean
     */
    public function getExpert()
    {
        return $this->expert;
    }

    /**
     * Add shift
     *
     * @param \AppBundle\Entity\BookedShift $shift
     *
     * @return Beneficiary
     */
    public function addShift(\AppBundle\Entity\BookedShift $shift)
    {
        $this->shifts[] = $shift;

        return $this;
    }

    /**
     * Remove shift
     *
     * @param \AppBundle\Entity\BookedShift $shift
     */
    public function removeShift(\AppBundle\Entity\BookedShift $shift)
    {
        $this->shifts->removeElement($shift);
    }

    /**
     * Get shifts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getShifts()
    {
        return $this->shifts;
    }

    /**
     * Add bookedShift
     *
     * @param \AppBundle\Entity\BookedShift $bookedShift
     *
     * @return Beneficiary
     */
    public function addBookedShift(\AppBundle\Entity\BookedShift $bookedShift)
    {
        $this->booked_shifts[] = $bookedShift;

        return $this;
    }

    /**
     * Remove bookedShift
     *
     * @param \AppBundle\Entity\BookedShift $bookedShift
     */
    public function removeBookedShift(\AppBundle\Entity\BookedShift $bookedShift)
    {
        $this->booked_shifts->removeElement($bookedShift);
    }

    /**
     * Get bookedShifts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBookedShifts()
    {
        return $this->booked_shifts;
    }
}
