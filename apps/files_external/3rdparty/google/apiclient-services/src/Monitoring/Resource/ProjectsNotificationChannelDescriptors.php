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

namespace Google\Service\Monitoring\Resource;

use Google\Service\Monitoring\ListNotificationChannelDescriptorsResponse;
use Google\Service\Monitoring\NotificationChannelDescriptor;

/**
 * The "notificationChannelDescriptors" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google\Service\Monitoring(...);
 *   $notificationChannelDescriptors = $monitoringService->notificationChannelDescriptors;
 *  </code>
 */
class ProjectsNotificationChannelDescriptors extends \Google\Service\Resource
{
  /**
   * Gets a single channel descriptor. The descriptor indicates which fields are
   * expected / permitted for a notification channel of the given type.
   * (notificationChannelDescriptors.get)
   *
   * @param string $name Required. The channel type for which to execute the
   * request. The format is:
   * projects/[PROJECT_ID_OR_NUMBER]/notificationChannelDescriptors/[CHANNEL_TYPE]
   * @param array $optParams Optional parameters.
   * @return NotificationChannelDescriptor
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], NotificationChannelDescriptor::class);
  }
  /**
   * Lists the descriptors for supported channel types. The use of descriptors
   * makes it possible for new channel types to be dynamically added.
   * (notificationChannelDescriptors.listProjectsNotificationChannelDescriptors)
   *
   * @param string $name Required. The REST resource name of the parent from which
   * to retrieve the notification channel descriptors. The expected syntax is:
   * projects/[PROJECT_ID_OR_NUMBER] Note that this names
   * (https://cloud.google.com/monitoring/api/v3#project_name) the parent
   * container in which to look for the descriptors; to retrieve a single
   * descriptor by name, use the GetNotificationChannelDescriptor operation,
   * instead.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of results to return in a single
   * response. If not set to a positive number, a reasonable value will be chosen
   * by the service.
   * @opt_param string pageToken If non-empty, page_token must contain a value
   * returned as the next_page_token in a previous response to request the next
   * set of results.
   * @return ListNotificationChannelDescriptorsResponse
   */
  public function listProjectsNotificationChannelDescriptors($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListNotificationChannelDescriptorsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsNotificationChannelDescriptors::class, 'Google_Service_Monitoring_Resource_ProjectsNotificationChannelDescriptors');
