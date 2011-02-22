<?php

namespace ShareThat\Document;

/**
 * @Document(db="sharethat", collection="videos")
 */
class Video
{
    const STATUS_DRAFT = 1;
    const STATUS_PENDING = 2;
    const STATUS_PUBLISHED = 3;

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
     * @String
     * @var string
     */
    protected $url;
    
    /**
     * @Int
     * @var integer
     */
    protected $status;
    
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
    
	/**
     * Set URL
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get URL
     *
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
    }
    
	/**
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string $status
     */
    public function getStatus()
    {
        return $this->status;
    }
}
