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
 * The "budgets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $billingbudgetsService = new Google_Service_CloudBillingBudget(...);
 *   $budgets = $billingbudgetsService->budgets;
 *  </code>
 */
class Google_Service_CloudBillingBudget_Resource_BillingAccountsBudgets extends Google_Service_Resource
{
  /**
   * Creates a new budget. See [Quotas and
   * limits](https://cloud.google.com/billing/quotas) for more information on the
   * limits of the number of budgets you can create. (budgets.create)
   *
   * @param string $parent Required. The name of the billing account to create the
   * budget in. Values are of the form `billingAccounts/{billingAccountId}`.
   * @param Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1Budget $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1Budget
   */
  public function create($parent, Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1Budget $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1Budget");
  }
  /**
   * Deletes a budget. Returns successfully if already deleted. (budgets.delete)
   *
   * @param string $name Required. Name of the budget to delete. Values are of the
   * form `billingAccounts/{billingAccountId}/budgets/{budgetId}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudBillingBudget_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudBillingBudget_GoogleProtobufEmpty");
  }
  /**
   * Returns a budget. WARNING: There are some fields exposed on the Google Cloud
   * Console that aren't available on this API. When reading from the API, you
   * will not see these fields in the return value, though they may have been set
   * in the Cloud Console. (budgets.get)
   *
   * @param string $name Required. Name of budget to get. Values are of the form
   * `billingAccounts/{billingAccountId}/budgets/{budgetId}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1Budget
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1Budget");
  }
  /**
   * Returns a list of budgets for a billing account. WARNING: There are some
   * fields exposed on the Google Cloud Console that aren't available on this API.
   * When reading from the API, you will not see these fields in the return value,
   * though they may have been set in the Cloud Console.
   * (budgets.listBillingAccountsBudgets)
   *
   * @param string $parent Required. Name of billing account to list budgets
   * under. Values are of the form `billingAccounts/{billingAccountId}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of budgets to return per
   * page. The default and maximum value are 100.
   * @opt_param string pageToken Optional. The value returned by the last
   * `ListBudgetsResponse` which indicates that this is a continuation of a prior
   * `ListBudgets` call, and that the system should return the next page of data.
   * @return Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1ListBudgetsResponse
   */
  public function listBillingAccountsBudgets($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1ListBudgetsResponse");
  }
  /**
   * Updates a budget and returns the updated budget. WARNING: There are some
   * fields exposed on the Google Cloud Console that aren't available on this API.
   * Budget fields that are not exposed in this API will not be changed by this
   * method. (budgets.patch)
   *
   * @param string $name Output only. Resource name of the budget. The resource
   * name implies the scope of a budget. Values are of the form
   * `billingAccounts/{billingAccountId}/budgets/{budgetId}`.
   * @param Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1Budget $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. Indicates which fields in the provided
   * budget to update. Read-only fields (such as `name`) cannot be changed. If
   * this is not provided, then only fields with non-default values from the
   * request are updated. See https://developers.google.com/protocol-
   * buffers/docs/proto3#default for more details about default values.
   * @return Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1Budget
   */
  public function patch($name, Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1Budget $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1Budget");
  }
}
