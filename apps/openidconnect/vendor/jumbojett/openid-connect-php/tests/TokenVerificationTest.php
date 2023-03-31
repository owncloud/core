<?php


use Jumbojett\OpenIDConnectClient;
use PHPUnit\Framework\MockObject\MockObject;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class TokenVerificationTest extends TestCase
{
    /**
     * @param $alg
     * @param $jwt
     * @throws \Jumbojett\OpenIDConnectClientException
     * @dataProvider providesTokens
     */
    public function testTokenVerification($alg, $jwt)
    {
        /** @var OpenIDConnectClient | MockObject $client */
        $client = $this->getMockBuilder(OpenIDConnectClient::class)->setMethods(['fetchUrl'])->getMock();
        $client->method('fetchUrl')->willReturn(file_get_contents(__DIR__ . "/data/jwks-$alg.json"));
        $client->setProviderURL('https://jwt.io/');
        $client->providerConfigParam(['jwks_uri' => 'https://jwt.io/.well-known/jwks.json']);
        $verified = $client->verifyJWTsignature($jwt);
        self::assertTrue($verified);
        $client->setAccessToken($jwt);
    }

    public function providesTokens()
    {
        return [
            'PS256' => ['ps256', 'eyJhbGciOiJQUzI1NiIsImtpZCI6Imtvbm5lY3RkLXRva2Vucy1zaWduaW5nLWtleSIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJrcG9wLWh0dHBzOi8va29wYW5vLmRlbW8vbWVldC8iLCJleHAiOjE1NjgzNzE0NjEsImp0aSI6IkpkR0tDbEdOTXl2VXJpcmlRRUlWUXZCVmttT2FfQkRjIiwiaWF0IjoxNTY4MzcxMjIxLCJpc3MiOiJodHRwczovL2tvcGFuby5kZW1vIiwic3ViIjoiUHpUVWp3NHBlXzctWE5rWlBILXJxVHE0MTQ1Z3lDdlRvQmk4V1E5bFBrcW5rbEc1aktvRU5LM21Qb0I1WGY1ZTM5dFRMR2RKWXBMNEJubXFnelpaX0FAa29ubmVjdCIsImtjLmlzQWNjZXNzVG9rZW4iOnRydWUsImtjLmF1dGhvcml6ZWRTY29wZXMiOlsicHJvZmlsZSIsImVtYWlsIiwia29wYW5vL2t3bSIsImtvcGFuby9nYyIsImtvcGFuby9rdnMiLCJvcGVuaWQiXSwia2MuYXV0aG9yaXplZENsYWltcyI6eyJpZF90b2tlbiI6eyJuYW1lIjpudWxsfX0sImtjLmlkZW50aXR5Ijp7ImtjLmkuZG4iOiJKb25hcyBCcmVra2UiLCJrYy5pLmlkIjoiQUFBQUFLd2hxVkJBMCs1SXN4bjdwMU13UkNVQkFBQUFCZ0FBQUJzQUFBQk5VVDA5QUFBQUFBPT0iLCJrYy5pLnVuIjoidXNlcjEiLCJrYy5pLnVzIjoiTVEifSwia2MucHJvdmlkZXIiOiJpZGVudGlmaWVyLWtjIn0.hGRuXvul2kOiALHexwYp5MBEJVwz1YV3ehyM3AOuwCoK2w5sJxdciqqY_TfXCKyO6nAEbYLK3J0CBOjfup_IG0aCZcwzjto8khYlc4ezXkGnFsbJBNQdDGkpHtWnioWx-OJ3cXvY9F8aOvjaq0gw11ZDAcqQl0g7LTbJ9-J_yx0pmy3NGai2JB30Fh1OgSDzYfxWnE0RRgZG-x68e65RXfSBaEGW85OUh4wihxO2zdTGAHJ3Iq_-QAG4yRbXZtLx3ZspG7LNmqG-YE3huy3Rd8u3xrJNhmUOfEnz3x07q7VW0cj9NedX98BAbj3iNvksQsE0oG0J_f_Tu8Ai8VbWB72sJuXZWxANDKdz0BBYLzXhsjXkNByRq9x3zqDVsX-cVHei_XudxEOVRBjhkvW2MmIjcAHNKCKsdar865-gFG9McP4PCcBlY28tC0Cvnzyi83LBfpGRXdl6MJunnUsKQ1C79iCoVI1doK1erFN959Q-TGJfJA3Tr5LNpuGawB5rpe1nDGWvmYhg3uYfNl8uTTyvNgvvejcflEb2DURuXdqABuSiP7RkDWYtzx6mq49G0tRxelBbvyjQ2id2QjmRRdQ6dHEZ2NCJ51b8OFoDJBtxN1CD62TTxa3FUqCdZAPAUR3hHn_69vYq82MR514s-Gb67A6j2PbMPFATQP2UdK8']
        ];
    }
}
