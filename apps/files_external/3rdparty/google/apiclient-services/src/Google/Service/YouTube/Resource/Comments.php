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
 * The "comments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $comments = $youtubeService->comments;
 *  </code>
 */
class Google_Service_YouTube_Resource_Comments extends Google_Service_Resource
{
  /**
   * Deletes a resource. (comments.delete)
   *
   * @param string $id
   * @param array $optParams Optional parameters.
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Inserts a new resource into this collection. (comments.insert)
   *
   * @param string|array $part The part parameter identifies the properties that
   * the API response will include. Set the parameter value to snippet. The
   * snippet part has a quota cost of 2 units.
   * @param Google_Service_YouTube_Comment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTube_Comment
   */
  public function insert($part, Google_Service_YouTube_Comment $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_YouTube_Comment");
  }
  /**
   * Retrieves a list of resources, possibly filtered. (comments.listComments)
   *
   * @param string|array $part The part parameter specifies a comma-separated list
   * of one or more comment resource properties that the API response will
   * include.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The pageToken parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * nextPageToken and prevPageToken properties identify other pages that could be
   * retrieved.
   * @opt_param string maxResults The maxResults parameter specifies the maximum
   * number of items that should be returned in the result set.
   * @opt_param string id Returns the comments with the given IDs for One
   * Platform.
   * @opt_param string parentId Returns replies to the specified comment. Note,
   * currently YouTube features only one level of replies (ie replies to top level
   * comments). However replies to replies may be supported in the future.
   * @opt_param string textFormat The requested text format for the returned
   * comments.
   * @return Google_Service_YouTube_CommentListResponse
   */
  public function listComments($part, $optParams = array())
  {
    $params = array('part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_CommentListResponse");
  }
  /**
   * Expresses the caller's opinion that one or more comments should be flagged as
   * spam. (comments.markAsSpam)
   *
   * @param string|array $id Flags the comments with the given IDs as spam in the
   * caller's opinion.
   * @param array $optParams Optional parameters.
   */
  public function markAsSpam($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('markAsSpam', array($params));
  }
  /**
   * Sets the moderation status of one or more comments.
   * (comments.setModerationStatus)
   *
   * @param string|array $id Modifies the moderation status of the comments with
   * the given IDs
   * @param string $moderationStatus Specifies the requested moderation status.
   * Note, comments can be in statuses, which are not available through this call.
   * For example, this call does not allow to mark a comment as 'likely spam'.
   * Valid values: MODERATION_STATUS_PUBLISHED, MODERATION_STATUS_HELD_FOR_REVIEW,
   * MODERATION_STATUS_REJECTED.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool banAuthor If set to true the author of the comment gets added
   * to the ban list. This means all future comments of the author will
   * autmomatically be rejected. Only valid in combination with STATUS_REJECTED.
   */
  public function setModerationStatus($id, $moderationStatus, $optParams = array())
  {
    $params = array('id' => $id, 'moderationStatus' => $moderationStatus);
    $params = array_merge($params, $optParams);
    return $this->call('setModerationStatus', array($params));
  }
  /**
   * Updates an existing resource. (comments.update)
   *
   * @param string|array $part The part parameter identifies the properties that
   * the API response will include. You must at least include the snippet part in
   * the parameter value since that part contains all of the properties that the
   * API request can update.
   * @param Google_Service_YouTube_Comment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTube_Comment
   */
  public function update($part, Google_Service_YouTube_Comment $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_YouTube_Comment");
  }
}
