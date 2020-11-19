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
 * The "topics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubliteService = new Google_Service_PubsubLite(...);
 *   $topics = $pubsubliteService->topics;
 *  </code>
 */
class Google_Service_PubsubLite_Resource_AdminProjectsLocationsTopics extends Google_Service_Resource
{
  /**
   * Creates a new topic. (topics.create)
   *
   * @param string $parent Required. The parent location in which to create the
   * topic. Structured like `projects/{project_number}/locations/{location}`.
   * @param Google_Service_PubsubLite_Topic $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string topicId Required. The ID to use for the topic, which will
   * become the final component of the topic's name. This value is structured
   * like: `my-topic-name`.
   * @return Google_Service_PubsubLite_Topic
   */
  public function create($parent, Google_Service_PubsubLite_Topic $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_PubsubLite_Topic");
  }
  /**
   * Deletes the specified topic. (topics.delete)
   *
   * @param string $name Required. The name of the topic to delete.
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
   * Returns the topic configuration. (topics.get)
   *
   * @param string $name Required. The name of the topic whose configuration to
   * return.
   * @param array $optParams Optional parameters.
   * @return Google_Service_PubsubLite_Topic
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_PubsubLite_Topic");
  }
  /**
   * Returns the partition information for the requested topic.
   * (topics.getPartitions)
   *
   * @param string $name Required. The topic whose partition information to
   * return.
   * @param array $optParams Optional parameters.
   * @return Google_Service_PubsubLite_TopicPartitions
   */
  public function getPartitions($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getPartitions', array($params), "Google_Service_PubsubLite_TopicPartitions");
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
   * @return Google_Service_PubsubLite_ListTopicsResponse
   */
  public function listAdminProjectsLocationsTopics($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_PubsubLite_ListTopicsResponse");
  }
  /**
   * Updates properties of the specified topic. (topics.patch)
   *
   * @param string $name The name of the topic. Structured like:
   * projects/{project_number}/locations/{location}/topics/{topic_id}
   * @param Google_Service_PubsubLite_Topic $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. A mask specifying the topic fields to
   * change.
   * @return Google_Service_PubsubLite_Topic
   */
  public function patch($name, Google_Service_PubsubLite_Topic $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_PubsubLite_Topic");
  }
}
