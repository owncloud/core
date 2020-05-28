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
 * The "secrets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $secretmanagerService = new Google_Service_SecretManager(...);
 *   $secrets = $secretmanagerService->secrets;
 *  </code>
 */
class Google_Service_SecretManager_Resource_ProjectsSecrets extends Google_Service_Resource
{
  /**
   * Creates a new SecretVersion containing secret data and attaches it to an
   * existing Secret. (secrets.addVersion)
   *
   * @param string $parent Required. The resource name of the Secret to associate
   * with the SecretVersion in the format `projects/secrets`.
   * @param Google_Service_SecretManager_AddSecretVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecretManager_SecretVersion
   */
  public function addVersion($parent, Google_Service_SecretManager_AddSecretVersionRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addVersion', array($params), "Google_Service_SecretManager_SecretVersion");
  }
  /**
   * Creates a new Secret containing no SecretVersions. (secrets.create)
   *
   * @param string $parent Required. The resource name of the project to associate
   * with the Secret, in the format `projects`.
   * @param Google_Service_SecretManager_Secret $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string secretId Required. This must be unique within the project.
   *
   * A secret ID is a string with a maximum length of 255 characters and can
   * contain uppercase and lowercase letters, numerals, and the hyphen (`-`) and
   * underscore (`_`) characters.
   * @return Google_Service_SecretManager_Secret
   */
  public function create($parent, Google_Service_SecretManager_Secret $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_SecretManager_Secret");
  }
  /**
   * Deletes a Secret. (secrets.delete)
   *
   * @param string $name Required. The resource name of the Secret to delete in
   * the format `projects/secrets`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecretManager_SecretmanagerEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_SecretManager_SecretmanagerEmpty");
  }
  /**
   * Gets metadata for a given Secret. (secrets.get)
   *
   * @param string $name Required. The resource name of the Secret, in the format
   * `projects/secrets`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecretManager_Secret
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_SecretManager_Secret");
  }
  /**
   * Gets the access control policy for a secret. Returns empty policy if the
   * secret exists and does not have a policy set. (secrets.getIamPolicy)
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
   * @return Google_Service_SecretManager_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_SecretManager_Policy");
  }
  /**
   * Lists Secrets. (secrets.listProjectsSecrets)
   *
   * @param string $parent Required. The resource name of the project associated
   * with the Secrets, in the format `projects`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Optional. Pagination token, returned earlier via
   * ListSecretsResponse.next_page_token.
   * @opt_param int pageSize Optional. The maximum number of results to be
   * returned in a single page. If set to 0, the server decides the number of
   * results to return. If the number is greater than 25000, it is capped at
   * 25000.
   * @return Google_Service_SecretManager_ListSecretsResponse
   */
  public function listProjectsSecrets($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SecretManager_ListSecretsResponse");
  }
  /**
   * Updates metadata of an existing Secret. (secrets.patch)
   *
   * @param string $name Output only. The resource name of the Secret in the
   * format `projects/secrets`.
   * @param Google_Service_SecretManager_Secret $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Specifies the fields to be updated.
   * @return Google_Service_SecretManager_Secret
   */
  public function patch($name, Google_Service_SecretManager_Secret $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_SecretManager_Secret");
  }
  /**
   * Sets the access control policy on the specified secret. Replaces any existing
   * policy.
   *
   * Permissions on SecretVersions are enforced according to the policy set on the
   * associated Secret. (secrets.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_SecretManager_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecretManager_Policy
   */
  public function setIamPolicy($resource, Google_Service_SecretManager_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_SecretManager_Policy");
  }
  /**
   * Returns permissions that a caller has for the specified secret. If the secret
   * does not exist, this call returns an empty set of permissions, not a
   * NOT_FOUND error.
   *
   * Note: This operation is designed to be used for building permission-aware UIs
   * and command-line tools, not for authorization checking. This operation may
   * "fail open" without warning. (secrets.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_SecretManager_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecretManager_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_SecretManager_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_SecretManager_TestIamPermissionsResponse");
  }
}
