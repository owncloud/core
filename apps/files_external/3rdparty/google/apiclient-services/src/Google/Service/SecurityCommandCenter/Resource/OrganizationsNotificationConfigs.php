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
 * The "notificationConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $securitycenterService = new Google_Service_SecurityCommandCenter(...);
 *   $notificationConfigs = $securitycenterService->notificationConfigs;
 *  </code>
 */
class Google_Service_SecurityCommandCenter_Resource_OrganizationsNotificationConfigs extends Google_Service_Resource
{
  /**
   * Creates a notification config. (notificationConfigs.create)
   *
   * @param string $parent Required. Resource name of the new notification
   * config's parent. Its format is "organizations/[organization_id]".
   * @param Google_Service_SecurityCommandCenter_NotificationConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string configId Required. Unique identifier provided by the client
   * within the parent scope. It must be between 1 and 128 characters, and
   * contains alphanumeric characters, underscores or hyphens only.
   * @return Google_Service_SecurityCommandCenter_NotificationConfig
   */
  public function create($parent, Google_Service_SecurityCommandCenter_NotificationConfig $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_SecurityCommandCenter_NotificationConfig");
  }
  /**
   * Deletes a notification config. (notificationConfigs.delete)
   *
   * @param string $name Required. Name of the notification config to delete. Its
   * format is "organizations/[organization_id]/notificationConfigs/[config_id]".
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecurityCommandCenter_SecuritycenterEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_SecurityCommandCenter_SecuritycenterEmpty");
  }
  /**
   * Gets a notification config. (notificationConfigs.get)
   *
   * @param string $name Required. Name of the notification config to get. Its
   * format is "organizations/[organization_id]/notificationConfigs/[config_id]".
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecurityCommandCenter_NotificationConfig
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_SecurityCommandCenter_NotificationConfig");
  }
  /**
   * Lists notification configs.
   * (notificationConfigs.listOrganizationsNotificationConfigs)
   *
   * @param string $parent Required. Name of the organization to list notification
   * configs. Its format is "organizations/[organization_id]".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The value returned by the last
   * `ListNotificationConfigsResponse`; indicates that this is a continuation of a
   * prior `ListNotificationConfigs` call, and that the system should return the
   * next page of data.
   * @opt_param int pageSize The maximum number of results to return in a single
   * response. Default is 10, minimum is 1, maximum is 1000.
   * @return Google_Service_SecurityCommandCenter_ListNotificationConfigsResponse
   */
  public function listOrganizationsNotificationConfigs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SecurityCommandCenter_ListNotificationConfigsResponse");
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
   * @param Google_Service_SecurityCommandCenter_NotificationConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The FieldMask to use when updating the
   * notification config. If empty all mutable fields will be updated.
   * @return Google_Service_SecurityCommandCenter_NotificationConfig
   */
  public function patch($name, Google_Service_SecurityCommandCenter_NotificationConfig $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_SecurityCommandCenter_NotificationConfig");
  }
}
