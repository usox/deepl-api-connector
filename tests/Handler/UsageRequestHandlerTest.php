<?php

declare(strict_types=1);

namespace Scn\DeeplApiConnector\Handler;

use Scn\DeeplApiConnector\TestCase;

class UsageRequestHandlerTest extends TestCase
{
    /**
     * @var DeeplUsageRequestHandler
     */
    private $subject;

    public function setUp(): void
    {
        $this->subject = new DeeplUsageRequestHandler(
            'some key'
        );
    }

    public function testGetPathCanReturnApiPath(): void
    {
        $this->assertSame(DeeplUsageRequestHandler::API_ENDPOINT, $this->subject->getPath());
    }

    public function testGetMethodCanReturnMethod(): void
    {
        $this->assertSame(DeeplRequestHandlerInterface::METHOD_GET, $this->subject->getMethod());
    }

    public function testGetBodyCanReturnArray(): void
    {
        $expected = ['form_params' => ['auth_key' => 'some key']];
        $return = $this->subject->getBody();

        foreach ($expected as $key => $value) {
            $this->assertArrayHasKey($key, $return);
            $this->assertSame($value, $return[$key]);
        }
    }
}
