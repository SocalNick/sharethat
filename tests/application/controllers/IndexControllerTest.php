<?php
// Call IndexControllerTest::main() if this source file is executed directly.
if (!defined("PHPUnit_MAIN_METHOD")) {
    define("PHPUnit_MAIN_METHOD", "IndexControllerTest::main");
}

require_once (realpath(dirname(__FILE__) . '/../../../library/Zend/Test/PHPUnit/ControllerTestCase.php'));
require_once 'PHPUnit/Framework/TestCase.php';

class IndexControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{
    
    public static function main()
    {
        $suite  = new PHPUnit_Framework_TestSuite(get_class($this));
        $result = PHPUnit_TextUI_TestRunner::run($suite);
    }

    public function setUp()
    {
        $application = new Zend_Application(
            APPLICATION_ENV,
            APPLICATION_PATH . '/configs/application.ini'
        );

        $this->bootstrap = $application;
        return parent::setUp();
    }

    public function tearDown()
    {
        $this->resetRequest();
        $this->resetResponse();
        parent::tearDown();
    }

    public function testIndexActionRedirects()
    {
        $this->dispatch('/');
        $this->assertRedirectTo('/video');
    }
}
