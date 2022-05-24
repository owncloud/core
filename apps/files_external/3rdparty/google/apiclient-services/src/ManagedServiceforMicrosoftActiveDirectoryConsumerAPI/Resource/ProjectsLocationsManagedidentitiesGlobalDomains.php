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

namespace Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\Resource;

use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\AttachTrustRequest;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\DetachTrustRequest;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\Domain;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\LDAPSSettings;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\ListDomainsResponse;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\Operation;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\Policy;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\ReconfigureTrustRequest;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\ResetAdminPasswordRequest;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\ResetAdminPasswordResponse;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\RestoreDomainRequest;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\SetIamPolicyRequest;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\TestIamPermissionsRequest;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\TestIamPermissionsResponse;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\ValidateTrustRequest;

/**
 * The "domains" collection of methods.
 * Typical usage is:
 *  <code>
 *   $managedidentitiesService = new Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI(...);
 *   $domains = $managedidentitiesService->domains;
 *  </code>
 */
class ProjectsLocationsManagedidentitiesGlobalDomains extends \Google\Service\Resource
{
  /**
   * Adds an AD trust to a domain. (domains.attachTrust)
   *
   * @param string $name Required. The resource domain name, project name and
   * location using the form:
   * `projects/{project_id}/locations/global/domains/{domain_name}`
   * @param AttachTrustRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function attachTrust($name, AttachTrustRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('attachTrust', [$params], Operation::class);
  }
  /**
   * Creates a Microsoft AD domain. (domains.create)
   *
   * @param string $parent Required. The resource project name and location using
   * the form: `projects/{project_id}/locations/global`
   * @param Domain $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string domainName Required. The fully qualified domain name. e.g.
   * mydomain.myorganization.com, with the following restrictions: * Must contain
   * only lowercase letters, numbers, periods and hyphens. * Must start with a
   * letter. * Must contain between 2-64 characters. * Must end with a number or a
   * letter. * Must not start with period. * First segment length (mydomain for
   * example above) shouldn't exceed 15 chars. * The last segment cannot be fully
   * numeric. * Must be unique within the customer project.
   * @return Operation
   */
  public function create($parent, Domain $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a domain. (domains.delete)
   *
   * @param string $name Required. The domain resource name using the form:
   * `projects/{project_id}/locations/global/domains/{domain_name}`
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Removes an AD trust. (domains.detachTrust)
   *
   * @param string $name Required. The resource domain name, project name, and
   * location using the form:
   * `projects/{project_id}/locations/global/domains/{domain_name}`
   * @param DetachTrustRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function detachTrust($name, DetachTrustRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('detachTrust', [$params], Operation::class);
  }
  /**
   * Gets information about a domain. (domains.get)
   *
   * @param string $name Required. The domain resource name using the form:
   * `projects/{project_id}/locations/global/domains/{domain_name}`
   * @param array $optParams Optional parameters.
   * @return Domain
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Domain::class);
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
   * Gets the domain ldaps settings. (domains.getLdapssettings)
   *
   * @param string $name Required. The domain resource name using the form:
   * `projects/{project_id}/locations/global/domains/{domain_name}`
   * @param array $optParams Optional parameters.
   * @return LDAPSSettings
   */
  public function getLdapssettings($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getLdapssettings', [$params], LDAPSSettings::class);
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
   * @return ListDomainsResponse
   */
  public function listProjectsLocationsManagedidentitiesGlobalDomains($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDomainsResponse::class);
  }
  /**
   * Updates the metadata and configuration of a domain. (domains.patch)
   *
   * @param string $name Required. The unique name of the domain using the form:
   * `projects/{project_id}/locations/global/domains/{domain_name}`.
   * @param Domain $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask of fields to update. At least one
   * path must be supplied in this field. The elements of the repeated paths field
   * may only include fields from Domain: * `labels` * `locations` *
   * `authorized_networks` * `audit_logs_enabled`
   * @return Operation
   */
  public function patch($name, Domain $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Updates the DNS conditional forwarder. (domains.reconfigureTrust)
   *
   * @param string $name Required. The resource domain name, project name and
   * location using the form:
   * `projects/{project_id}/locations/global/domains/{domain_name}`
   * @param ReconfigureTrustRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function reconfigureTrust($name, ReconfigureTrustRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reconfigureTrust', [$params], Operation::class);
  }
  /**
   * Resets a domain's administrator password. (domains.resetAdminPassword)
   *
   * @param string $name Required. The domain resource name using the form:
   * `projects/{project_id}/locations/global/domains/{domain_name}`
   * @param ResetAdminPasswordRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ResetAdminPasswordResponse
   */
  public function resetAdminPassword($name, ResetAdminPasswordRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('resetAdminPassword', [$params], ResetAdminPasswordResponse::class);
  }
  /**
   * RestoreDomain restores domain backup mentioned in the RestoreDomainRequest
   * (domains.restore)
   *
   * @param string $name Required. Resource name for the domain to which the
   * backup belongs
   * @param RestoreDomainRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function restore($name, RestoreDomainRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('restore', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (domains.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
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
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (domains.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
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
   * Patches a single ldaps settings. (domains.updateLdapssettings)
   *
   * @param string $name The resource name of the LDAPS settings. Uses the form:
   * `projects/{project}/locations/{location}/domains/{domain}`.
   * @param LDAPSSettings $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask of fields to update. At least one
   * path must be supplied in this field. For the `FieldMask` definition, see
   * https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return Operation
   */
  public function updateLdapssettings($name, LDAPSSettings $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateLdapssettings', [$params], Operation::class);
  }
  /**
   * Validates a trust state, that the target domain is reachable, and that the
   * target domain is able to accept incoming trust requests.
   * (domains.validateTrust)
   *
   * @param string $name Required. The resource domain name, project name, and
   * location using the form:
   * `projects/{project_id}/locations/global/domains/{domain_name}`
   * @param ValidateTrustRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function validateTrust($name, ValidateTrustRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('validateTrust', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsManagedidentitiesGlobalDomains::class, 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Resource_ProjectsLocationsManagedidentitiesGlobalDomains');
