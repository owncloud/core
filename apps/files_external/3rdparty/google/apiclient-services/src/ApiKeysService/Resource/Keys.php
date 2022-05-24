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

namespace Google\Service\ApiKeysService\Resource;

use Google\Service\ApiKeysService\V2LookupKeyResponse;

/**
 * The "keys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apikeysService = new Google\Service\ApiKeysService(...);
 *   $keys = $apikeysService->keys;
 *  </code>
 */
class Keys extends \Google\Service\Resource
{
  /**
   * Find the parent project and resource name of the API key that matches the key
   * string in the request. If the API key has been purged, resource name will not
   * be set. The service account must have the `apikeys.keys.lookup` permission on
   * the parent project. (keys.lookupKey)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string keyString Required. Finds the project that owns the key
   * string value.
   * @return V2LookupKeyResponse
   */
  public function lookupKey($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('lookupKey', [$params], V2LookupKeyResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Keys::class, 'Google_Service_ApiKeysService_Resource_Keys');
