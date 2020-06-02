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
   * Creates a ServiceAccount and returns it. (serviceAccounts.create)
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
   * Deletes a ServiceAccount. (serviceAccounts.delete)
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
   * DisableServiceAccount is currently in the alpha launch stage.
   *
   * Disables a ServiceAccount, which immediately prevents the service account
   * from authenticating and gaining access to APIs.
   *
   * Disabled service accounts can be safely restored by using
   * EnableServiceAccount at any point. Deleted service accounts cannot be
   * restored using this method.
   *
   * Disabling a service account that is bound to VMs, Apps, Functions, or other
   * jobs will cause those jobs to lose access to resources if they are using the
   * disabled service account.
   *
   * Previously issued Access tokens for a service account will be rejected while
   * the service account is disabled but will start working again if the account
   * is re-enabled. Issuance of new tokens will fail while the account is
   * disabled.
   *
   * To improve reliability of your services and avoid unexpected outages, it is
   * recommended to first disable a service account rather than delete it. After
   * disabling the service account, wait at least 24 hours to verify there are no
   * unintended consequences, and then delete the service account.
   * (serviceAccounts.disable)
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
   * EnableServiceAccount is currently in the alpha launch stage.
   *
   *  Restores a disabled ServiceAccount  that has been manually disabled by using
   * DisableServiceAccount. Service  accounts that have been disabled by other
   * means or for other reasons,  such as abuse, cannot be restored using this
   * method.
   *
   *  EnableServiceAccount will have no effect on a service account that is  not
   * disabled.  Enabling an already enabled service account will have no  effect.
   * (serviceAccounts.enable)
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
   * Returns the Cloud IAM access control policy for a ServiceAccount.
   *
   * Note: Service accounts are both [resources and identities](/iam/docs/service-
   * accounts#service_account_permissions). This method treats the service account
   * as a resource. It returns the Cloud IAM policy that reflects what members
   * have access to the service account.
   *
   * This method does not return what resources the service account has access to.
   * To see if a service account has access to a resource, call the `getIamPolicy`
   * method on the target resource. For example, to view grants for a project,
   * call the [projects.getIamPolicy](/resource-
   * manager/reference/rest/v1/projects/getIamPolicy) method.
   * (serviceAccounts.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The policy format
   * version to be returned.
   *
   * Valid values are 0, 1, and 3. Requests specifying an invalid value will be
   * rejected.
   *
   * Requests for policies with any conditional bindings must specify version 3.
   * Policies without any conditional bindings may specify any valid value or
   * leave the field unset.
   *
   * To learn which resources support conditions in their IAM policies, see the
   * [IAM documentation](https://cloud.google.com/iam/help/conditions/resource-
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
   * Lists ServiceAccounts for a project.
   * (serviceAccounts.listProjectsServiceAccounts)
   *
   * @param string $name Required. The resource name of the project associated
   * with the service accounts, such as `projects/my-project-123`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Optional pagination token returned in an earlier
   * ListServiceAccountsResponse.next_page_token.
   * @opt_param int pageSize Optional limit on the number of service accounts to
   * include in the response. Further accounts can subsequently be obtained by
   * including the ListServiceAccountsResponse.next_page_token in a subsequent
   * request.
   * @return Google_Service_Iam_ListServiceAccountsResponse
   */
  public function listProjectsServiceAccounts($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Iam_ListServiceAccountsResponse");
  }
  /**
   * Patches a ServiceAccount.
   *
   * Currently, only the following fields are updatable: `display_name` and
   * `description`.
   *
   * Only fields specified in the request are guaranteed to be returned in the
   * response. Other fields in the response may be empty.
   *
   * Note: The field mask is required. (serviceAccounts.patch)
   *
   * @param string $name The resource name of the service account in the following
   * format: `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}`.
   *
   * Requests using `-` as a wildcard for the `PROJECT_ID` will infer the project
   * from the `account` and the `ACCOUNT` value can be the `email` address or the
   * `unique_id` of the service account.
   *
   * In responses the resource name will always be in the format
   * `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}`.
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
   * Sets the Cloud IAM access control policy for a ServiceAccount.
   *
   * Note: Service accounts are both [resources and identities](/iam/docs/service-
   * accounts#service_account_permissions). This method treats the service account
   * as a resource. Use it to grant members access to the service account, such as
   * when they need to impersonate it.
   *
   * This method does not grant the service account access to other resources,
   * such as projects. To grant a service account access to resources, include the
   * service account in the Cloud IAM policy for the desired resource, then call
   * the appropriate `setIamPolicy` method on the target resource. For example, to
   * grant a service account access to a project, call the [projects.setIamPolicy
   * ](/resource-manager/reference/rest/v1/projects/setIamPolicy) method.
   * (serviceAccounts.setIamPolicy)
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
   * **Note**: This method is in the process of being deprecated. Call the [`signB
   * lob()`](/iam/credentials/reference/rest/v1/projects.serviceAccounts/signBlob)
   * method of the Cloud IAM Service Account Credentials API instead.
   *
   * Signs a blob using a service account's system-managed private key.
   * (serviceAccounts.signBlob)
   *
   * @param string $name Required. The resource name of the service account in the
   * following format: `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}`. Using
   * `-` as a wildcard for the `PROJECT_ID` will infer the project from the
   * account. The `ACCOUNT` value can be the `email` address or the `unique_id` of
   * the service account.
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
   * **Note**: This method is in the process of being deprecated. Call the [`signJ
   * wt()`](/iam/credentials/reference/rest/v1/projects.serviceAccounts/signJwt)
   * method of the Cloud IAM Service Account Credentials API instead.
   *
   * Signs a JWT using a service account's system-managed private key.
   *
   * If no expiry time (`exp`) is provided in the `SignJwtRequest`, IAM sets an an
   * expiry time of one hour by default. If you request an expiry time of more
   * than one hour, the request will fail. (serviceAccounts.signJwt)
   *
   * @param string $name Required. The resource name of the service account in the
   * following format: `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}`. Using
   * `-` as a wildcard for the `PROJECT_ID` will infer the project from the
   * account. The `ACCOUNT` value can be the `email` address or the `unique_id` of
   * the service account.
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
   * Tests the specified permissions against the IAM access control policy for a
   * ServiceAccount. (serviceAccounts.testIamPermissions)
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
   * Restores a deleted ServiceAccount. This is to be used as an action of last
   * resort.  A service account may not always be restorable.
   * (serviceAccounts.undelete)
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
   * Note: This method is in the process of being deprecated. Use
   * PatchServiceAccount instead.
   *
   * Updates a ServiceAccount.
   *
   * Currently, only the following fields are updatable: `display_name` and
   * `description`. (serviceAccounts.update)
   *
   * @param string $name The resource name of the service account in the following
   * format: `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}`.
   *
   * Requests using `-` as a wildcard for the `PROJECT_ID` will infer the project
   * from the `account` and the `ACCOUNT` value can be the `email` address or the
   * `unique_id` of the service account.
   *
   * In responses the resource name will always be in the format
   * `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}`.
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
