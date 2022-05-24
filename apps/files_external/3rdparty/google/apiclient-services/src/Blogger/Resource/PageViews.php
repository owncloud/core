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

use Google\Service\Blogger\Pageviews as PageviewsModel;

/**
 * The "pageViews" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google\Service\Blogger(...);
 *   $pageViews = $bloggerService->pageViews;
 *  </code>
 */
class PageViews extends \Google\Service\Resource
{
  /**
   * Gets page views by blog id. (pageViews.get)
   *
   * @param string $blogId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string range
   * @return PageviewsModel
   */
  public function get($blogId, $optParams = [])
  {
    $params = ['blogId' => $blogId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PageviewsModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PageViews::class, 'Google_Service_Blogger_Resource_PageViews');
