<?php

declare(strict_types=1);

namespace Scn\DeeplApiConnector\Model;

use Scn\DeeplApiConnector\TestCase;

class TranslationTest extends TestCase
{
    /**
     * @var Translation
     */
    private $subject;

    public function setUp(): void
    {
        $this->subject = new Translation();
    }

    public function testGetDetectedSourceLanguageCanReturnString(): void
    {
        $this->subject->setDetectedSourceLanguage('DE');
        $this->assertSame('DE', $this->subject->getDetectedSourceLanguage());
    }

    public function testGetTextCanReturnString(): void
    {
        $this->subject->setText('some text');
        $this->assertSame('some text', $this->subject->getText());
    }

    public function testHydrateCanHydrateUsageStdClass(): void
    {
        $demo_response = json_decode('{ "translations": [ { "detected_source_language": "DE", "text": "Hello World!" } ] }');

        $this->subject->hydrate($demo_response);
        $this->assertEquals('DE', $this->subject->getDetectedSourceLanguage());
        $this->assertEquals('Hello World!', $this->subject->getText());
    }
}
