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

namespace Google\Service\SecurityCommandCenter\Resource;

use Google\Service\SecurityCommandCenter\OrganizationSettings;

/**
 * The "organizations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $securitycenterService = new Google\Service\SecurityCommandCenter(...);
 *   $organizations = $securitycenterService->organizations;
 *  </code>
 */
class Organizations extends \Google\Service\Resource
{
  /**
   * Gets the settings for an organization.
   * (organizations.getOrganizationSettings)
   *
   * @param string $name Required. Name of the organization to get organization
   * settings for. Its format is
   * "organizations/[organization_id]/organizationSettings".
   * @param array $optParams Optional parameters.
   * @return OrganizationSettings
   */
  public function getOrganizationSettings($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getOrganizationSettings', [$params], OrganizationSettings::class);
  }
  /**
   * Updates an organization's settings.
   * (organizations.updateOrganizationSettings)
   *
   * @param string $name The relative resource name of the settings. See:
   * https://cloud.google.com/apis/design/resource_names#relative_resource_name
   * Example: "organizations/{organization_id}/organizationSettings".
   * @param OrganizationSettings $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The FieldMask to use when updating the settings
   * resource. If empty all mutable fields will be updated.
   * @return OrganizationSettings
   */
  public function updateOrganizationSettings($name, OrganizationSettings $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateOrganizationSettings', [$params], OrganizationSettings::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Organizations::class, 'Google_Service_SecurityCommandCenter_Resource_Organizations');
