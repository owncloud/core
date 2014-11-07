<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud;

use OpenCloud\Common\Constants\Header;
use OpenCloud\Common\Constants\Mime;
use OpenCloud\Common\Http\Client;
use OpenCloud\Common\Http\Message\RequestSubscriber;
use OpenCloud\Common\Lang;
use OpenCloud\Common\Exceptions;
use OpenCloud\Common\Service\ServiceBuilder;
use OpenCloud\Common\Service\Catalog;
use OpenCloud\Common\Http\Message\Formatter;
use OpenCloud\Identity\Service as IdentityService;
use OpenCloud\Identity\Resource\Token;
use OpenCloud\Identity\Resource\Tenant;
use OpenCloud\Identity\Resource\User;
use Guzzle\Http\Url;

define('RACKSPACE_US', 'https://identity.api.rackspacecloud.com/v2.0/');
define('RACKSPACE_UK', 'https://lon.identity.api.rackspacecloud.com/v2.0/');

/**
 * The main client of the library. This object is the central point of negotiation between your application and the
 * API because it handles all of the HTTP transactions required to perform operations. It also manages the services
 * for your application through convenient factory methods.
 */
class OpenStack extends Client
{
    /**
     * @var array Credentials passed in by the user
     */
    private $secret = array();

    /**
     * @var string The token produced by the API
     */
    private $token;

    /**
     * @var string The unique identifier for who's accessing the API
     */
    private $tenant;

    /**
     * @var \OpenCloud\Common\Service\Catalog The catalog of services which are provided by the API
     */
    private $catalog;

    /**
     * @var \OpenCloud\Common\Log\LoggerInterface The object responsible for logging output
     */
    private $logger;

    /**
     * @var string The endpoint URL used for authentication
     */
    private $authUrl;

    /**
     * @var \OpenCloud\Identity\Resource\User
     */
    private $user;

    public function __construct($url, array $secret, array $options = array())
    {
        $this->getLogger()->info(Lang::translate('Initializing OpenStack client'));

        $this->setSecret($secret);
        $this->setAuthUrl($url);

        parent::__construct($url, $options);
        
        $this->addSubscriber(RequestSubscriber::getInstance());
        $this->setDefaultOption('headers/Accept', 'application/json');
    }
        
    /**
     * Set the credentials for the client
     *
     * @param array $secret
     * @return $this
     */
    public function setSecret(array $secret = array())
    {
        $this->secret = $secret;
        
        return $this;
    }
    
    /**
     * Get the secret.
     * 
     * @return array
     */
    public function getSecret()
    {
        return $this->secret;
    }
    
    /**
     * Set the token. If a string is passed in, the SDK assumes you want to set the ID of the full Token object
     * and sets this property accordingly. For any other data type, it assumes you want to populate the Token object.
     * This ambiguity arises due to backwards compatibility.
     * 
     * @param  string $token
     * @return $this
     */
    public function setToken($token)
    {
        $identity = IdentityService::factory($this);

        if (is_string($token)) {

            if (!$this->token) {
                $this->setTokenObject($identity->resource('Token'));
            }
            $this->token->setId($token);

        } else {
            $this->setTokenObject($identity->resource('Token', $token));
        }

        return $this;
    }

    /**
     * Get the token ID for this client.
     *
     * @return string
     */
    public function getToken()
    {
        return ($this->getTokenObject()) ? $this->getTokenObject()->getId() : null;
    }

    /**
     * Set the full toke object
     */
    public function setTokenObject(Token $token)
    {
        $this->token = $token;
    }

    /**
     * Get the full token object.
     */
    public function getTokenObject()
    {
        return $this->token;
    }
    
    /**
     * @deprecated
     */
    public function setExpiration($expiration)
    {
        $this->getLogger()->deprecated(__METHOD__, '::getTokenObject()->setExpires()');
        if ($this->getTokenObject()) {
            $this->getTokenObject()->setExpires($expiration);
        }
        return $this;
    }
    
    /**
     * @deprecated
     */
    public function getExpiration()
    {
        $this->getLogger()->deprecated(__METHOD__, '::getTokenObject()->getExpires()');
        if ($this->getTokenObject()) {
            return $this->getTokenObject()->getExpires();
        }
    }
    
    /**
     * Set the tenant. If an integer is passed in, the SDK assumes you want to set the ID of the full Tenant object
     * and sets this property accordingly. For any other data type, it assumes you want to populate the Tenant object.
     * This ambiguity arises due to backwards compatibility.
     * 
     * @param  string $tenant
     * @return $this
     */
    public function setTenant($tenant)
    {
        $identity = IdentityService::factory($this);

        if (is_numeric($tenant)) {

            if (!$this->tenant) {
                $this->setTenantObject($identity->resource('Tenant'));
            }
            $this->tenant->setId($tenant);

        } else {
            $this->setTenantObject($identity->resource('Tenant', $tenant));
        }
       
        return $this;
    }
    
    /**
     * Returns the tenant ID only (backwards compatibility).
     * 
     * @return string
     */
    public function getTenant()
    {
        return ($this->getTenantObject()) ? $this->getTenantObject()->getId() : null;
    }

    /**
     * Set the full Tenant object for this client.
     *
     * @param OpenCloud\Identity\Resource\Tenant $tenant
     */
    public function setTenantObject(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    /**
     * Get the full Tenant object for this client.
     *
     * @return OpenCloud\Identity\Resource\Tenant
     */
    public function getTenantObject()
    {
        return $this->tenant;
    }
    
    /**
     * Set the service catalog.
     * 
     * @param  mixed $catalog
     * @return $this
     */
    public function setCatalog($catalog)
    {
        $this->catalog = Catalog::factory($catalog);

        return $this;
    }
    
    /**
     * Get the service catalog.
     * 
     * @return array
     */
    public function getCatalog()
    {
        return $this->catalog;
    }

    /**
     * @param Common\Log\LoggerInterface $logger
     * @return $this
     */
    public function setLogger(Common\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * @return Common\Log\LoggerInterface
     */
    public function getLogger()
    {
        if (null === $this->logger) {
            $this->setLogger(new Common\Log\Logger);
        }
        return $this->logger;
    }
    
    /**
     * @deprecated
     */
    public function hasExpired()
    {
        $this->getLogger()->deprecated(__METHOD__, 'getTokenObject()->hasExpired()');
        return $this->getTokenObject() && $this->getTokenObject()->hasExpired();
    }

    /**
     * Formats the credentials array (as a string) for authentication
     *
     * @return string
     * @throws Common\Exceptions\CredentialError
     */
    public function getCredentials()
    {
        if (!empty($this->secret['username']) && !empty($this->secret['password'])) {

            $credentials = array('auth' => array(
                'passwordCredentials' => array(
                    'username' => $this->secret['username'],
                    'password' => $this->secret['password']
                )
            ));

            if (!empty($this->secret['tenantName'])) {
                $credentials['auth']['tenantName'] = $this->secret['tenantName'];
            } elseif (!empty($this->secret['tenantId'])) {
                $credentials['auth']['tenantId'] = $this->secret['tenantId'];
            }

            return json_encode($credentials);

        } else {
            throw new Exceptions\CredentialError(
               Lang::translate('Unrecognized credential secret')
            );
        }
    }

    /**
     * @param $url
     * @return $this
     */
    public function setAuthUrl($url)
    {
	    $this->authUrl = Url::factory($url);
	    return $this;
    }

    /**
     * @return Url
     */
    public function getAuthUrl()
    {
	    return $this->authUrl;
    }

    /**
     * Sets the current user based on the generated token.
     *
     * @param $data Object of user data
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return \OpenCloud\Identity\Resource\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Authenticate the tenant using the supplied credentials
     *
     * @return void
     * @throws AuthenticationError
     */
    public function authenticate()
    {
        $identity = IdentityService::factory($this);
        $response = $identity->generateToken($this->getCredentials());

        $body = Formatter::decode($response);

        $this->setCatalog($body->access->serviceCatalog);
        $this->setTokenObject($identity->resource('Token', $body->access->token));
        $this->setUser($identity->resource('User', $body->access->user));

        if (isset($body->access->token->tenant)) {
            $this->setTenantObject($identity->resource('Tenant', $body->access->token->tenant));
        }

        // Set X-Auth-Token HTTP request header
        $this->updateTokenHeader();
    }

    /**
     * @deprecated
     */
    public function getUrl()
    {
        return $this->getBaseUrl();
    }

    /**
     * Convenience method for exporting current credentials. Useful for local caching.
     * @return array
     */
    public function exportCredentials()
    {
        if ($this->hasExpired()) {
            $this->authenticate();
        }
        return array(
            'token'      => $this->getToken(),
            'expiration' => $this->getExpiration(),
            'tenant'     => $this->getTenant(),
            'catalog'    => $this->getCatalog()
        );
    }

    /**
     * Convenience method for importing credentials. Useful for local caching because it reduces HTTP traffic.
     *
     * @param array $values
     */
    public function importCredentials(array $values)
    {
        if (!empty($values['token'])) {
            $this->setToken($values['token']);
            $this->updateTokenHeader();
        }
        if (!empty($values['expiration'])) {
            $this->setExpiration($values['expiration']);
        }
        if (!empty($values['tenant'])) {
            $this->setTenant($values['tenant']);
        }
        if (!empty($values['catalog'])) {
            $this->setCatalog($values['catalog']);
        }
    }

    /**
     * Sets the X-Auth-Token header. If no value is explicitly passed in, the current token is used.
     *
     * @param  string $token Optional value of token.
     * @return void
     */
    private function updateTokenHeader($token = null)
    {
        $token = $token ?: $this->getToken();
        $this->setDefaultOption('headers/X-Auth-Token', (string) $token);
    }

    /**
     * Creates a new ObjectStore object (Swift/Cloud Files)
     *
     * @param string $name    The name of the service as it appears in the Catalog
     * @param string $region  The region (DFW, IAD, ORD, LON, SYD)
     * @param string $urltype The URL type ("publicURL" or "internalURL")
     * @return \OpenCloud\ObjectStore\Service
     */
    public function objectStoreService($name = null, $region = null, $urltype = null)
    {
        return ServiceBuilder::factory($this, 'OpenCloud\ObjectStore\Service', array(
            'name'    => $name, 
            'region'  => $region, 
            'urlType' => $urltype
        ));
    }

    /**
     * Creates a new Compute object (Nova/Cloud Servers)
     *
     * @param string $name    The name of the service as it appears in the Catalog
     * @param string $region  The region (DFW, IAD, ORD, LON, SYD)
     * @param string $urltype The URL type ("publicURL" or "internalURL")
     * @return \OpenCloud\Compute\Service
     */
    public function computeService($name = null, $region = null, $urltype = null)
    {
        return ServiceBuilder::factory($this, 'OpenCloud\Compute\Service', array(
            'name'    => $name, 
            'region'  => $region, 
            'urlType' => $urltype
        ));
    }

    /**
     * Creates a new Orchestration (Heat) service object
     *
     * @param string $name    The name of the service as it appears in the Catalog
     * @param string $region  The region (DFW, IAD, ORD, LON, SYD)
     * @param string $urltype The URL type ("publicURL" or "internalURL")
     * @return \OpenCloud\Orchestration\Service
     * @codeCoverageIgnore
     */
    public function orchestrationService($name = null, $region = null, $urltype = null)
    {
        return ServiceBuilder::factory($this, 'OpenCloud\Orchestration\Service', array(
            'name'    => $name, 
            'region'  => $region, 
            'urlType' => $urltype
        ));
    }

    /**
     * Creates a new Volume (Cinder) service object
     *
     * @param string $name    The name of the service as it appears in the Catalog
     * @param string $region  The region (DFW, IAD, ORD, LON, SYD)
     * @param string $urltype The URL type ("publicURL" or "internalURL")
     * @return \OpenCloud\Volume\Service
     */
    public function volumeService($name = null, $region = null, $urltype = null)
    {
        return ServiceBuilder::factory($this, 'OpenCloud\Volume\Service', array(
            'name'    => $name, 
            'region'  => $region, 
            'urlType' => $urltype
        ));
    }

    /**
     * Creates a new Rackspace "Cloud Identity" service.
     *
     * @return \OpenCloud\Identity\Service
     */
    public function identityService()
    {
        $service = IdentityService::factory($this);
        $this->authenticate();
        return $service;
    }
}