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
 * The "labels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $labels = $contentService->labels;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_AccountsLabels extends Google_Service_Resource
{
  /**
   * Creates a new label, not assigned to any account. (labels.create)
   *
   * @param string $accountId Required. The id of the account this label belongs
   * to.
   * @param Google_Service_ShoppingContent_AccountLabel $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_AccountLabel
   */
  public function create($accountId, Google_Service_ShoppingContent_AccountLabel $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ShoppingContent_AccountLabel");
  }
  /**
   * Deletes a label and removes it from all accounts to which it was assigned.
   * (labels.delete)
   *
   * @param string $accountId Required. The id of the account that owns the label.
   * @param string $labelId Required. The id of the label to delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($accountId, $labelId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'labelId' => $labelId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Lists the labels assigned to an account. (labels.listAccountsLabels)
   *
   * @param string $accountId Required. The account id for whose labels are to be
   * listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A page token, received from a previous
   * `ListAccountLabels` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListAccountLabels` must match
   * the call that provided the page token.
   * @opt_param int pageSize The maximum number of labels to return. The service
   * may return fewer than this value. If unspecified, at most 50 labels will be
   * returned. The maximum value is 1000; values above 1000 will be coerced to
   * 1000.
   * @return Google_Service_ShoppingContent_ListAccountLabelsResponse
   */
  public function listAccountsLabels($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ShoppingContent_ListAccountLabelsResponse");
  }
  /**
   * Updates a label. (labels.patch)
   *
   * @param string $accountId Required. The id of the account this label belongs
   * to.
   * @param string $labelId Required. The id of the label to update.
   * @param Google_Service_ShoppingContent_AccountLabel $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_AccountLabel
   */
  public function patch($accountId, $labelId, Google_Service_ShoppingContent_AccountLabel $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'labelId' => $labelId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_ShoppingContent_AccountLabel");
  }
}
