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
class Google_Service_PubsubLite_Resource_AdminProjectsLocationsSubscriptions extends Google_Service_Resource
{
  /**
   * Creates a new subscription. (subscriptions.create)
   *
   * @param string $parent Required. The parent location in which to create the
   * subscription. Structured like
   * `projects/{project_number}/locations/{location}`.
   * @param Google_Service_PubsubLite_Subscription $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string subscriptionId Required. The ID to use for the
   * subscription, which will become the final component of the subscription's
   * name. This value is structured like: `my-sub-name`.
   * @return Google_Service_PubsubLite_Subscription
   */
  public function create($parent, Google_Service_PubsubLite_Subscription $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_PubsubLite_Subscription");
  }
  /**
   * Deletes the specified subscription. (subscriptions.delete)
   *
   * @param string $name Required. The name of the subscription to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_PubsubLite_PubsubliteEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_PubsubLite_PubsubliteEmpty");
  }
  /**
   * Returns the subscription configuration. (subscriptions.get)
   *
   * @param string $name Required. The name of the subscription whose
   * configuration to return.
   * @param array $optParams Optional parameters.
   * @return Google_Service_PubsubLite_Subscription
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_PubsubLite_Subscription");
  }
  /**
   * Returns the list of subscriptions for the given project.
   * (subscriptions.listAdminProjectsLocationsSubscriptions)
   *
   * @param string $parent Required. The parent whose subscriptions are to be
   * listed. Structured like `projects/{project_number}/locations/{location}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A page token, received from a previous
   * `ListSubscriptions` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListSubscriptions` must match
   * the call that provided the page token.
   * @opt_param int pageSize The maximum number of subscriptions to return. The
   * service may return fewer than this value. If unset or zero, all subscriptions
   * for the parent will be returned.
   * @return Google_Service_PubsubLite_ListSubscriptionsResponse
   */
  public function listAdminProjectsLocationsSubscriptions($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_PubsubLite_ListSubscriptionsResponse");
  }
  /**
   * Updates properties of the specified subscription. (subscriptions.patch)
   *
   * @param string $name The name of the subscription. Structured like: projects/{
   * project_number}/locations/{location}/subscriptions/{subscription_id}
   * @param Google_Service_PubsubLite_Subscription $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. A mask specifying the subscription
   * fields to change.
   * @return Google_Service_PubsubLite_Subscription
   */
  public function patch($name, Google_Service_PubsubLite_Subscription $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_PubsubLite_Subscription");
  }
}
