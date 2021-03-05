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

/**
 * The "returnpolicyonline" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $returnpolicyonline = $contentService->returnpolicyonline;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_Returnpolicyonline extends Google_Service_Resource
{
  /**
   * Creates a new return policy. (returnpolicyonline.create)
   *
   * @param string $merchantId Required. The id of the merchant for which to
   * retrieve the return policy online object.
   * @param Google_Service_ShoppingContent_ReturnPolicyOnline $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_ReturnPolicyOnline
   */
  public function create($merchantId, Google_Service_ShoppingContent_ReturnPolicyOnline $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ShoppingContent_ReturnPolicyOnline");
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
  public function delete($merchantId, $returnPolicyId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'returnPolicyId' => $returnPolicyId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets an existing return policy. (returnpolicyonline.get)
   *
   * @param string $merchantId Required. The id of the merchant for which to
   * retrieve the return policy online object.
   * @param string $returnPolicyId Required. The id of the return policy to
   * retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_ReturnPolicyOnline
   */
  public function get($merchantId, $returnPolicyId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'returnPolicyId' => $returnPolicyId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ShoppingContent_ReturnPolicyOnline");
  }
  /**
   * Lists all existing return policies.
   * (returnpolicyonline.listReturnpolicyonline)
   *
   * @param string $merchantId Required. The id of the merchant for which to
   * retrieve the return policy online object.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_ListReturnPolicyOnlineResponse
   */
  public function listReturnpolicyonline($merchantId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ShoppingContent_ListReturnPolicyOnlineResponse");
  }
  /**
   * Updates an existing return policy. (returnpolicyonline.patch)
   *
   * @param string $merchantId Required. The id of the merchant for which to
   * retrieve the return policy online object.
   * @param string $returnPolicyId Required. The id of the return policy to
   * update.
   * @param Google_Service_ShoppingContent_ReturnPolicyOnline $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_ReturnPolicyOnline
   */
  public function patch($merchantId, $returnPolicyId, Google_Service_ShoppingContent_ReturnPolicyOnline $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'returnPolicyId' => $returnPolicyId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_ShoppingContent_ReturnPolicyOnline");
  }
}
