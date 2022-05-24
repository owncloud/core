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

use Google\Service\Pubsub\ListTopicSnapshotsResponse;

/**
 * The "snapshots" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubService = new Google\Service\Pubsub(...);
 *   $snapshots = $pubsubService->snapshots;
 *  </code>
 */
class ProjectsTopicsSnapshots extends \Google\Service\Resource
{
  /**
   * Lists the names of the snapshots on this topic. Snapshots are used in
   * [Seek](https://cloud.google.com/pubsub/docs/replay-overview) operations,
   * which allow you to manage message acknowledgments in bulk. That is, you can
   * set the acknowledgment state of messages in an existing subscription to the
   * state captured by a snapshot. (snapshots.listProjectsTopicsSnapshots)
   *
   * @param string $topic Required. The name of the topic that snapshots are
   * attached to. Format is `projects/{project}/topics/{topic}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of snapshot names to return.
   * @opt_param string pageToken The value returned by the last
   * `ListTopicSnapshotsResponse`; indicates that this is a continuation of a
   * prior `ListTopicSnapshots` call, and that the system should return the next
   * page of data.
   * @return ListTopicSnapshotsResponse
   */
  public function listProjectsTopicsSnapshots($topic, $optParams = [])
  {
    $params = ['topic' => $topic];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTopicSnapshotsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsTopicsSnapshots::class, 'Google_Service_Pubsub_Resource_ProjectsTopicsSnapshots');
