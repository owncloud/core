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

namespace Google\Service\AndroidManagement\Resource;

use Google\Service\AndroidManagement\AndroidmanagementEmpty;
use Google\Service\AndroidManagement\EnrollmentToken;

/**
 * The "enrollmentTokens" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidmanagementService = new Google\Service\AndroidManagement(...);
 *   $enrollmentTokens = $androidmanagementService->enrollmentTokens;
 *  </code>
 */
class EnterprisesEnrollmentTokens extends \Google\Service\Resource
{
  /**
   * Creates an enrollment token for a given enterprise. (enrollmentTokens.create)
   *
   * @param string $parent The name of the enterprise in the form
   * enterprises/{enterpriseId}.
   * @param EnrollmentToken $postBody
   * @param array $optParams Optional parameters.
   * @return EnrollmentToken
   */
  public function create($parent, EnrollmentToken $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], EnrollmentToken::class);
  }
  /**
   * Deletes an enrollment token. This operation invalidates the token, preventing
   * its future use. (enrollmentTokens.delete)
   *
   * @param string $name The name of the enrollment token in the form
   * enterprises/{enterpriseId}/enrollmentTokens/{enrollmentTokenId}.
   * @param array $optParams Optional parameters.
   * @return AndroidmanagementEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], AndroidmanagementEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterprisesEnrollmentTokens::class, 'Google_Service_AndroidManagement_Resource_EnterprisesEnrollmentTokens');
