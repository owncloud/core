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
 * The "registrations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $domainsService = new Google_Service_CloudDomains(...);
 *   $registrations = $domainsService->registrations;
 *  </code>
 */
class Google_Service_CloudDomains_Resource_ProjectsLocationsRegistrations extends Google_Service_Resource
{
  /**
   * Updates a `Registration`'s contact settings. Some changes require
   * confirmation by the domain's registrant contact .
   * (registrations.configureContactSettings)
   *
   * @param string $registration Required. The name of the `Registration` whose
   * contact settings are being updated, in the format
   * `projects/locations/registrations`.
   * @param Google_Service_CloudDomains_ConfigureContactSettingsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudDomains_Operation
   */
  public function configureContactSettings($registration, Google_Service_CloudDomains_ConfigureContactSettingsRequest $postBody, $optParams = array())
  {
    $params = array('registration' => $registration, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('configureContactSettings', array($params), "Google_Service_CloudDomains_Operation");
  }
  /**
   * Updates a `Registration`'s DNS settings. (registrations.configureDnsSettings)
   *
   * @param string $registration Required. The name of the `Registration` whose
   * DNS settings are being updated, in the format
   * `projects/locations/registrations`.
   * @param Google_Service_CloudDomains_ConfigureDnsSettingsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudDomains_Operation
   */
  public function configureDnsSettings($registration, Google_Service_CloudDomains_ConfigureDnsSettingsRequest $postBody, $optParams = array())
  {
    $params = array('registration' => $registration, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('configureDnsSettings', array($params), "Google_Service_CloudDomains_Operation");
  }
  /**
   * Updates a `Registration`'s management settings.
   * (registrations.configureManagementSettings)
   *
   * @param string $registration Required. The name of the `Registration` whose
   * management settings are being updated, in the format
   * `projects/locations/registrations`.
   * @param Google_Service_CloudDomains_ConfigureManagementSettingsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudDomains_Operation
   */
  public function configureManagementSettings($registration, Google_Service_CloudDomains_ConfigureManagementSettingsRequest $postBody, $optParams = array())
  {
    $params = array('registration' => $registration, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('configureManagementSettings', array($params), "Google_Service_CloudDomains_Operation");
  }
  /**
   * Deletes a `Registration` resource. This method only works on resources in one
   * of the following states: * `state` is `EXPORTED` with `expire_time` in the
   * past * `state` is `REGISTRATION_FAILED` (registrations.delete)
   *
   * @param string $name Required. The name of the `Registration` to delete, in
   * the format `projects/locations/registrations`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudDomains_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudDomains_Operation");
  }
  /**
   * Exports a `Registration` that you no longer want to use with Cloud Domains.
   * You can continue to use the domain in [Google
   * Domains](https://domains.google/) until it expires. If the export is
   * successful: * The resource's `state` becomes `EXPORTED`, meaning that it is
   * no longer managed by Cloud Domains * Because individual users can own domains
   * in Google Domains, the calling user becomes the domain's sole owner.
   * Permissions for the domain are subsequently managed in Google Domains. *
   * Without further action, the domain does not renew automatically. The new
   * owner can set up billing in Google Domains to renew the domain if needed.
   * (registrations.export)
   *
   * @param string $name Required. The name of the `Registration` to export, in
   * the format `projects/locations/registrations`.
   * @param Google_Service_CloudDomains_ExportRegistrationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudDomains_Operation
   */
  public function export($name, Google_Service_CloudDomains_ExportRegistrationRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('export', array($params), "Google_Service_CloudDomains_Operation");
  }
  /**
   * Gets the details of a `Registration` resource. (registrations.get)
   *
   * @param string $name Required. The name of the `Registration` to get, in the
   * format `projects/locations/registrations`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudDomains_Registration
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudDomains_Registration");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (registrations.getIamPolicy)
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
   * @return Google_Service_CloudDomains_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CloudDomains_Policy");
  }
  /**
   * Lists the `Registration` resources in a project.
   * (registrations.listProjectsLocationsRegistrations)
   *
   * @param string $parent Required. The project and location from which to list
   * `Registration`s, specified in the format `projects/locations`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter expression to restrict the `Registration`s
   * returned. The expression must specify the field name, a comparison operator,
   * and the value that you want to use for filtering. The value must be a string,
   * a number, a boolean, or an enum value. The comparison operator should be one
   * of =, !=, >, <, >=, <=, or : for prefix or wildcard matches. For example, to
   * filter to a specific domain name, use an expression like
   * `domainName="example.com"`. You can also check for the existence of a field;
   * for example, to find domains using custom DNS settings, use an expression
   * like `dnsSettings.customDns:*`. You can also create compound filters by
   * combining expressions with the `AND` and `OR` operators. For example, to find
   * domains that are suspended or have specific issues flagged, use an expression
   * like `(state=SUSPENDED) OR (issue:*)`.
   * @opt_param int pageSize Maximum number of results to return.
   * @opt_param string pageToken When set to the `next_page_token` from a prior
   * response, provides the next page of results.
   * @return Google_Service_CloudDomains_ListRegistrationsResponse
   */
  public function listProjectsLocationsRegistrations($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudDomains_ListRegistrationsResponse");
  }
  /**
   * Updates select fields of a `Registration` resource, notably `labels`. To
   * update other fields, use the appropriate custom update method: * To update
   * management settings, see `ConfigureManagementSettings` * To update DNS
   * configuration, see `ConfigureDnsSettings` * To update contact information,
   * see `ConfigureContactSettings` (registrations.patch)
   *
   * @param string $name Output only. Name of the `Registration` resource, in the
   * format `projects/locations/registrations/`.
   * @param Google_Service_CloudDomains_Registration $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The field mask describing which fields
   * to update as a comma-separated list. For example, if only the labels are
   * being updated, the `update_mask` would be `"labels"`.
   * @return Google_Service_CloudDomains_Operation
   */
  public function patch($name, Google_Service_CloudDomains_Registration $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudDomains_Operation");
  }
  /**
   * Registers a new domain name and creates a corresponding `Registration`
   * resource. Call `RetrieveRegisterParameters` first to check availability of
   * the domain name and determine parameters like price that are needed to build
   * a call to this method. A successful call creates a `Registration` resource in
   * state `REGISTRATION_PENDING`, which resolves to `ACTIVE` within 1-2 minutes,
   * indicating that the domain was successfully registered. If the resource ends
   * up in state `REGISTRATION_FAILED`, it indicates that the domain was not
   * registered successfully, and you can safely delete the resource and retry
   * registration. (registrations.register)
   *
   * @param string $parent Required. The parent resource of the `Registration`.
   * Must be in the format `projects/locations`.
   * @param Google_Service_CloudDomains_RegisterDomainRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudDomains_Operation
   */
  public function register($parent, Google_Service_CloudDomains_RegisterDomainRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('register', array($params), "Google_Service_CloudDomains_Operation");
  }
  /**
   * Resets the authorization code of the `Registration` to a new random string.
   * You can call this method only after 60 days have elapsed since the initial
   * domain registration. (registrations.resetAuthorizationCode)
   *
   * @param string $registration Required. The name of the `Registration` whose
   * authorization code is being reset, in the format
   * `projects/locations/registrations`.
   * @param Google_Service_CloudDomains_ResetAuthorizationCodeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudDomains_AuthorizationCode
   */
  public function resetAuthorizationCode($registration, Google_Service_CloudDomains_ResetAuthorizationCodeRequest $postBody, $optParams = array())
  {
    $params = array('registration' => $registration, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resetAuthorizationCode', array($params), "Google_Service_CloudDomains_AuthorizationCode");
  }
  /**
   * Gets the authorization code of the `Registration` for the purpose of
   * transferring the domain to another registrar. You can call this method only
   * after 60 days have elapsed since the initial domain registration.
   * (registrations.retrieveAuthorizationCode)
   *
   * @param string $registration Required. The name of the `Registration` whose
   * authorization code is being retrieved, in the format
   * `projects/locations/registrations`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudDomains_AuthorizationCode
   */
  public function retrieveAuthorizationCode($registration, $optParams = array())
  {
    $params = array('registration' => $registration);
    $params = array_merge($params, $optParams);
    return $this->call('retrieveAuthorizationCode', array($params), "Google_Service_CloudDomains_AuthorizationCode");
  }
  /**
   * Gets parameters needed to register a new domain name, including price and up-
   * to-date availability. Use the returned values to call `RegisterDomain`.
   * (registrations.retrieveRegisterParameters)
   *
   * @param string $location Required. The location. Must be in the format
   * `projects/locations`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string domainName Required. The domain name. Unicode domain names
   * must be expressed in Punycode format.
   * @return Google_Service_CloudDomains_RetrieveRegisterParametersResponse
   */
  public function retrieveRegisterParameters($location, $optParams = array())
  {
    $params = array('location' => $location);
    $params = array_merge($params, $optParams);
    return $this->call('retrieveRegisterParameters', array($params), "Google_Service_CloudDomains_RetrieveRegisterParametersResponse");
  }
  /**
   * Searches for available domain names similar to the provided query.
   * Availability results from this method are approximate; call
   * `RetrieveRegisterParameters` on a domain before registering to confirm
   * availability. (registrations.searchDomains)
   *
   * @param string $location Required. The location. Must be in the format
   * `projects/locations`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string query Required. String used to search for available domain
   * names.
   * @return Google_Service_CloudDomains_SearchDomainsResponse
   */
  public function searchDomains($location, $optParams = array())
  {
    $params = array('location' => $location);
    $params = array_merge($params, $optParams);
    return $this->call('searchDomains', array($params), "Google_Service_CloudDomains_SearchDomainsResponse");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (registrations.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudDomains_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudDomains_Policy
   */
  public function setIamPolicy($resource, Google_Service_CloudDomains_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_CloudDomains_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (registrations.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_CloudDomains_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudDomains_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_CloudDomains_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_CloudDomains_TestIamPermissionsResponse");
  }
}
