<?php

class VideoController extends Zend_Controller_Action
{

    /**
     * @var Bisna\Application\Container\DoctrineContainer
     */
    protected $doctrine;

    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @var ShareThat\Entity\Repository\VideoRepository
     */
    protected $videoRepository;

    public function init()
    {
        $this->doctrine = Zend_Registry::get('doctrine');
        $this->entityManager = $this->doctrine->getEntityManager();
        $this->videoRepository = $this->entityManager->getRepository('\ShareThat\Entity\Video');
    }

    public function indexAction()
    {
        $this->_forward('list');
    }

    public function listAction()
    {
        $videos = $this->videoRepository->findAll();
        
        $this->view->videos = $videos;
    }

    public function createAction()
    {
        $form = new Application_Form_Video();

        if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
            $video = new \ShareThat\Entity\Video();

            $this->videoRepository->saveVideo($video, $form->getValues());

            $this->entityManager->flush();
    
            $this->_helper->flashMessenger->addMessage('Video saved.');
            
            return $this->_redirect('/video/list');
        }

        $this->view->form = $form;
    }

    public function deleteAction()
    {
        $id = $this->getRequest()->getParam('id');

        if ($id == null) {
            throw new Exception('Id must be provided for the delete action');
        }

        $this->videoRepository->removeVideo($id);
        
        $this->entityManager->flush();

        $this->_helper->flashMessenger->addMessage('Video deleted.');
        
        return $this->_redirect('/video/list');
    }

    public function editAction()
    {
        $form = new Application_Form_Video();

        $id = $this->getRequest()->getParam('id');
        
        if ($id == null) {
            throw new Exception('Id must be provided for the edit action');
        }
    
        $video = $this->videoRepository->findOneBy(array('id' => $id));

        if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
            $this->videoRepository->saveVideo($video, $form->getValues());
            
            $this->entityManager->flush();
    
            $this->_helper->flashMessenger->addMessage('Video saved.');
            
            return $this->_redirect('/video/list');
        }

        $form->setDefaultsFromEntity($video); // pass values to form

        $this->view->form = $form;
    }
}

