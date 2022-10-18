<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service;

use Google\Client;
use Google\Service\Oauth2\Tokeninfo;

/**
 * Service definition for Oauth2 (v2).
 *
 * <p>
 * Obtains end-user authorization grants for use with other Google APIs.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/identity/protocols/oauth2/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Oauth2 extends \Google\Service
{
  /** See your primary Google Account email address. */
  const USERINFO_EMAIL =
      "https://www.googleapis.com/auth/userinfo.email";
  /** See your personal info, including any personal info you've made publicly available. */
  const USERINFO_PROFILE =
      "https://www.googleapis.com/auth/userinfo.profile";
  /** Associate you with your personal info on Google. */
  const OPENID =
      "openid";

  public $userinfo;
  public $userinfo_v2_me;
  private $base_methods;
  /**
   * Constructs the internal representation of the Oauth2 service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://www.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch/oauth2/v2';
    $this->version = 'v2';
    $this->serviceName = 'oauth2';

    $this->userinfo = new Oauth2\Resource\Userinfo(
        $this,
        $this->serviceName,
        'userinfo',
        [
          'methods' => [
            'get' => [
              'path' => 'oauth2/v2/userinfo',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->userinfo_v2_me = new Oauth2\Resource\UserinfoV2Me(
        $this,
        $this->serviceName,
        'me',
        [
          'methods' => [
            'get' => [
              'path' => 'userinfo/v2/me',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->base_methods = new Resource(
        $this,
        $this->serviceName,
        '',
        [
          'methods' => [
            'tokeninfo' => [
              'path' => 'oauth2/v2/tokeninfo',
              'httpMethod' => 'POST',
              'parameters' => [
                'access_token' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'id_token' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
  }
  /**
   * (tokeninfo)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string access_token
   * @opt_param string id_token
   * @return Tokeninfo
   */
  public function tokeninfo($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->base_methods->call('tokeninfo', [$params], Tokeninfo::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Oauth2::class, 'Google_Service_Oauth2');
