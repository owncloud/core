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

use Google\Service\PubsubLite\ListSubscriptionsResponse;
use Google\Service\PubsubLite\Operation;
use Google\Service\PubsubLite\PubsubliteEmpty;
use Google\Service\PubsubLite\SeekSubscriptionRequest;
use Google\Service\PubsubLite\Subscription;

/**
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubliteService = new Google\Service\PubsubLite(...);
 *   $subscriptions = $pubsubliteService->subscriptions;
 *  </code>
 */
class AdminProjectsLocationsSubscriptions extends \Google\Service\Resource
{
  /**
   * Creates a new subscription. (subscriptions.create)
   *
   * @param string $parent Required. The parent location in which to create the
   * subscription. Structured like
   * `projects/{project_number}/locations/{location}`.
   * @param Subscription $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool skipBacklog If true, the newly created subscription will only
   * receive messages published after the subscription was created. Otherwise, the
   * entire message backlog will be received on the subscription. Defaults to
   * false.
   * @opt_param string subscriptionId Required. The ID to use for the
   * subscription, which will become the final component of the subscription's
   * name. This value is structured like: `my-sub-name`.
   * @return Subscription
   */
  public function create($parent, Subscription $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Subscription::class);
  }
  /**
   * Deletes the specified subscription. (subscriptions.delete)
   *
   * @param string $name Required. The name of the subscription to delete.
   * @param array $optParams Optional parameters.
   * @return PubsubliteEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], PubsubliteEmpty::class);
  }
  /**
   * Returns the subscription configuration. (subscriptions.get)
   *
   * @param string $name Required. The name of the subscription whose
   * configuration to return.
   * @param array $optParams Optional parameters.
   * @return Subscription
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Subscription::class);
  }
  /**
   * Returns the list of subscriptions for the given project.
   * (subscriptions.listAdminProjectsLocationsSubscriptions)
   *
   * @param string $parent Required. The parent whose subscriptions are to be
   * listed. Structured like `projects/{project_number}/locations/{location}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of subscriptions to return. The
   * service may return fewer than this value. If unset or zero, all subscriptions
   * for the parent will be returned.
   * @opt_param string pageToken A page token, received from a previous
   * `ListSubscriptions` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListSubscriptions` must match
   * the call that provided the page token.
   * @return ListSubscriptionsResponse
   */
  public function listAdminProjectsLocationsSubscriptions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSubscriptionsResponse::class);
  }
  /**
   * Updates properties of the specified subscription. (subscriptions.patch)
   *
   * @param string $name The name of the subscription. Structured like: projects/{
   * project_number}/locations/{location}/subscriptions/{subscription_id}
   * @param Subscription $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. A mask specifying the subscription
   * fields to change.
   * @return Subscription
   */
  public function patch($name, Subscription $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Subscription::class);
  }
  /**
   * Performs an out-of-band seek for a subscription to a specified target, which
   * may be timestamps or named positions within the message backlog. Seek
   * translates these targets to cursors for each partition and orchestrates
   * subscribers to start consuming messages from these seek cursors. If an
   * operation is returned, the seek has been registered and subscribers will
   * eventually receive messages from the seek cursors (i.e. eventual
   * consistency), as long as they are using a minimum supported client library
   * version and not a system that tracks cursors independently of Pub/Sub Lite
   * (e.g. Apache Beam, Dataflow, Spark). The seek operation will fail for
   * unsupported clients. If clients would like to know when subscribers react to
   * the seek (or not), they can poll the operation. The seek operation will
   * succeed and complete once subscribers are ready to receive messages from the
   * seek cursors for all partitions of the topic. This means that the seek
   * operation will not complete until all subscribers come online. If the
   * previous seek operation has not yet completed, it will be aborted and the new
   * invocation of seek will supersede it. (subscriptions.seek)
   *
   * @param string $name Required. The name of the subscription to seek.
   * @param SeekSubscriptionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function seek($name, SeekSubscriptionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('seek', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdminProjectsLocationsSubscriptions::class, 'Google_Service_PubsubLite_Resource_AdminProjectsLocationsSubscriptions');
