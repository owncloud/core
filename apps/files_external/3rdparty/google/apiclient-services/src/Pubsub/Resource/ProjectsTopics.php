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

use Google\Service\Pubsub\ListTopicsResponse;
use Google\Service\Pubsub\Policy;
use Google\Service\Pubsub\PublishRequest;
use Google\Service\Pubsub\PublishResponse;
use Google\Service\Pubsub\PubsubEmpty;
use Google\Service\Pubsub\SetIamPolicyRequest;
use Google\Service\Pubsub\TestIamPermissionsRequest;
use Google\Service\Pubsub\TestIamPermissionsResponse;
use Google\Service\Pubsub\Topic;
use Google\Service\Pubsub\UpdateTopicRequest;

/**
 * The "topics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubService = new Google\Service\Pubsub(...);
 *   $topics = $pubsubService->topics;
 *  </code>
 */
class ProjectsTopics extends \Google\Service\Resource
{
  /**
   * Creates the given topic with the given name. See the [resource name rules]
   * (https://cloud.google.com/pubsub/docs/admin#resource_names). (topics.create)
   *
   * @param string $name Required. The name of the topic. It must have the format
   * `"projects/{project}/topics/{topic}"`. `{topic}` must start with a letter,
   * and contain only letters (`[A-Za-z]`), numbers (`[0-9]`), dashes (`-`),
   * underscores (`_`), periods (`.`), tildes (`~`), plus (`+`) or percent signs
   * (`%`). It must be between 3 and 255 characters in length, and it must not
   * start with `"goog"`.
   * @param Topic $postBody
   * @param array $optParams Optional parameters.
   * @return Topic
   */
  public function create($name, Topic $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Topic::class);
  }
  /**
   * Deletes the topic with the given name. Returns `NOT_FOUND` if the topic does
   * not exist. After a topic is deleted, a new topic may be created with the same
   * name; this is an entirely new topic with none of the old configuration or
   * subscriptions. Existing subscriptions to this topic are not deleted, but
   * their `topic` field is set to `_deleted-topic_`. (topics.delete)
   *
   * @param string $topic Required. Name of the topic to delete. Format is
   * `projects/{project}/topics/{topic}`.
   * @param array $optParams Optional parameters.
   * @return PubsubEmpty
   */
  public function delete($topic, $optParams = [])
  {
    $params = ['topic' => $topic];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], PubsubEmpty::class);
  }
  /**
   * Gets the configuration of a topic. (topics.get)
   *
   * @param string $topic Required. The name of the topic to get. Format is
   * `projects/{project}/topics/{topic}`.
   * @param array $optParams Optional parameters.
   * @return Topic
   */
  public function get($topic, $optParams = [])
  {
    $params = ['topic' => $topic];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Topic::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (topics.getIamPolicy)
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
   * @return Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Lists matching topics. (topics.listProjectsTopics)
   *
   * @param string $project Required. The name of the project in which to list
   * topics. Format is `projects/{project-id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of topics to return.
   * @opt_param string pageToken The value returned by the last
   * `ListTopicsResponse`; indicates that this is a continuation of a prior
   * `ListTopics` call, and that the system should return the next page of data.
   * @return ListTopicsResponse
   */
  public function listProjectsTopics($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTopicsResponse::class);
  }
  /**
   * Updates an existing topic. Note that certain properties of a topic are not
   * modifiable. (topics.patch)
   *
   * @param string $name Required. The name of the topic. It must have the format
   * `"projects/{project}/topics/{topic}"`. `{topic}` must start with a letter,
   * and contain only letters (`[A-Za-z]`), numbers (`[0-9]`), dashes (`-`),
   * underscores (`_`), periods (`.`), tildes (`~`), plus (`+`) or percent signs
   * (`%`). It must be between 3 and 255 characters in length, and it must not
   * start with `"goog"`.
   * @param UpdateTopicRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Topic
   */
  public function patch($name, UpdateTopicRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Topic::class);
  }
  /**
   * Adds one or more messages to the topic. Returns `NOT_FOUND` if the topic does
   * not exist. (topics.publish)
   *
   * @param string $topic Required. The messages in the request will be published
   * on this topic. Format is `projects/{project}/topics/{topic}`.
   * @param PublishRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PublishResponse
   */
  public function publish($topic, PublishRequest $postBody, $optParams = [])
  {
    $params = ['topic' => $topic, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('publish', [$params], PublishResponse::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (topics.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
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
   * This operation may "fail open" without warning. (topics.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
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
class_alias(ProjectsTopics::class, 'Google_Service_Pubsub_Resource_ProjectsTopics');
