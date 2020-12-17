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
 * The "serviceAccounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $iamService = new Google_Service_Iam(...);
 *   $serviceAccounts = $iamService->serviceAccounts;
 *  </code>
 */
class Google_Service_Iam_Resource_ProjectsServiceAccounts extends Google_Service_Resource
{
  /**
   * Creates a ServiceAccount. (serviceAccounts.create)
   *
   * @param string $name Required. The resource name of the project associated
   * with the service accounts, such as `projects/my-project-123`.
   * @param Google_Service_Iam_CreateServiceAccountRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_ServiceAccount
   */
  public function create($name, Google_Service_Iam_CreateServiceAccountRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Iam_ServiceAccount");
  }
  /**
   * Deletes a ServiceAccount. **Warning:** After you delete a service account,
   * you might not be able to undelete it. If you know that you need to re-enable
   * the service account in the future, use DisableServiceAccount instead. If you
   * delete a service account, IAM permanently removes the service account 30 days
   * later. Google Cloud cannot recover the service account after it is
   * permanently removed, even if you file a support request. To help avoid
   * unplanned outages, we recommend that you disable the service account before
   * you delete it. Use DisableServiceAccount to disable the service account, then
   * wait at least 24 hours and watch for unintended consequences. If there are no
   * unintended consequences, you can delete the service account.
   * (serviceAccounts.delete)
   *
   * @param string $name Required. The resource name of the service account in the
   * following format: `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}`. Using
   * `-` as a wildcard for the `PROJECT_ID` will infer the project from the
   * account. The `ACCOUNT` value can be the `email` address or the `unique_id` of
   * the service account.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_IamEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Iam_IamEmpty");
  }
  /**
   * Disables a ServiceAccount immediately. If an application uses the service
   * account to authenticate, that application can no longer call Google APIs or
   * access Google Cloud resources. Existing access tokens for the service account
   * are rejected, and requests for new access tokens will fail. To re-enable the
   * service account, use EnableServiceAccount. After you re-enable the service
   * account, its existing access tokens will be accepted, and you can request new
   * access tokens. To help avoid unplanned outages, we recommend that you disable
   * the service account before you delete it. Use this method to disable the
   * service account, then wait at least 24 hours and watch for unintended
   * consequences. If there are no unintended consequences, you can delete the
   * service account with DeleteServiceAccount. (serviceAccounts.disable)
   *
   * @param string $name The resource name of the service account in the following
   * format: `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}`. Using `-` as a
   * wildcard for the `PROJECT_ID` will infer the project from the account. The
   * `ACCOUNT` value can be the `email` address or the `unique_id` of the service
   * account.
   * @param Google_Service_Iam_DisableServiceAccountRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_IamEmpty
   */
  public function disable($name, Google_Service_Iam_DisableServiceAccountRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('disable', array($params), "Google_Service_Iam_IamEmpty");
  }
  /**
   * Enables a ServiceAccount that was disabled by DisableServiceAccount. If the
   * service account is already enabled, then this method has no effect. If the
   * service account was disabled by other means—for example, if Google disabled
   * the service account because it was compromised—you cannot use this method to
   * enable the service account. (serviceAccounts.enable)
   *
   * @param string $name The resource name of the service account in the following
   * format: `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}`. Using `-` as a
   * wildcard for the `PROJECT_ID` will infer the project from the account. The
   * `ACCOUNT` value can be the `email` address or the `unique_id` of the service
   * account.
   * @param Google_Service_Iam_EnableServiceAccountRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_IamEmpty
   */
  public function enable($name, Google_Service_Iam_EnableServiceAccountRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('enable', array($params), "Google_Service_Iam_IamEmpty");
  }
  /**
   * Gets a ServiceAccount. (serviceAccounts.get)
   *
   * @param string $name Required. The resource name of the service account in the
   * following format: `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}`. Using
   * `-` as a wildcard for the `PROJECT_ID` will infer the project from the
   * account. The `ACCOUNT` value can be the `email` address or the `unique_id` of
   * the service account.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_ServiceAccount
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Iam_ServiceAccount");
  }
  /**
   * Gets the IAM policy that is attached to a ServiceAccount. This IAM policy
   * specifies which members have access to the service account. This method does
   * not tell you whether the service account has been granted any roles on other
   * resources. To check whether a service account has role grants on a resource,
   * use the `getIamPolicy` method for that resource. For example, to view the
   * role grants for a project, call the Resource Manager API's
   * [`projects.getIamPolicy`](https://cloud.google.com/resource-
   * manager/reference/rest/v1/projects/getIamPolicy) method.
   * (serviceAccounts.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The policy format
   * version to be returned. Valid values are 0, 1, and 3. Requests specifying an
   * invalid value will be rejected. Requests for policies with any conditional
   * bindings must specify version 3. Policies without any conditional bindings
   * may specify any valid value or leave the field unset. To learn which
   * resources support conditions in their IAM policies, see the [IAM
   * documentation](https://cloud.google.com/iam/help/conditions/resource-
   * policies).
   * @return Google_Service_Iam_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Iam_Policy");
  }
  /**
   * Lists every ServiceAccount that belongs to a specific project.
   * (serviceAccounts.listProjectsServiceAccounts)
   *
   * @param string $name Required. The resource name of the project associated
   * with the service accounts, such as `projects/my-project-123`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional limit on the number of service accounts to
   * include in the response. Further accounts can subsequently be obtained by
   * including the ListServiceAccountsResponse.next_page_token in a subsequent
   * request. The default is 20, and the maximum is 100.
   * @opt_param string pageToken Optional pagination token returned in an earlier
   * ListServiceAccountsResponse.next_page_token.
   * @return Google_Service_Iam_ListServiceAccountsResponse
   */
  public function listProjectsServiceAccounts($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Iam_ListServiceAccountsResponse");
  }
  /**
   * Patches a ServiceAccount. (serviceAccounts.patch)
   *
   * @param string $name The resource name of the service account. Use one of the
   * following formats: * `projects/{PROJECT_ID}/serviceAccounts/{EMAIL_ADDRESS}`
   * * `projects/{PROJECT_ID}/serviceAccounts/{UNIQUE_ID}` As an alternative, you
   * can use the `-` wildcard character instead of the project ID: *
   * `projects/-/serviceAccounts/{EMAIL_ADDRESS}` *
   * `projects/-/serviceAccounts/{UNIQUE_ID}` When possible, avoid using the `-`
   * wildcard character, because it can cause response messages to contain
   * misleading error codes. For example, if you try to get the service account
   * `projects/-/serviceAccounts/fake@example.com`, which does not exist, the
   * response contains an HTTP `403 Forbidden` error instead of a `404 Not Found`
   * error.
   * @param Google_Service_Iam_PatchServiceAccountRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_ServiceAccount
   */
  public function patch($name, Google_Service_Iam_PatchServiceAccountRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Iam_ServiceAccount");
  }
  /**
   * Sets the IAM policy that is attached to a ServiceAccount. Use this method to
   * grant or revoke access to the service account. For example, you could grant a
   * member the ability to impersonate the service account. This method does not
   * enable the service account to access other resources. To grant roles to a
   * service account on a resource, follow these steps: 1. Call the resource's
   * `getIamPolicy` method to get its current IAM policy. 2. Edit the policy so
   * that it binds the service account to an IAM role for the resource. 3. Call
   * the resource's `setIamPolicy` method to update its IAM policy. For detailed
   * instructions, see [Granting roles to a service account for specific
   * resources](https://cloud.google.com/iam/help/service-accounts/granting-
   * access-to-service-accounts). (serviceAccounts.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_Iam_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_Policy
   */
  public function setIamPolicy($resource, Google_Service_Iam_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Iam_Policy");
  }
  /**
   * **Note:** This method is deprecated and will stop working on July 1, 2021.
   * Use the [`signBlob`](https://cloud.google.com/iam/help/rest-
   * credentials/v1/projects.serviceAccounts/signBlob) method in the IAM Service
   * Account Credentials API instead. If you currently use this method, see the
   * [migration guide](https://cloud.google.com/iam/help/credentials/migrate-api)
   * for instructions. Signs a blob using the system-managed private key for a
   * ServiceAccount. (serviceAccounts.signBlob)
   *
   * @param string $name Required. Deprecated. [Migrate to Service Account
   * Credentials API](https://cloud.google.com/iam/help/credentials/migrate-api).
   * The resource name of the service account in the following format:
   * `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}`. Using `-` as a wildcard
   * for the `PROJECT_ID` will infer the project from the account. The `ACCOUNT`
   * value can be the `email` address or the `unique_id` of the service account.
   * @param Google_Service_Iam_SignBlobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_SignBlobResponse
   */
  public function signBlob($name, Google_Service_Iam_SignBlobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('signBlob', array($params), "Google_Service_Iam_SignBlobResponse");
  }
  /**
   * **Note:** This method is deprecated and will stop working on July 1, 2021.
   * Use the [`signJwt`](https://cloud.google.com/iam/help/rest-
   * credentials/v1/projects.serviceAccounts/signJwt) method in the IAM Service
   * Account Credentials API instead. If you currently use this method, see the
   * [migration guide](https://cloud.google.com/iam/help/credentials/migrate-api)
   * for instructions. Signs a JSON Web Token (JWT) using the system-managed
   * private key for a ServiceAccount. (serviceAccounts.signJwt)
   *
   * @param string $name Required. Deprecated. [Migrate to Service Account
   * Credentials API](https://cloud.google.com/iam/help/credentials/migrate-api).
   * The resource name of the service account in the following format:
   * `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}`. Using `-` as a wildcard
   * for the `PROJECT_ID` will infer the project from the account. The `ACCOUNT`
   * value can be the `email` address or the `unique_id` of the service account.
   * @param Google_Service_Iam_SignJwtRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_SignJwtResponse
   */
  public function signJwt($name, Google_Service_Iam_SignJwtRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('signJwt', array($params), "Google_Service_Iam_SignJwtResponse");
  }
  /**
   * Tests whether the caller has the specified permissions on a ServiceAccount.
   * (serviceAccounts.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_Iam_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_Iam_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Iam_TestIamPermissionsResponse");
  }
  /**
   * Restores a deleted ServiceAccount. **Important:** It is not always possible
   * to restore a deleted service account. Use this method only as a last resort.
   * After you delete a service account, IAM permanently removes the service
   * account 30 days later. There is no way to restore a deleted service account
   * that has been permanently removed. (serviceAccounts.undelete)
   *
   * @param string $name The resource name of the service account in the following
   * format: `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT_UNIQUE_ID}`. Using
   * `-` as a wildcard for the `PROJECT_ID` will infer the project from the
   * account.
   * @param Google_Service_Iam_UndeleteServiceAccountRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_UndeleteServiceAccountResponse
   */
  public function undelete($name, Google_Service_Iam_UndeleteServiceAccountRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params), "Google_Service_Iam_UndeleteServiceAccountResponse");
  }
  /**
   * **Note:** We are in the process of deprecating this method. Use
   * PatchServiceAccount instead. Updates a ServiceAccount. You can update only
   * the `display_name` and `description` fields. (serviceAccounts.update)
   *
   * @param string $name The resource name of the service account. Use one of the
   * following formats: * `projects/{PROJECT_ID}/serviceAccounts/{EMAIL_ADDRESS}`
   * * `projects/{PROJECT_ID}/serviceAccounts/{UNIQUE_ID}` As an alternative, you
   * can use the `-` wildcard character instead of the project ID: *
   * `projects/-/serviceAccounts/{EMAIL_ADDRESS}` *
   * `projects/-/serviceAccounts/{UNIQUE_ID}` When possible, avoid using the `-`
   * wildcard character, because it can cause response messages to contain
   * misleading error codes. For example, if you try to get the service account
   * `projects/-/serviceAccounts/fake@example.com`, which does not exist, the
   * response contains an HTTP `403 Forbidden` error instead of a `404 Not Found`
   * error.
   * @param Google_Service_Iam_ServiceAccount $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_ServiceAccount
   */
  public function update($name, Google_Service_Iam_ServiceAccount $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Iam_ServiceAccount");
  }
}
