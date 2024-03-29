<?php

namespace ContestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * University
 *
 * @ORM\Table(name="university")
 * @ORM\Entity(repositoryClass="ContestBundle\Repository\UniversityRepository")
 */
class University
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var Participant[]
     * @ORM\OneToMany(targetEntity="ContestBundle\Entity\Participant",mappedBy="university")
     */
    private $participants;

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
     * Set name
     *
     * @param string $name
     *
     * @return University
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->participants = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add participant
     *
     * @param \ContestBundle\Entity\Participant $participant
     *
     * @return University
     */
    public function addParticipant(\ContestBundle\Entity\Participant $participant)
    {
        $this->participants[] = $participant;

        return $this;
    }

    /**
     * Remove participant
     *
     * @param \ContestBundle\Entity\Participant $participant
     */
    public function removeParticipant(\ContestBundle\Entity\Participant $participant)
    {
        $this->participants->removeElement($participant);
    }

    /**
     * Get participants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipants()
    {
        return $this->participants;
    }
}
