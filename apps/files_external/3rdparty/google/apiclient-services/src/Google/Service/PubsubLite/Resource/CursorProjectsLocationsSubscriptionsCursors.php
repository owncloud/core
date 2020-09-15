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
 * The "cursors" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubliteService = new Google_Service_PubsubLite(...);
 *   $cursors = $pubsubliteService->cursors;
 *  </code>
 */
class Google_Service_PubsubLite_Resource_CursorProjectsLocationsSubscriptionsCursors extends Google_Service_Resource
{
  /**
   * Returns all committed cursor information for a subscription.
   * (cursors.listCursorProjectsLocationsSubscriptionsCursors)
   *
   * @param string $parent Required. The subscription for which to retrieve
   * cursors. Structured like `projects/{project_number}/locations/{location}/subs
   * criptions/{subscription_id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A page token, received from a previous
   * `ListPartitionCursors` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `ListPartitionCursors` must
   * match the call that provided the page token.
   * @opt_param int pageSize The maximum number of cursors to return. The service
   * may return fewer than this value. If unset or zero, all cursors for the
   * parent will be returned.
   * @return Google_Service_PubsubLite_ListPartitionCursorsResponse
   */
  public function listCursorProjectsLocationsSubscriptionsCursors($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_PubsubLite_ListPartitionCursorsResponse");
  }
}
