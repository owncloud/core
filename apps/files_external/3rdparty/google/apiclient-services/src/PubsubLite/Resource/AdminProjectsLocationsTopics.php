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

use Google\Service\PubsubLite\ListTopicsResponse;
use Google\Service\PubsubLite\PubsubliteEmpty;
use Google\Service\PubsubLite\Topic;
use Google\Service\PubsubLite\TopicPartitions;

/**
 * The "topics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubliteService = new Google\Service\PubsubLite(...);
 *   $topics = $pubsubliteService->topics;
 *  </code>
 */
class AdminProjectsLocationsTopics extends \Google\Service\Resource
{
  /**
   * Creates a new topic. (topics.create)
   *
   * @param string $parent Required. The parent location in which to create the
   * topic. Structured like `projects/{project_number}/locations/{location}`.
   * @param Topic $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string topicId Required. The ID to use for the topic, which will
   * become the final component of the topic's name. This value is structured
   * like: `my-topic-name`.
   * @return Topic
   */
  public function create($parent, Topic $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Topic::class);
  }
  /**
   * Deletes the specified topic. (topics.delete)
   *
   * @param string $name Required. The name of the topic to delete.
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
   * Returns the topic configuration. (topics.get)
   *
   * @param string $name Required. The name of the topic whose configuration to
   * return.
   * @param array $optParams Optional parameters.
   * @return Topic
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Topic::class);
  }
  /**
   * Returns the partition information for the requested topic.
   * (topics.getPartitions)
   *
   * @param string $name Required. The topic whose partition information to
   * return.
   * @param array $optParams Optional parameters.
   * @return TopicPartitions
   */
  public function getPartitions($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getPartitions', [$params], TopicPartitions::class);
  }
  /**
   * Returns the list of topics for the given project.
   * (topics.listAdminProjectsLocationsTopics)
   *
   * @param string $parent Required. The parent whose topics are to be listed.
   * Structured like `projects/{project_number}/locations/{location}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of topics to return. The service
   * may return fewer than this value. If unset or zero, all topics for the parent
   * will be returned.
   * @opt_param string pageToken A page token, received from a previous
   * `ListTopics` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListTopics` must match the call
   * that provided the page token.
   * @return ListTopicsResponse
   */
  public function listAdminProjectsLocationsTopics($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTopicsResponse::class);
  }
  /**
   * Updates properties of the specified topic. (topics.patch)
   *
   * @param string $name The name of the topic. Structured like:
   * projects/{project_number}/locations/{location}/topics/{topic_id}
   * @param Topic $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. A mask specifying the topic fields to
   * change.
   * @return Topic
   */
  public function patch($name, Topic $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Topic::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdminProjectsLocationsTopics::class, 'Google_Service_PubsubLite_Resource_AdminProjectsLocationsTopics');
