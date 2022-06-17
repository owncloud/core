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
use Google\Service\AndroidManagement\ListEnrollmentTokensResponse;

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
   * Creates an enrollment token for a given enterprise. It's up to the caller's
   * responsibility to manage the lifecycle of newly created tokens and deleting
   * them when they're not intended to be used anymore. Once an enrollment token
   * has been created, it's not possible to retrieve the token's content anymore
   * using AM API. It is recommended for EMMs to securely store the token if it's
   * intended to be reused. (enrollmentTokens.create)
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
  /**
   * Gets an active, unexpired enrollment token. Only a partial view of
   * EnrollmentToken is returned: all the fields but name and expiration_timestamp
   * are empty. This method is meant to help manage active enrollment tokens
   * lifecycle. For security reasons, it's recommended to delete active enrollment
   * tokens as soon as they're not intended to be used anymore.
   * (enrollmentTokens.get)
   *
   * @param string $name Required. The name of the enrollment token in the form
   * enterprises/{enterpriseId}/enrollmentTokens/{enrollmentTokenId}.
   * @param array $optParams Optional parameters.
   * @return EnrollmentToken
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], EnrollmentToken::class);
  }
  /**
   * Lists active, unexpired enrollment tokens for a given enterprise. The list
   * items contain only a partial view of EnrollmentToken: all the fields but name
   * and expiration_timestamp are empty. This method is meant to help manage
   * active enrollment tokens lifecycle. For security reasons, it's recommended to
   * delete active enrollment tokens as soon as they're not intended to be used
   * anymore. (enrollmentTokens.listEnterprisesEnrollmentTokens)
   *
   * @param string $parent Required. The name of the enterprise in the form
   * enterprises/{enterpriseId}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The requested page size. The service may return fewer
   * than this value. If unspecified, at most 10 items will be returned. The
   * maximum value is 100; values above 100 will be coerced to 100.
   * @opt_param string pageToken A token identifying a page of results returned by
   * the server.
   * @return ListEnrollmentTokensResponse
   */
  public function listEnterprisesEnrollmentTokens($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListEnrollmentTokensResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterprisesEnrollmentTokens::class, 'Google_Service_AndroidManagement_Resource_EnterprisesEnrollmentTokens');
