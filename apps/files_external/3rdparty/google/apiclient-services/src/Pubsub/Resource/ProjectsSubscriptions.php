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

namespace Google\Service\Pubsub\Resource;

use Google\Service\Pubsub\AcknowledgeRequest;
use Google\Service\Pubsub\DetachSubscriptionResponse;
use Google\Service\Pubsub\ListSubscriptionsResponse;
use Google\Service\Pubsub\ModifyAckDeadlineRequest;
use Google\Service\Pubsub\ModifyPushConfigRequest;
use Google\Service\Pubsub\Policy;
use Google\Service\Pubsub\PubsubEmpty;
use Google\Service\Pubsub\PullRequest;
use Google\Service\Pubsub\PullResponse;
use Google\Service\Pubsub\SeekRequest;
use Google\Service\Pubsub\SeekResponse;
use Google\Service\Pubsub\SetIamPolicyRequest;
use Google\Service\Pubsub\Subscription;
use Google\Service\Pubsub\TestIamPermissionsRequest;
use Google\Service\Pubsub\TestIamPermissionsResponse;
use Google\Service\Pubsub\UpdateSubscriptionRequest;

/**
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubService = new Google\Service\Pubsub(...);
 *   $subscriptions = $pubsubService->subscriptions;
 *  </code>
 */
class ProjectsSubscriptions extends \Google\Service\Resource
{
  /**
   * Acknowledges the messages associated with the `ack_ids` in the
   * `AcknowledgeRequest`. The Pub/Sub system can remove the relevant messages
   * from the subscription. Acknowledging a message whose ack deadline has expired
   * may succeed, but such a message may be redelivered later. Acknowledging a
   * message more than once will not result in an error.
   * (subscriptions.acknowledge)
   *
   * @param string $subscription Required. The subscription whose message is being
   * acknowledged. Format is `projects/{project}/subscriptions/{sub}`.
   * @param AcknowledgeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PubsubEmpty
   */
  public function acknowledge($subscription, AcknowledgeRequest $postBody, $optParams = [])
  {
    $params = ['subscription' => $subscription, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('acknowledge', [$params], PubsubEmpty::class);
  }
  /**
   * Creates a subscription to a given topic. See the [resource name rules]
   * (https://cloud.google.com/pubsub/docs/admin#resource_names). If the
   * subscription already exists, returns `ALREADY_EXISTS`. If the corresponding
   * topic doesn't exist, returns `NOT_FOUND`. If the name is not provided in the
   * request, the server will assign a random name for this subscription on the
   * same project as the topic, conforming to the [resource name format]
   * (https://cloud.google.com/pubsub/docs/admin#resource_names). The generated
   * name is populated in the returned Subscription object. Note that for REST API
   * requests, you must specify a name in the request. (subscriptions.create)
   *
   * @param string $name Required. The name of the subscription. It must have the
   * format `"projects/{project}/subscriptions/{subscription}"`. `{subscription}`
   * must start with a letter, and contain only letters (`[A-Za-z]`), numbers
   * (`[0-9]`), dashes (`-`), underscores (`_`), periods (`.`), tildes (`~`), plus
   * (`+`) or percent signs (`%`). It must be between 3 and 255 characters in
   * length, and it must not start with `"goog"`.
   * @param Subscription $postBody
   * @param array $optParams Optional parameters.
   * @return Subscription
   */
  public function create($name, Subscription $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Subscription::class);
  }
  /**
   * Deletes an existing subscription. All messages retained in the subscription
   * are immediately dropped. Calls to `Pull` after deletion will return
   * `NOT_FOUND`. After a subscription is deleted, a new one may be created with
   * the same name, but the new one has no association with the old subscription
   * or its topic unless the same topic is specified. (subscriptions.delete)
   *
   * @param string $subscription Required. The subscription to delete. Format is
   * `projects/{project}/subscriptions/{sub}`.
   * @param array $optParams Optional parameters.
   * @return PubsubEmpty
   */
  public function delete($subscription, $optParams = [])
  {
    $params = ['subscription' => $subscription];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], PubsubEmpty::class);
  }
  /**
   * Detaches a subscription from this topic. All messages retained in the
   * subscription are dropped. Subsequent `Pull` and `StreamingPull` requests will
   * return FAILED_PRECONDITION. If the subscription is a push subscription,
   * pushes to the endpoint will stop. (subscriptions.detach)
   *
   * @param string $subscription Required. The subscription to detach. Format is
   * `projects/{project}/subscriptions/{subscription}`.
   * @param array $optParams Optional parameters.
   * @return DetachSubscriptionResponse
   */
  public function detach($subscription, $optParams = [])
  {
    $params = ['subscription' => $subscription];
    $params = array_merge($params, $optParams);
    return $this->call('detach', [$params], DetachSubscriptionResponse::class);
  }
  /**
   * Gets the configuration details of a subscription. (subscriptions.get)
   *
   * @param string $subscription Required. The name of the subscription to get.
   * Format is `projects/{project}/subscriptions/{sub}`.
   * @param array $optParams Optional parameters.
   * @return Subscription
   */
  public function get($subscription, $optParams = [])
  {
    $params = ['subscription' => $subscription];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Subscription::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (subscriptions.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
   * Lists matching subscriptions. (subscriptions.listProjectsSubscriptions)
   *
   * @param string $project Required. The name of the project in which to list
   * subscriptions. Format is `projects/{project-id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of subscriptions to return.
   * @opt_param string pageToken The value returned by the last
   * `ListSubscriptionsResponse`; indicates that this is a continuation of a prior
   * `ListSubscriptions` call, and that the system should return the next page of
   * data.
   * @return ListSubscriptionsResponse
   */
  public function listProjectsSubscriptions($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSubscriptionsResponse::class);
  }
  /**
   * Modifies the ack deadline for a specific message. This method is useful to
   * indicate that more time is needed to process a message by the subscriber, or
   * to make the message available for redelivery if the processing was
   * interrupted. Note that this does not modify the subscription-level
   * `ackDeadlineSeconds` used for subsequent messages.
   * (subscriptions.modifyAckDeadline)
   *
   * @param string $subscription Required. The name of the subscription. Format is
   * `projects/{project}/subscriptions/{sub}`.
   * @param ModifyAckDeadlineRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PubsubEmpty
   */
  public function modifyAckDeadline($subscription, ModifyAckDeadlineRequest $postBody, $optParams = [])
  {
    $params = ['subscription' => $subscription, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('modifyAckDeadline', [$params], PubsubEmpty::class);
  }
  /**
   * Modifies the `PushConfig` for a specified subscription. This may be used to
   * change a push subscription to a pull one (signified by an empty `PushConfig`)
   * or vice versa, or change the endpoint URL and other attributes of a push
   * subscription. Messages will accumulate for delivery continuously through the
   * call regardless of changes to the `PushConfig`.
   * (subscriptions.modifyPushConfig)
   *
   * @param string $subscription Required. The name of the subscription. Format is
   * `projects/{project}/subscriptions/{sub}`.
   * @param ModifyPushConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PubsubEmpty
   */
  public function modifyPushConfig($subscription, ModifyPushConfigRequest $postBody, $optParams = [])
  {
    $params = ['subscription' => $subscription, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('modifyPushConfig', [$params], PubsubEmpty::class);
  }
  /**
   * Updates an existing subscription. Note that certain properties of a
   * subscription, such as its topic, are not modifiable. (subscriptions.patch)
   *
   * @param string $name Required. The name of the subscription. It must have the
   * format `"projects/{project}/subscriptions/{subscription}"`. `{subscription}`
   * must start with a letter, and contain only letters (`[A-Za-z]`), numbers
   * (`[0-9]`), dashes (`-`), underscores (`_`), periods (`.`), tildes (`~`), plus
   * (`+`) or percent signs (`%`). It must be between 3 and 255 characters in
   * length, and it must not start with `"goog"`.
   * @param UpdateSubscriptionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Subscription
   */
  public function patch($name, UpdateSubscriptionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Subscription::class);
  }
  /**
   * Pulls messages from the server. The server may return `UNAVAILABLE` if there
   * are too many concurrent pull requests pending for the given subscription.
   * (subscriptions.pull)
   *
   * @param string $subscription Required. The subscription from which messages
   * should be pulled. Format is `projects/{project}/subscriptions/{sub}`.
   * @param PullRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PullResponse
   */
  public function pull($subscription, PullRequest $postBody, $optParams = [])
  {
    $params = ['subscription' => $subscription, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('pull', [$params], PullResponse::class);
  }
  /**
   * Seeks an existing subscription to a point in time or to a given snapshot,
   * whichever is provided in the request. Snapshots are used in [Seek]
   * (https://cloud.google.com/pubsub/docs/replay-overview) operations, which
   * allow you to manage message acknowledgments in bulk. That is, you can set the
   * acknowledgment state of messages in an existing subscription to the state
   * captured by a snapshot. Note that both the subscription and the snapshot must
   * be on the same topic. (subscriptions.seek)
   *
   * @param string $subscription Required. The subscription to affect.
   * @param SeekRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SeekResponse
   */
  public function seek($subscription, SeekRequest $postBody, $optParams = [])
  {
    $params = ['subscription' => $subscription, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('seek', [$params], SeekResponse::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (subscriptions.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
   * This operation may "fail open" without warning.
   * (subscriptions.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsSubscriptions::class, 'Google_Service_Pubsub_Resource_ProjectsSubscriptions');
