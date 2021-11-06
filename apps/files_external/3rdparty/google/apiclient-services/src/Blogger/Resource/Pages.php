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

namespace Google\Service\Blogger\Resource;

use Google\Service\Blogger\Page;
use Google\Service\Blogger\PageList;

/**
 * The "pages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google\Service\Blogger(...);
 *   $pages = $bloggerService->pages;
 *  </code>
 */
class Pages extends \Google\Service\Resource
{
  /**
   * Deletes a page by blog id and page id. (pages.delete)
   *
   * @param string $blogId
   * @param string $pageId
   * @param array $optParams Optional parameters.
   */
  public function delete($blogId, $pageId, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'pageId' => $pageId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets a page by blog id and page id. (pages.get)
   *
   * @param string $blogId
   * @param string $pageId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view
   * @return Page
   */
  public function get($blogId, $pageId, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'pageId' => $pageId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Page::class);
  }
  /**
   * Inserts a page. (pages.insert)
   *
   * @param string $blogId
   * @param Page $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool isDraft
   * @return Page
   */
  public function insert($blogId, Page $postBody, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Page::class);
  }
  /**
   * Lists pages. (pages.listPages)
   *
   * @param string $blogId
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool fetchBodies
   * @opt_param string maxResults
   * @opt_param string pageToken
   * @opt_param string status
   * @opt_param string view
   * @return PageList
   */
  public function listPages($blogId, $optParams = [])
  {
    $params = ['blogId' => $blogId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], PageList::class);
  }
  /**
   * Patches a page. (pages.patch)
   *
   * @param string $blogId
   * @param string $pageId
   * @param Page $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool publish
   * @opt_param bool revert
   * @return Page
   */
  public function patch($blogId, $pageId, Page $postBody, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'pageId' => $pageId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Page::class);
  }
  /**
   * Publishes a page. (pages.publish)
   *
   * @param string $blogId
   * @param string $pageId
   * @param array $optParams Optional parameters.
   * @return Page
   */
  public function publish($blogId, $pageId, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'pageId' => $pageId];
    $params = array_merge($params, $optParams);
    return $this->call('publish', [$params], Page::class);
  }
  /**
   * Reverts a published or scheduled page to draft state. (pages.revert)
   *
   * @param string $blogId
   * @param string $pageId
   * @param array $optParams Optional parameters.
   * @return Page
   */
  public function revert($blogId, $pageId, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'pageId' => $pageId];
    $params = array_merge($params, $optParams);
    return $this->call('revert', [$params], Page::class);
  }
  /**
   * Updates a page by blog id and page id. (pages.update)
   *
   * @param string $blogId
   * @param string $pageId
   * @param Page $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool publish
   * @opt_param bool revert
   * @return Page
   */
  public function update($blogId, $pageId, Page $postBody, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'pageId' => $pageId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Page::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Pages::class, 'Google_Service_Blogger_Resource_Pages');
