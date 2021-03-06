<?php

declare(strict_types=1);

namespace Scn\DeeplApiConnector\Handler;

use Scn\DeeplApiConnector\Model\FileSubmissionInterface;
use Scn\DeeplApiConnector\Model\FileTranslationConfigInterface;
use Scn\DeeplApiConnector\Model\TranslationConfigInterface;
use Scn\DeeplApiConnector\TestCase;

class DeeplRequestFactoryTest extends TestCase
{
    /**
     * @var DeeplRequestFactory
     */
    private $subject;

    public function setUp(): void
    {
        $this->subject = new DeeplRequestFactory(
            'some api key'
        );
    }

    public function testCreateDeeplUsageRequestHandlerCanReturnInstanceOfUsageRequestHandler(): void
    {
        $this->assertInstanceOf(
            DeeplUsageRequestHandler::class,
            $this->subject->createDeeplUsageRequestHandler()
        );
    }

    public function testCreateDeeplTranslationRequestHandler(): void
    {
        $translation = $this->createMock(TranslationConfigInterface::class);
        $this->assertInstanceOf(
            DeeplTranslationRequestHandler::class,
            $this->subject->createDeeplTranslationRequestHandler($translation)
        );
    }

    public function testCreateDeeplfileSubmissionRequestHandler(): void
    {
        $fileTranslation = $this->createMock(FileTranslationConfigInterface::class);
        $this->assertInstanceOf(
            DeeplFileSubmissionRequestHandler::class,
            $this->subject->createDeeplFileSubmissionRequestHandler($fileTranslation)
        );
    }

    public function testCreateDeeplFileTranslationStatusRequestHandler(): void
    {
        $fileSubmission = $this->createMock(FileSubmissionInterface::class);
        $this->assertInstanceOf(
            DeeplFileTranslationStatusRequestHandler::class,
            $this->subject->createDeeplFileTranslationStatusRequestHandler($fileSubmission)
        );
    }

    public function testCreateDeeplFileTranslationRequestHandler(): void
    {
        $fileSubmission = $this->createMock(FileSubmissionInterface::class);
        $this->assertInstanceOf(
            DeeplFileRequestHandler::class,
            $this->subject->createDeeplFileTranslationRequestHandler($fileSubmission)
        );
    }
}
