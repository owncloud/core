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
 * The "feeds" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudassetService = new Google_Service_CloudAsset(...);
 *   $feeds = $cloudassetService->feeds;
 *  </code>
 */
class Google_Service_CloudAsset_Resource_Feeds extends Google_Service_Resource
{
  /**
   * Creates a feed in a parent project/folder/organization to listen to its asset
   * updates. (feeds.create)
   *
   * @param string $parent Required. The name of the project/folder/organization
   * where this feed should be created in. It can only be an organization number
   * (such as "organizations/123"), a folder number (such as "folders/123"), a
   * project ID (such as "projects/my-project-id")", or a project number (such as
   * "projects/12345").
   * @param Google_Service_CloudAsset_CreateFeedRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudAsset_Feed
   */
  public function create($parent, Google_Service_CloudAsset_CreateFeedRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudAsset_Feed");
  }
  /**
   * Deletes an asset feed. (feeds.delete)
   *
   * @param string $name Required. The name of the feed and it must be in the
   * format of: projects/project_number/feeds/feed_id
   * folders/folder_number/feeds/feed_id
   * organizations/organization_number/feeds/feed_id
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudAsset_CloudassetEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudAsset_CloudassetEmpty");
  }
  /**
   * Gets details about an asset feed. (feeds.get)
   *
   * @param string $name Required. The name of the Feed and it must be in the
   * format of: projects/project_number/feeds/feed_id
   * folders/folder_number/feeds/feed_id
   * organizations/organization_number/feeds/feed_id
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudAsset_Feed
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudAsset_Feed");
  }
  /**
   * Lists all asset feeds in a parent project/folder/organization.
   * (feeds.listFeeds)
   *
   * @param string $parent Required. The parent project/folder/organization whose
   * feeds are to be listed. It can only be using project/folder/organization
   * number (such as "folders/12345")", or a project ID (such as "projects/my-
   * project-id").
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudAsset_ListFeedsResponse
   */
  public function listFeeds($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudAsset_ListFeedsResponse");
  }
  /**
   * Updates an asset feed configuration. (feeds.patch)
   *
   * @param string $name Required. The format will be
   * projects/{project_number}/feeds/{client-assigned_feed_identifier} or
   * folders/{folder_number}/feeds/{client-assigned_feed_identifier} or
   * organizations/{organization_number}/feeds/{client-assigned_feed_identifier}
   *
   * The client-assigned feed identifier must be unique within the parent
   * project/folder/organization.
   * @param Google_Service_CloudAsset_UpdateFeedRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudAsset_Feed
   */
  public function patch($name, Google_Service_CloudAsset_UpdateFeedRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudAsset_Feed");
  }
}
