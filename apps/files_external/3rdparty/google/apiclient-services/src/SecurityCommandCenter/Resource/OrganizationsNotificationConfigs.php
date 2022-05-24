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

use Google\Service\SecurityCommandCenter\ListNotificationConfigsResponse;
use Google\Service\SecurityCommandCenter\NotificationConfig;
use Google\Service\SecurityCommandCenter\SecuritycenterEmpty;

/**
 * The "notificationConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $securitycenterService = new Google\Service\SecurityCommandCenter(...);
 *   $notificationConfigs = $securitycenterService->notificationConfigs;
 *  </code>
 */
class OrganizationsNotificationConfigs extends \Google\Service\Resource
{
  /**
   * Creates a notification config. (notificationConfigs.create)
   *
   * @param string $parent Required. Resource name of the new notification
   * config's parent. Its format is "organizations/[organization_id]".
   * @param NotificationConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string configId Required. Unique identifier provided by the client
   * within the parent scope. It must be between 1 and 128 characters, and
   * contains alphanumeric characters, underscores or hyphens only.
   * @return NotificationConfig
   */
  public function create($parent, NotificationConfig $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], NotificationConfig::class);
  }
  /**
   * Deletes a notification config. (notificationConfigs.delete)
   *
   * @param string $name Required. Name of the notification config to delete. Its
   * format is "organizations/[organization_id]/notificationConfigs/[config_id]".
   * @param array $optParams Optional parameters.
   * @return SecuritycenterEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], SecuritycenterEmpty::class);
  }
  /**
   * Gets a notification config. (notificationConfigs.get)
   *
   * @param string $name Required. Name of the notification config to get. Its
   * format is "organizations/[organization_id]/notificationConfigs/[config_id]".
   * @param array $optParams Optional parameters.
   * @return NotificationConfig
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], NotificationConfig::class);
  }
  /**
   * Lists notification configs.
   * (notificationConfigs.listOrganizationsNotificationConfigs)
   *
   * @param string $parent Required. Name of the organization to list notification
   * configs. Its format is "organizations/[organization_id]".
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of results to return in a single
   * response. Default is 10, minimum is 1, maximum is 1000.
   * @opt_param string pageToken The value returned by the last
   * `ListNotificationConfigsResponse`; indicates that this is a continuation of a
   * prior `ListNotificationConfigs` call, and that the system should return the
   * next page of data.
   * @return ListNotificationConfigsResponse
   */
  public function listOrganizationsNotificationConfigs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListNotificationConfigsResponse::class);
  }
  /**
   * Updates a notification config. The following update fields are allowed:
   * description, pubsub_topic, streaming_config.filter
   * (notificationConfigs.patch)
   *
   * @param string $name The relative resource name of this notification config.
   * See:
   * https://cloud.google.com/apis/design/resource_names#relative_resource_name
   * Example:
   * "organizations/{organization_id}/notificationConfigs/notify_public_bucket".
   * @param NotificationConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The FieldMask to use when updating the
   * notification config. If empty all mutable fields will be updated.
   * @return NotificationConfig
   */
  public function patch($name, NotificationConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], NotificationConfig::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsNotificationConfigs::class, 'Google_Service_SecurityCommandCenter_Resource_OrganizationsNotificationConfigs');
