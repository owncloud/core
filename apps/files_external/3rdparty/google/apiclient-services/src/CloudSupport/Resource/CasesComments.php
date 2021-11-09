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

namespace Google\Service\CloudSupport\Resource;

use Google\Service\CloudSupport\Comment;
use Google\Service\CloudSupport\ListCommentsResponse;

/**
 * The "comments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsupportService = new Google\Service\CloudSupport(...);
 *   $comments = $cloudsupportService->comments;
 *  </code>
 */
class CasesComments extends \Google\Service\Resource
{
  /**
   * Add a new comment to the specified Case. (comments.create)
   *
   * @param string $parent Required. The resource name of Case to which this
   * comment should be added.
   * @param Comment $postBody
   * @param array $optParams Optional parameters.
   * @return Comment
   */
  public function create($parent, Comment $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Comment::class);
  }
  /**
   * Retrieve all Comments associated with the Case object.
   * (comments.listCasesComments)
   *
   * @param string $parent Required. The resource name of Case object for which
   * comments should be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of comments fetched with each
   * request. Defaults to 10.
   * @opt_param string pageToken A token identifying the page of results to
   * return. If unspecified, the first page is retrieved.
   * @return ListCommentsResponse
   */
  public function listCasesComments($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCommentsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CasesComments::class, 'Google_Service_CloudSupport_Resource_CasesComments');
