<?php

namespace ShareThat\Document;

/**
 * @Document(db="sharethat", collection="videos")
 */
class Video
{

    /**
     * @Id
     * @var integer
     */
    protected $id;
    
    /**
     * @String
     * @var string
     */
    protected $name;
    
    /**
     * @String
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
