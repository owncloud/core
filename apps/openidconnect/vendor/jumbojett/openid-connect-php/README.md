PHP OpenID Connect Basic Client
========================
A simple library that allows an application to authenticate a user through the basic OpenID Connect flow.
This library hopes to encourage OpenID Connect use by making it simple enough for a developer with little knowledge of
the OpenID Connect protocol to set up authentication.

A special thanks goes to Justin Richer and Amanda Anganes for their help and support of the protocol.

# Requirements #
 1. PHP 5.4 or greater
 2. CURL extension
 3. JSON extension

## Install ##
1. Install library using composer
```
composer require jumbojett/openid-connect-php
```

2. Include composer autoloader
```php
require __DIR__ . '/vendor/autoload.php';
```

## Example 1: Basic Client ##

```php
use Jumbojett\OpenIDConnectClient;

$oidc = new OpenIDConnectClient('https://id.provider.com',
                                'ClientIDHere',
                                'ClientSecretHere');
$oidc->setCertPath('/path/to/my.cert');
$oidc->authenticate();
$name = $oidc->requestUserInfo('given_name');

```

[See openid spec for available user attributes][1]

## Example 2: Dynamic Registration ##

```php
use Jumbojett\OpenIDConnectClient;

$oidc = new OpenIDConnectClient("https://id.provider.com");

$oidc->register();
$client_id = $oidc->getClientID();
$client_secret = $oidc->getClientSecret();

// Be sure to add logic to store the client id and client secret
```

## Example 3: Network and Security ##
```php
// Configure a proxy
$oidc->setHttpProxy("http://my.proxy.com:80/");

// Configure a cert
$oidc->setCertPath("/path/to/my.cert");
```

## Example 4: Request Client Credentials Token ##

```php
use Jumbojett\OpenIDConnectClient;

$oidc = new OpenIDConnectClient('https://id.provider.com',
                                'ClientIDHere',
                                'ClientSecretHere');
$oidc->providerConfigParam(array('token_endpoint'=>'https://id.provider.com/connect/token'));
$oidc->addScope('my_scope');

// this assumes success (to validate check if the access_token property is there and a valid JWT) :
$clientCredentialsToken = $oidc->requestClientCredentialsToken()->access_token;

```

## Example 5: Request Resource Owners Token (with client auth) ##

```php
use Jumbojett\OpenIDConnectClient;

$oidc = new OpenIDConnectClient('https://id.provider.com',
                                'ClientIDHere',
                                'ClientSecretHere');
$oidc->providerConfigParam(array('token_endpoint'=>'https://id.provider.com/connect/token'));
$oidc->addScope('my_scope');

//Add username and password
$oidc->addAuthParam(array('username'=>'<Username>'));
$oidc->addAuthParam(array('password'=>'<Password>'));

//Perform the auth and return the token (to validate check if the access_token property is there and a valid JWT) :
$token = $oidc->requestResourceOwnerToken(TRUE)->access_token;

```

## Example 6: Basic client for implicit flow e.g. with Azure AD B2C (see http://openid.net/specs/openid-connect-core-1_0.html#ImplicitFlowAuth) ##

```php
use Jumbojett\OpenIDConnectClient;

$oidc = new OpenIDConnectClient('https://id.provider.com',
                                'ClientIDHere',
                                'ClientSecretHere');
$oidc->setResponseTypes(array('id_token'));
$oidc->addScope(array('openid'));
$oidc->setAllowImplicitFlow(true);
$oidc->addAuthParam(array('response_mode' => 'form_post'));
$oidc->setCertPath('/path/to/my.cert');
$oidc->authenticate();
$sub = $oidc->getVerifiedClaims('sub');

```

## Example 7: Introspection of an access token (see https://tools.ietf.org/html/rfc7662) ##

```php
use Jumbojett\OpenIDConnectClient;

$oidc = new OpenIDConnectClient('https://id.provider.com',
                                'ClientIDHere',
                                'ClientSecretHere');
$data = $oidc->introspectToken('an.access-token.as.given');
if (!$data->active) {
    // the token is no longer usable
}

```

## Example 8: PKCE Client ##

```php
use Jumbojett\OpenIDConnectClient;

$oidc = new OpenIDConnectClient('https://id.provider.com',
                                'ClientIDHere',
                                null);
$oidc->setCodeChallengeMethod('S256');
$oidc->authenticate();
$name = $oidc->requestUserInfo('given_name');

```

## Example 9: Back-channel logout ##

Back-channel authentication assumes you can end a session on the server side on behalf of the user (without relying
on their browser). The request is a POST from the OP direct to your RP. In this way, the use of this library can
ensure your RP performs 'single sign out' for the user even if they didn't have your RP open in a browser or other
device, but still had an active session there.

Either the sid or the sub may be accessible from the logout token sent from the OP. You can use either
`getSidFromBackChannel()` or `getSubFromBackChannel()` to retrieve them if it is helpful to match them to a session
in order to destroy it.

The below ensures the use of this library to ensure validation of the back-channel logout token, but is afterward
just a hypothetical way of finding such a session and destroying it. Adjust it to the needs of your RP.

```php

function handleLogout() {
    // NOTE: assumes that $this->oidc is an instance of OpenIDConnectClient()
    if ($this->oidc->verifyLogoutToken()) {
        $sid = $this->oidc->getSidFromBackChannel();

        if (isset($sid)) {
            // Somehow find the session based on the $sid and
            // destroy it. This depends on your RP's design,
            // there is nothing in the OIDC spec to mandate how.
            //
            // In this example, we find a Redis key, which was
            // previously stored using the sid we obtained from
            // the access token after login.
            //
            // The value of the Redis key is that of the user's
            // session ID specific to this hypothetical RP app.
            //
            // We then switch to that session and destroy it.
            $this->redis->connect('127.0.0.1', 6379);
            $session_id_to_destroy = $this->redis->get($sid);
            if ($session_id_to_destroy) {
                session_commit();
                session_id($session_id_to_destroy); // switches to that session
                session_start();
                $_SESSION = array(); // effectively ends the session
            }
        }
    }
}

```

## Example 10: Enable Token Endpoint Auth Methods ##

By default, only `client_secret_basic` is enabled on client side which was the only supported for a long time.
Recently `client_secret_jwt` and `private_key_jwt` have been added, but they remain disabled until explicitly enabled.

```php
use Jumbojett\OpenIDConnectClient;

$oidc = new OpenIDConnectClient('https://id.provider.com',
                                'ClientIDHere',
                                null);
# enable 'client_secret_basic' and 'client_secret_jwt'                                
$oidc->setTokenEndpointAuthMethodsSupported(['client_secret_basic', 'client_secret_jwt']);

# for 'private_key_jwt' in addition also the generator function has to be set.
$oidc->setTokenEndpointAuthMethodsSupported(['private_key_jwt']);
$oidc->setPrivateKeyJwtGenerator(function(string $token_endpoint) {
    # TODO: what ever is necessary
})
```


## Development Environments ##
In some cases you may need to disable SSL security on your development systems.
Note: This is not recommended on production systems.

```php
$oidc->setVerifyHost(false);
$oidc->setVerifyPeer(false);
```

Also, your local system might not support HTTPS, so you might disable upgrading to it:

```php
$oidc->setHttpUpgradeInsecureRequests(false);
```

### Todo ###
- Dynamic registration does not support registration auth tokens and endpoints

  [1]: http://openid.net/specs/openid-connect-basic-1_0-15.html#id_res
  
## Contributing ###
 - All pull requests, once merged, should be added to the CHANGELOG.md file.
