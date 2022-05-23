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

namespace Google\Service\Iam\Resource;

use Google\Service\Iam\CreateServiceAccountRequest;
use Google\Service\Iam\DisableServiceAccountRequest;
use Google\Service\Iam\EnableServiceAccountRequest;
use Google\Service\Iam\IamEmpty;
use Google\Service\Iam\ListServiceAccountsResponse;
use Google\Service\Iam\PatchServiceAccountRequest;
use Google\Service\Iam\Policy;
use Google\Service\Iam\ServiceAccount;
use Google\Service\Iam\SetIamPolicyRequest;
use Google\Service\Iam\SignBlobRequest;
use Google\Service\Iam\SignBlobResponse;
use Google\Service\Iam\SignJwtRequest;
use Google\Service\Iam\SignJwtResponse;
use Google\Service\Iam\TestIamPermissionsRequest;
use Google\Service\Iam\TestIamPermissionsResponse;
use Google\Service\Iam\UndeleteServiceAccountRequest;
use Google\Service\Iam\UndeleteServiceAccountResponse;

/**
 * The "serviceAccounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $iamService = new Google\Service\Iam(...);
 *   $serviceAccounts = $iamService->serviceAccounts;
 *  </code>
 */
class ProjectsServiceAccounts extends \Google\Service\Resource
{
  /**
   * Creates a ServiceAccount. (serviceAccounts.create)
   *
   * @param string $name Required. The resource name of the project associated
   * with the service accounts, such as `projects/my-project-123`.
   * @param CreateServiceAccountRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ServiceAccount
   */
  public function create($name, CreateServiceAccountRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ServiceAccount::class);
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
   * @return IamEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], IamEmpty::class);
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
   * @param DisableServiceAccountRequest $postBody
   * @param array $optParams Optional parameters.
   * @return IamEmpty
   */
  public function disable($name, DisableServiceAccountRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('disable', [$params], IamEmpty::class);
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
   * @param EnableServiceAccountRequest $postBody
   * @param array $optParams Optional parameters.
   * @return IamEmpty
   */
  public function enable($name, EnableServiceAccountRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('enable', [$params], IamEmpty::class);
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
   * @return ServiceAccount
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ServiceAccount::class);
  }
  /**
   * Gets the IAM policy that is attached to a ServiceAccount. This IAM policy
   * specifies which principals have access to the service account. This method
   * does not tell you whether the service account has been granted any roles on
   * other resources. To check whether a service account has role grants on a
   * resource, use the `getIamPolicy` method for that resource. For example, to
   * view the role grants for a project, call the Resource Manager API's
   * [`projects.getIamPolicy`](https://cloud.google.com/resource-
   * manager/reference/rest/v1/projects/getIamPolicy) method.
   * (serviceAccounts.getIamPolicy)
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
   * @return ListServiceAccountsResponse
   */
  public function listProjectsServiceAccounts($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListServiceAccountsResponse::class);
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
   * @param PatchServiceAccountRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ServiceAccount
   */
  public function patch($name, PatchServiceAccountRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ServiceAccount::class);
  }
  /**
   * Sets the IAM policy that is attached to a ServiceAccount. Use this method to
   * grant or revoke access to the service account. For example, you could grant a
   * principal the ability to impersonate the service account. This method does
   * not enable the service account to access other resources. To grant roles to a
   * service account on a resource, follow these steps: 1. Call the resource's
   * `getIamPolicy` method to get its current IAM policy. 2. Edit the policy so
   * that it binds the service account to an IAM role for the resource. 3. Call
   * the resource's `setIamPolicy` method to update its IAM policy. For detailed
   * instructions, see [Manage access to project, folders, and
   * organizations](https://cloud.google.com/iam/help/service-accounts/granting-
   * access-to-service-accounts) or [Manage access to other
   * resources](https://cloud.google.com/iam/help/access/manage-other-resources).
   * (serviceAccounts.setIamPolicy)
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
   * **Note:** This method is deprecated. Use the
   * [`signBlob`](https://cloud.google.com/iam/help/rest-
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
   * @param SignBlobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SignBlobResponse
   */
  public function signBlob($name, SignBlobRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('signBlob', [$params], SignBlobResponse::class);
  }
  /**
   * **Note:** This method is deprecated. Use the
   * [`signJwt`](https://cloud.google.com/iam/help/rest-
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
   * @param SignJwtRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SignJwtResponse
   */
  public function signJwt($name, SignJwtRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('signJwt', [$params], SignJwtResponse::class);
  }
  /**
   * Tests whether the caller has the specified permissions on a ServiceAccount.
   * (serviceAccounts.testIamPermissions)
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
   * @param UndeleteServiceAccountRequest $postBody
   * @param array $optParams Optional parameters.
   * @return UndeleteServiceAccountResponse
   */
  public function undelete($name, UndeleteServiceAccountRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('undelete', [$params], UndeleteServiceAccountResponse::class);
  }
  /**
   * **Note:** We are in the process of deprecating this method. Use
   * PatchServiceAccount instead. Updates a ServiceAccount. You can update only
   * the `display_name` field. (serviceAccounts.update)
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
   * @param ServiceAccount $postBody
   * @param array $optParams Optional parameters.
   * @return ServiceAccount
   */
  public function update($name, ServiceAccount $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], ServiceAccount::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsServiceAccounts::class, 'Google_Service_Iam_Resource_ProjectsServiceAccounts');
