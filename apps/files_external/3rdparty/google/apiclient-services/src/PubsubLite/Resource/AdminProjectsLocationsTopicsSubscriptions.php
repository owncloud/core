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

namespace Google\Service\PubsubLite\Resource;

use Google\Service\PubsubLite\ListTopicSubscriptionsResponse;

/**
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubliteService = new Google\Service\PubsubLite(...);
 *   $subscriptions = $pubsubliteService->subscriptions;
 *  </code>
 */
class AdminProjectsLocationsTopicsSubscriptions extends \Google\Service\Resource
{
  /**
   * Lists the subscriptions attached to the specified topic.
   * (subscriptions.listAdminProjectsLocationsTopicsSubscriptions)
   *
   * @param string $name Required. The name of the topic whose subscriptions to
   * list.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of subscriptions to return. The
   * service may return fewer than this value. If unset or zero, all subscriptions
   * for the given topic will be returned.
   * @opt_param string pageToken A page token, received from a previous
   * `ListTopicSubscriptions` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `ListTopicSubscriptions`
   * must match the call that provided the page token.
   * @return ListTopicSubscriptionsResponse
   */
  public function listAdminProjectsLocationsTopicsSubscriptions($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTopicSubscriptionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdminProjectsLocationsTopicsSubscriptions::class, 'Google_Service_PubsubLite_Resource_AdminProjectsLocationsTopicsSubscriptions');
