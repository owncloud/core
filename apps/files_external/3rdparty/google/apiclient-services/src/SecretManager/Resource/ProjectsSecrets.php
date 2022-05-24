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

namespace Google\Service\SecretManager\Resource;

use Google\Service\SecretManager\AddSecretVersionRequest;
use Google\Service\SecretManager\ListSecretsResponse;
use Google\Service\SecretManager\Policy;
use Google\Service\SecretManager\Secret;
use Google\Service\SecretManager\SecretVersion;
use Google\Service\SecretManager\SecretmanagerEmpty;
use Google\Service\SecretManager\SetIamPolicyRequest;
use Google\Service\SecretManager\TestIamPermissionsRequest;
use Google\Service\SecretManager\TestIamPermissionsResponse;

/**
 * The "secrets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $secretmanagerService = new Google\Service\SecretManager(...);
 *   $secrets = $secretmanagerService->secrets;
 *  </code>
 */
class ProjectsSecrets extends \Google\Service\Resource
{
  /**
   * Creates a new SecretVersion containing secret data and attaches it to an
   * existing Secret. (secrets.addVersion)
   *
   * @param string $parent Required. The resource name of the Secret to associate
   * with the SecretVersion in the format `projects/secrets`.
   * @param AddSecretVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SecretVersion
   */
  public function addVersion($parent, AddSecretVersionRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addVersion', [$params], SecretVersion::class);
  }
  /**
   * Creates a new Secret containing no SecretVersions. (secrets.create)
   *
   * @param string $parent Required. The resource name of the project to associate
   * with the Secret, in the format `projects`.
   * @param Secret $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string secretId Required. This must be unique within the project.
   * A secret ID is a string with a maximum length of 255 characters and can
   * contain uppercase and lowercase letters, numerals, and the hyphen (`-`) and
   * underscore (`_`) characters.
   * @return Secret
   */
  public function create($parent, Secret $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Secret::class);
  }
  /**
   * Deletes a Secret. (secrets.delete)
   *
   * @param string $name Required. The resource name of the Secret to delete in
   * the format `projects/secrets`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string etag Optional. Etag of the Secret. The request succeeds if
   * it matches the etag of the currently stored secret object. If the etag is
   * omitted, the request succeeds.
   * @return SecretmanagerEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], SecretmanagerEmpty::class);
  }
  /**
   * Gets metadata for a given Secret. (secrets.get)
   *
   * @param string $name Required. The resource name of the Secret, in the format
   * `projects/secrets`.
   * @param array $optParams Optional parameters.
   * @return Secret
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Secret::class);
  }
  /**
   * Gets the access control policy for a secret. Returns empty policy if the
   * secret exists and does not have a policy set. (secrets.getIamPolicy)
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
   * Lists Secrets. (secrets.listProjectsSecrets)
   *
   * @param string $parent Required. The resource name of the project associated
   * with the Secrets, in the format `projects`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter string, adhering to the rules in
   * [List-operation filtering](https://cloud.google.com/secret-
   * manager/docs/filtering). List only secrets matching the filter. If filter is
   * empty, all secrets are listed.
   * @opt_param int pageSize Optional. The maximum number of results to be
   * returned in a single page. If set to 0, the server decides the number of
   * results to return. If the number is greater than 25000, it is capped at
   * 25000.
   * @opt_param string pageToken Optional. Pagination token, returned earlier via
   * ListSecretsResponse.next_page_token.
   * @return ListSecretsResponse
   */
  public function listProjectsSecrets($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSecretsResponse::class);
  }
  /**
   * Updates metadata of an existing Secret. (secrets.patch)
   *
   * @param string $name Output only. The resource name of the Secret in the
   * format `projects/secrets`.
   * @param Secret $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Specifies the fields to be updated.
   * @return Secret
   */
  public function patch($name, Secret $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Secret::class);
  }
  /**
   * Sets the access control policy on the specified secret. Replaces any existing
   * policy. Permissions on SecretVersions are enforced according to the policy
   * set on the associated Secret. (secrets.setIamPolicy)
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
   * Returns permissions that a caller has for the specified secret. If the secret
   * does not exist, this call returns an empty set of permissions, not a
   * NOT_FOUND error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (secrets.testIamPermissions)
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
class_alias(ProjectsSecrets::class, 'Google_Service_SecretManager_Resource_ProjectsSecrets');
