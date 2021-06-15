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
class Google_Service_PubsubLite_Resource_CursorProjectsLocationsSubscriptions extends Google_Service_Resource
{
  /**
   * Updates the committed cursor. (subscriptions.commitCursor)
   *
   * @param string $subscription The subscription for which to update the cursor.
   * @param Google_Service_PubsubLite_CommitCursorRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PubsubLite_CommitCursorResponse
   */
  public function commitCursor($subscription, Google_Service_PubsubLite_CommitCursorRequest $postBody, $optParams = array())
  {
    $params = array('subscription' => $subscription, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('commitCursor', array($params), "Google_Service_PubsubLite_CommitCursorResponse");
  }
}
