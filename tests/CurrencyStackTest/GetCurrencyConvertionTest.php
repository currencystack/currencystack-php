<?php
use CurrencyStack\CurrencyConvertApi;

class GetCurrencyConvertionTest extends PHPUnit_Framework_TestCase
{
    public function testGetAllDataByIP()
    {
        $CurrencyStackClientStub = $this->getMockBuilder('CurrencyStack\Client')->disableOriginalConstructor()->getMock();

        $fakeHttpClient = $this->getMockBuilder('\CurrencyStack\HttpClient')
            ->setConstructorArgs(array('fake api key'))
            ->getMock();

        $fakeHttpClient->expects($this->once())
            ->method('get')
            ->will($this->returnValue("{\"base\":\"EUR\",\"last_update\":\"2018-12-09T19:20:59.854Z\",\"rates\":{\"AED\":4.183,\"EGP\":20.414,\"USD\":1.139},\"status\":200,\"target\":\"USD,EGP,AED\"}"));

        $CurrencyStackClientStub->CurrencyConvertApi = new CurrencyConvertApi($fakeHttpClient);
        $response = $CurrencyStackClientStub->CurrencyConvertApi->GetCurrencyConvertion('EUR', ['USD', 'EGP', 'AED']);

        $this->assertEquals('4.183', $response->rates->AED);
        $this->assertEquals('20.414', $response->rates->EGP);
    }
}
