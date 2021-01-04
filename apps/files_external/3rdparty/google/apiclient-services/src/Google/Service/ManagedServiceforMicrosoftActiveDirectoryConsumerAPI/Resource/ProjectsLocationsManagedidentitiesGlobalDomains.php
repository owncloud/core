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
 * The "domains" collection of methods.
 * Typical usage is:
 *  <code>
 *   $managedidentitiesService = new Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI(...);
 *   $domains = $managedidentitiesService->domains;
 *  </code>
 */
class Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Resource_ProjectsLocationsManagedidentitiesGlobalDomains extends Google_Service_Resource
{
  /**
   * Adds an AD trust to a domain. (domains.attachTrust)
   *
   * @param string $name Required. The resource domain name, project name and
   * location using the form:
   * `projects/{project_id}/locations/global/domains/{domain_name}`
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_AttachTrustRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Operation
   */
  public function attachTrust($name, Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_AttachTrustRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('attachTrust', array($params), "Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Operation");
  }
  /**
   * Creates a Microsoft AD domain. (domains.create)
   *
   * @param string $parent Required. The resource project name and location using
   * the form: `projects/{project_id}/locations/global`
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Domain $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string domainName Required. The fully qualified domain name. e.g.
   * mydomain.myorganization.com, with the following restrictions: * Must contain
   * only lowercase letters, numbers, periods and hyphens. * Must start with a
   * letter. * Must contain between 2-64 characters. * Must end with a number or a
   * letter. * Must not start with period. * First segement length (mydomain form
   * example above) shouldn't exceed 15 chars. * The last segment cannot be fully
   * numeric. * Must be unique within the customer project.
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Operation
   */
  public function create($parent, Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Domain $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Operation");
  }
  /**
   * Deletes a domain. (domains.delete)
   *
   * @param string $name Required. The domain resource name using the form:
   * `projects/{project_id}/locations/global/domains/{domain_name}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Operation");
  }
  /**
   * Removes an AD trust. (domains.detachTrust)
   *
   * @param string $name Required. The resource domain name, project name, and
   * location using the form:
   * `projects/{project_id}/locations/global/domains/{domain_name}`
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_DetachTrustRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Operation
   */
  public function detachTrust($name, Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_DetachTrustRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('detachTrust', array($params), "Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Operation");
  }
  /**
   * Gets information about a domain. (domains.get)
   *
   * @param string $name Required. The domain resource name using the form:
   * `projects/{project_id}/locations/global/domains/{domain_name}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Domain
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Domain");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (domains.getIamPolicy)
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
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Policy");
  }
  /**
   * Lists domains in a project.
   * (domains.listProjectsLocationsManagedidentitiesGlobalDomains)
   *
   * @param string $parent Required. The resource name of the domain location
   * using the form: `projects/{project_id}/locations/global`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. A filter specifying constraints of a list
   * operation. For example, `Domain.fqdn="mydomain.myorginization"`.
   * @opt_param string orderBy Optional. Specifies the ordering of results. See
   * [Sorting
   * order](https://cloud.google.com/apis/design/design_patterns#sorting_order)
   * for more information.
   * @opt_param int pageSize Optional. The maximum number of items to return. If
   * not specified, a default value of 1000 will be used. Regardless of the
   * page_size value, the response may include a partial list. Callers should rely
   * on a response's next_page_token to determine if there are additional results
   * to list.
   * @opt_param string pageToken Optional. The `next_page_token` value returned
   * from a previous ListDomainsRequest request, if any.
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_ListDomainsResponse
   */
  public function listProjectsLocationsManagedidentitiesGlobalDomains($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_ListDomainsResponse");
  }
  /**
   * Updates the metadata and configuration of a domain. (domains.patch)
   *
   * @param string $name Required. The unique name of the domain using the form:
   * `projects/{project_id}/locations/global/domains/{domain_name}`.
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Domain $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask of fields to update. At least one
   * path must be supplied in this field. The elements of the repeated paths field
   * may only include fields from Domain: * `labels` * `locations` *
   * `authorized_networks`
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Operation
   */
  public function patch($name, Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Domain $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Operation");
  }
  /**
   * Updates the DNS conditional forwarder. (domains.reconfigureTrust)
   *
   * @param string $name Required. The resource domain name, project name and
   * location using the form:
   * `projects/{project_id}/locations/global/domains/{domain_name}`
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_ReconfigureTrustRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Operation
   */
  public function reconfigureTrust($name, Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_ReconfigureTrustRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('reconfigureTrust', array($params), "Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Operation");
  }
  /**
   * Resets a domain's administrator password. (domains.resetAdminPassword)
   *
   * @param string $name Required. The domain resource name using the form:
   * `projects/{project_id}/locations/global/domains/{domain_name}`
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_ResetAdminPasswordRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_ResetAdminPasswordResponse
   */
  public function resetAdminPassword($name, Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_ResetAdminPasswordRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resetAdminPassword', array($params), "Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_ResetAdminPasswordResponse");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (domains.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Policy
   */
  public function setIamPolicy($resource, Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (domains.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_TestIamPermissionsResponse");
  }
  /**
   * Validates a trust state, that the target domain is reachable, and that the
   * target domain is able to accept incoming trust requests.
   * (domains.validateTrust)
   *
   * @param string $name Required. The resource domain name, project name, and
   * location using the form:
   * `projects/{project_id}/locations/global/domains/{domain_name}`
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_ValidateTrustRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Operation
   */
  public function validateTrust($name, Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_ValidateTrustRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('validateTrust', array($params), "Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Operation");
  }
}
