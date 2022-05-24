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

namespace Google\Service\ShoppingContent\Resource;

use Google\Service\ShoppingContent\ListReturnPolicyOnlineResponse;
use Google\Service\ShoppingContent\ReturnPolicyOnline as ReturnPolicyOnlineModel;

/**
 * The "returnpolicyonline" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $returnpolicyonline = $contentService->returnpolicyonline;
 *  </code>
 */
class Returnpolicyonline extends \Google\Service\Resource
{
  /**
   * Creates a new return policy. (returnpolicyonline.create)
   *
   * @param string $merchantId Required. The id of the merchant for which to
   * retrieve the return policy online object.
   * @param ReturnPolicyOnlineModel $postBody
   * @param array $optParams Optional parameters.
   * @return ReturnPolicyOnlineModel
   */
  public function create($merchantId, ReturnPolicyOnlineModel $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ReturnPolicyOnlineModel::class);
  }
  /**
   * Deletes an existing return policy. (returnpolicyonline.delete)
   *
   * @param string $merchantId Required. The id of the merchant for which to
   * retrieve the return policy online object.
   * @param string $returnPolicyId Required. The id of the return policy to
   * delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($merchantId, $returnPolicyId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'returnPolicyId' => $returnPolicyId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets an existing return policy. (returnpolicyonline.get)
   *
   * @param string $merchantId Required. The id of the merchant for which to
   * retrieve the return policy online object.
   * @param string $returnPolicyId Required. The id of the return policy to
   * retrieve.
   * @param array $optParams Optional parameters.
   * @return ReturnPolicyOnlineModel
   */
  public function get($merchantId, $returnPolicyId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'returnPolicyId' => $returnPolicyId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ReturnPolicyOnlineModel::class);
  }
  /**
   * Lists all existing return policies.
   * (returnpolicyonline.listReturnpolicyonline)
   *
   * @param string $merchantId Required. The id of the merchant for which to
   * retrieve the return policy online object.
   * @param array $optParams Optional parameters.
   * @return ListReturnPolicyOnlineResponse
   */
  public function listReturnpolicyonline($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListReturnPolicyOnlineResponse::class);
  }
  /**
   * Updates an existing return policy. (returnpolicyonline.patch)
   *
   * @param string $merchantId Required. The id of the merchant for which to
   * retrieve the return policy online object.
   * @param string $returnPolicyId Required. The id of the return policy to
   * update.
   * @param ReturnPolicyOnlineModel $postBody
   * @param array $optParams Optional parameters.
   * @return ReturnPolicyOnlineModel
   */
  public function patch($merchantId, $returnPolicyId, ReturnPolicyOnlineModel $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'returnPolicyId' => $returnPolicyId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ReturnPolicyOnlineModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Returnpolicyonline::class, 'Google_Service_ShoppingContent_Resource_Returnpolicyonline');
