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
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubliteService = new Google_Service_PubsubLite(...);
 *   $subscriptions = $pubsubliteService->subscriptions;
 *  </code>
 */
class Google_Service_PubsubLite_Resource_AdminProjectsLocationsTopicsSubscriptions extends Google_Service_Resource
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
   * @return Google_Service_PubsubLite_ListTopicSubscriptionsResponse
   */
  public function listAdminProjectsLocationsTopicsSubscriptions($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_PubsubLite_ListTopicSubscriptionsResponse");
  }
}
