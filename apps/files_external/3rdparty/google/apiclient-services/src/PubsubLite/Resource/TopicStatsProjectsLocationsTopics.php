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

use Google\Service\PubsubLite\ComputeHeadCursorRequest;
use Google\Service\PubsubLite\ComputeHeadCursorResponse;
use Google\Service\PubsubLite\ComputeMessageStatsRequest;
use Google\Service\PubsubLite\ComputeMessageStatsResponse;
use Google\Service\PubsubLite\ComputeTimeCursorRequest;
use Google\Service\PubsubLite\ComputeTimeCursorResponse;

/**
 * The "topics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubliteService = new Google\Service\PubsubLite(...);
 *   $topics = $pubsubliteService->topics;
 *  </code>
 */
class TopicStatsProjectsLocationsTopics extends \Google\Service\Resource
{
  /**
   * Compute the head cursor for the partition. The head cursor's offset is
   * guaranteed to be less than or equal to all messages which have not yet been
   * acknowledged as published, and greater than the offset of any message whose
   * publish has already been acknowledged. It is zero if there have never been
   * messages in the partition. (topics.computeHeadCursor)
   *
   * @param string $topic Required. The topic for which we should compute the head
   * cursor.
   * @param ComputeHeadCursorRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ComputeHeadCursorResponse
   */
  public function computeHeadCursor($topic, ComputeHeadCursorRequest $postBody, $optParams = [])
  {
    $params = ['topic' => $topic, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('computeHeadCursor', [$params], ComputeHeadCursorResponse::class);
  }
  /**
   * Compute statistics about a range of messages in a given topic and partition.
   * (topics.computeMessageStats)
   *
   * @param string $topic Required. The topic for which we should compute message
   * stats.
   * @param ComputeMessageStatsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ComputeMessageStatsResponse
   */
  public function computeMessageStats($topic, ComputeMessageStatsRequest $postBody, $optParams = [])
  {
    $params = ['topic' => $topic, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('computeMessageStats', [$params], ComputeMessageStatsResponse::class);
  }
  /**
   * Compute the corresponding cursor for a publish or event time in a topic
   * partition. (topics.computeTimeCursor)
   *
   * @param string $topic Required. The topic for which we should compute the
   * cursor.
   * @param ComputeTimeCursorRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ComputeTimeCursorResponse
   */
  public function computeTimeCursor($topic, ComputeTimeCursorRequest $postBody, $optParams = [])
  {
    $params = ['topic' => $topic, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('computeTimeCursor', [$params], ComputeTimeCursorResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TopicStatsProjectsLocationsTopics::class, 'Google_Service_PubsubLite_Resource_TopicStatsProjectsLocationsTopics');
