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

namespace Google\Service\Contactcenterinsights\Resource;

use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1CalculateStatsResponse;
use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1Conversation;
use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1ListConversationsResponse;
use Google\Service\Contactcenterinsights\GoogleProtobufEmpty;

/**
 * The "conversations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contactcenterinsightsService = new Google\Service\Contactcenterinsights(...);
 *   $conversations = $contactcenterinsightsService->conversations;
 *  </code>
 */
class ProjectsLocationsConversations extends \Google\Service\Resource
{
  /**
   * Gets conversation statistics. (conversations.calculateStats)
   *
   * @param string $location Required. The location of the conversations.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter to reduce results to a specific subset.
   * This field is useful for getting statistics about conversations with specific
   * properties.
   * @return GoogleCloudContactcenterinsightsV1CalculateStatsResponse
   */
  public function calculateStats($location, $optParams = [])
  {
    $params = ['location' => $location];
    $params = array_merge($params, $optParams);
    return $this->call('calculateStats', [$params], GoogleCloudContactcenterinsightsV1CalculateStatsResponse::class);
  }
  /**
   * Creates a conversation. (conversations.create)
   *
   * @param string $parent Required. The parent resource of the conversation.
   * @param GoogleCloudContactcenterinsightsV1Conversation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string conversationId A unique ID for the new conversation. This
   * ID will become the final component of the conversation's resource name. If no
   * ID is specified, a server-generated ID will be used. This value should be
   * 4-64 characters and must match the regular expression `^[a-z0-9-]{4,64}$`.
   * Valid characters are `a-z-`
   * @return GoogleCloudContactcenterinsightsV1Conversation
   */
  public function create($parent, GoogleCloudContactcenterinsightsV1Conversation $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudContactcenterinsightsV1Conversation::class);
  }
  /**
   * Deletes a conversation. (conversations.delete)
   *
   * @param string $name Required. The name of the conversation to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force If set to true, all of this conversation's analyses
   * will also be deleted. Otherwise, the request will only succeed if the
   * conversation has no analyses.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets a conversation. (conversations.get)
   *
   * @param string $name Required. The name of the conversation to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view The level of details of the conversation. Default is
   * `FULL`.
   * @return GoogleCloudContactcenterinsightsV1Conversation
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudContactcenterinsightsV1Conversation::class);
  }
  /**
   * Lists conversations. (conversations.listProjectsLocationsConversations)
   *
   * @param string $parent Required. The parent resource of the conversation.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter to reduce results to a specific subset.
   * Useful for querying conversations with specific properties.
   * @opt_param int pageSize The maximum number of conversations to return in the
   * response. A valid page size ranges from 0 to 1,000 inclusive. If the page
   * size is zero or unspecified, a default page size of 100 will be chosen. Note
   * that a call might return fewer results than the requested page size.
   * @opt_param string pageToken The value returned by the last
   * `ListConversationsResponse`. This value indicates that this is a continuation
   * of a prior `ListConversations` call and that the system should return the
   * next page of data.
   * @opt_param string view The level of details of the conversation. Default is
   * `BASIC`.
   * @return GoogleCloudContactcenterinsightsV1ListConversationsResponse
   */
  public function listProjectsLocationsConversations($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudContactcenterinsightsV1ListConversationsResponse::class);
  }
  /**
   * Updates a conversation. (conversations.patch)
   *
   * @param string $name Immutable. The resource name of the conversation. Format:
   * projects/{project}/locations/{location}/conversations/{conversation}
   * @param GoogleCloudContactcenterinsightsV1Conversation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to be updated.
   * @return GoogleCloudContactcenterinsightsV1Conversation
   */
  public function patch($name, GoogleCloudContactcenterinsightsV1Conversation $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudContactcenterinsightsV1Conversation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsConversations::class, 'Google_Service_Contactcenterinsights_Resource_ProjectsLocationsConversations');
