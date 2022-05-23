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

namespace Google\Service\Cloudbilling\Resource;

use Google\Service\Cloudbilling\BillingAccount;
use Google\Service\Cloudbilling\ListBillingAccountsResponse;
use Google\Service\Cloudbilling\Policy;
use Google\Service\Cloudbilling\SetIamPolicyRequest;
use Google\Service\Cloudbilling\TestIamPermissionsRequest;
use Google\Service\Cloudbilling\TestIamPermissionsResponse;

/**
 * The "billingAccounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbillingService = new Google\Service\Cloudbilling(...);
 *   $billingAccounts = $cloudbillingService->billingAccounts;
 *  </code>
 */
class BillingAccounts extends \Google\Service\Resource
{
  /**
   * This method creates [billing
   * subaccounts](https://cloud.google.com/billing/docs/concepts#subaccounts).
   * Google Cloud resellers should use the Channel Services APIs, [accounts.custom
   * ers.create](https://cloud.google.com/channel/docs/reference/rest/v1/accounts.
   * customers/create) and [accounts.customers.entitlements.create](https://cloud.
   * google.com/channel/docs/reference/rest/v1/accounts.customers.entitlements/cre
   * ate). When creating a subaccount, the current authenticated user must have
   * the `billing.accounts.update` IAM permission on the parent account, which is
   * typically given to billing account
   * [administrators](https://cloud.google.com/billing/docs/how-to/billing-
   * access). This method will return an error if the parent account has not been
   * provisioned as a reseller account. (billingAccounts.create)
   *
   * @param BillingAccount $postBody
   * @param array $optParams Optional parameters.
   * @return BillingAccount
   */
  public function create(BillingAccount $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], BillingAccount::class);
  }
  /**
   * Gets information about a billing account. The current authenticated user must
   * be a [viewer of the billing account](https://cloud.google.com/billing/docs
   * /how-to/billing-access). (billingAccounts.get)
   *
   * @param string $name Required. The resource name of the billing account to
   * retrieve. For example, `billingAccounts/012345-567890-ABCDEF`.
   * @param array $optParams Optional parameters.
   * @return BillingAccount
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], BillingAccount::class);
  }
  /**
   * Gets the access control policy for a billing account. The caller must have
   * the `billing.accounts.getIamPolicy` permission on the account, which is often
   * given to billing account [viewers](https://cloud.google.com/billing/docs/how-
   * to/billing-access). (billingAccounts.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The maximum policy
   * version that will be used to format the policy. Valid values are 0, 1, and 3.
   * Requests specifying an invalid value will be rejected. Requests for policies
   * with any conditional role bindings must specify version 3. Policies with no
   * conditional role bindings may specify any valid value or leave the field
   * unset. The policy in the response might use the policy version that you
   * specified, or it might use a lower policy version. For example, if you
   * specify version 3, but the policy has no conditional role bindings, the
   * response uses version 1. To learn which resources support conditions in their
   * IAM policies, see the [IAM
   * documentation](https://cloud.google.com/iam/help/conditions/resource-
   * policies).
   * @return Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Lists the billing accounts that the current authenticated user has permission
   * to [view](https://cloud.google.com/billing/docs/how-to/billing-access).
   * (billingAccounts.listBillingAccounts)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Options for how to filter the returned billing
   * accounts. Currently this only supports filtering for
   * [subaccounts](https://cloud.google.com/billing/docs/concepts) under a single
   * provided reseller billing account. (e.g.
   * "master_billing_account=billingAccounts/012345-678901-ABCDEF"). Boolean
   * algebra and other fields are not currently supported.
   * @opt_param int pageSize Requested page size. The maximum page size is 100;
   * this is also the default.
   * @opt_param string pageToken A token identifying a page of results to return.
   * This should be a `next_page_token` value returned from a previous
   * `ListBillingAccounts` call. If unspecified, the first page of results is
   * returned.
   * @return ListBillingAccountsResponse
   */
  public function listBillingAccounts($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListBillingAccountsResponse::class);
  }
  /**
   * Updates a billing account's fields. Currently the only field that can be
   * edited is `display_name`. The current authenticated user must have the
   * `billing.accounts.update` IAM permission, which is typically given to the
   * [administrator](https://cloud.google.com/billing/docs/how-to/billing-access)
   * of the billing account. (billingAccounts.patch)
   *
   * @param string $name Required. The name of the billing account resource to be
   * updated.
   * @param BillingAccount $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask applied to the resource. Only
   * "display_name" is currently supported.
   * @return BillingAccount
   */
  public function patch($name, BillingAccount $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], BillingAccount::class);
  }
  /**
   * Sets the access control policy for a billing account. Replaces any existing
   * policy. The caller must have the `billing.accounts.setIamPolicy` permission
   * on the account, which is often given to billing account
   * [administrators](https://cloud.google.com/billing/docs/how-to/billing-
   * access). (billingAccounts.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($resource, SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Tests the access control policy for a billing account. This method takes the
   * resource and a set of permissions as input and returns the subset of the
   * input permissions that the caller is allowed for that resource.
   * (billingAccounts.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BillingAccounts::class, 'Google_Service_Cloudbilling_Resource_BillingAccounts');
