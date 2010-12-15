<?php

namespace ShareThat\Entity;

/**
 * @Entity(repositoryClass="ShareThat\Entity\Repository\VideoRepository")
 */
class Video
{

    /**
     * @Id @GeneratedValue
     * @Column(type="bigint")
     * @var integer
     */
    protected $id;
    
    /**
     * @Column(type="string", length=250)
     * @var string
     */
    protected $name;
    
    /**
     * @Column(type="string", length=50)
     * @var string
     */
    protected $shortName;
    
	/**
     * Get id
     *
     * @return bigint $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
    
	/**
     * Set short name
     *
     * @param string $shortName
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
    }

    /**
     * Get short name
     *
     * @return string $shortName
     */
    public function getShortName()
    {
        return $this->shortName;
    }
}
