<?php

class TwilioController extends Zend_Controller_Action
{
    
	/**
     * @var Bisna\Application\Container\DoctrineContainer
     */
    protected $doctrine;

    /**
     * @var Doctrine\ODM\MongoDB\DocumentManager
     */
    protected $documentManager;

    /**
     * @var ShareThat\Entity\Repository\VideoRepository
     */
    protected $videoRepository;

    public function init()
    {
        $this->doctrine = Zend_Registry::get('doctrine');
        $this->documentManager = $this->doctrine->getDocumentManager();
        $this->videoRepository = $this->documentManager->getRepository('\ShareThat\Document\Video');

        $contextSwitch = $this->_helper->getHelper('contextSwitch');
        $contextSwitch->addActionContext('sms', 'xml')
                      ->initContext();
    }
    
    public function smsAction()
    {
        $smsBody = $this->getRequest()->getParam('Body');
        
        if (empty($smsBody)) {
            $this->view->message = 'Request is missing Body parameter';
            return;
        }
        
        //TODO: the search needs to be case insensitive
        
        /* @var $cursor Doctrine\ODM\MongoDB\MongoCursor */
        $cursor = $this->documentManager->find('\ShareThat\Document\Video', array('shortName'=>$smsBody));
        if (!$cursor->count()) {
            $this->view->message = 'Sorry, we couldn\'t find a video with that Short Name. Please check the Short Name and try again.';
            return;
        }
        $video = $cursor->getSingleResult();
        switch ($video->getStatus()) {
            case ShareThat\Document\Video::STATUS_PUBLISHED:
                $this->view->message = 'Great News! That video is already available on the Internet and will be shared immediately!';
                break;
            case ShareThat\Document\Video::STATUS_PENDING:
                $this->view->message = 'That video isn\'t on the Internet yet. As soon as it is published we will share it for you!';
                break;
            default:
                $this->view->message = 'Sorry, we couldn\'t find a video with that Short Name. Please check the Short Name and try again.';
                break;
        }
    }

}





