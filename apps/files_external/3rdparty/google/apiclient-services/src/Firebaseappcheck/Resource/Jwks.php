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

namespace Google\Service\Firebaseappcheck\Resource;

use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaPublicJwkSet;

/**
 * The "jwks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseappcheckService = new Google\Service\Firebaseappcheck(...);
 *   $jwks = $firebaseappcheckService->jwks;
 *  </code>
 */
class Jwks extends \Google\Service\Resource
{
  /**
   * Returns a public JWK set as specified by [RFC
   * 7517](https://tools.ietf.org/html/rfc7517) that can be used to verify App
   * Check tokens. Exactly one of the public keys in the returned set will
   * successfully validate any App Check token that is currently valid. (jwks.get)
   *
   * @param string $name Required. The relative resource name to the public JWK
   * set. Must always be exactly the string `jwks`.
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1betaPublicJwkSet
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleFirebaseAppcheckV1betaPublicJwkSet::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Jwks::class, 'Google_Service_Firebaseappcheck_Resource_Jwks');
