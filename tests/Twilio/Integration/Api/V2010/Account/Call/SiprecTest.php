<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Api\V2010\Account\Call;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class SiprecTest extends HolodeckTestCase {
    public function testCreateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->api->v2010->accounts("ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                     ->calls("CAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                     ->siprec->create();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://api.twilio.com/2010-04-01/Accounts/ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Calls/CAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Siprec.json'
        ));
    }

    public function testCreateNoArgsResponse(): void {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "call_sid": "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sid": "SRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "name": null,
                "status": "in-progress",
                "date_updated": "Thu, 30 Jul 2015 20:00:00 +0000"
            }
            '
        ));

        $actual = $this->twilio->api->v2010->accounts("ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                           ->calls("CAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                           ->siprec->create();

        $this->assertNotNull($actual);
    }

    public function testCreateWithArgsResponse(): void {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "call_sid": "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sid": "SRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "name": "myName",
                "status": "in-progress",
                "date_updated": "Thu, 30 Jul 2015 20:00:00 +0000"
            }
            '
        ));

        $actual = $this->twilio->api->v2010->accounts("ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                           ->calls("CAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                           ->siprec->create();

        $this->assertNotNull($actual);
    }

    public function testUpdateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->api->v2010->accounts("ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                     ->calls("CAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                     ->siprec("SRXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update("stopped");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = ['Status' => "stopped", ];

        $this->assertRequest(new Request(
            'post',
            'https://api.twilio.com/2010-04-01/Accounts/ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Calls/CAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Siprec/SRXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX.json',
            null,
            $values
        ));
    }

    public function testUpdateBySidResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "call_sid": "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sid": "SRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "name": null,
                "status": "stopped",
                "date_updated": "Thu, 30 Jul 2015 20:00:00 +0000"
            }
            '
        ));

        $actual = $this->twilio->api->v2010->accounts("ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                           ->calls("CAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                           ->siprec("SRXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update("stopped");

        $this->assertNotNull($actual);
    }

    public function testUpdateByNameResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "call_sid": "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sid": "SRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "name": "mySiprec",
                "status": "stopped",
                "date_updated": "Thu, 30 Jul 2015 20:00:00 +0000"
            }
            '
        ));

        $actual = $this->twilio->api->v2010->accounts("ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                           ->calls("CAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                           ->siprec("SRXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update("stopped");

        $this->assertNotNull($actual);
    }
}