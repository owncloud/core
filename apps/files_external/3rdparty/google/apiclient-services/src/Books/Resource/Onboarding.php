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

namespace Google\Service\Books\Resource;

use Google\Service\Books\Category;
use Google\Service\Books\Volume2;

/**
 * The "onboarding" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google\Service\Books(...);
 *   $onboarding = $booksService->onboarding;
 *  </code>
 */
class Onboarding extends \Google\Service\Resource
{
  /**
   * List categories for onboarding experience. (onboarding.listCategories)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locale ISO-639-1 language and ISO-3166-1 country code.
   * Default is en-US if unset.
   * @return Category
   */
  public function listCategories($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('listCategories', [$params], Category::class);
  }
  /**
   * List available volumes under categories for onboarding experience.
   * (onboarding.listCategoryVolumes)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string categoryId List of category ids requested.
   * @opt_param string locale ISO-639-1 language and ISO-3166-1 country code.
   * Default is en-US if unset.
   * @opt_param string maxAllowedMaturityRating The maximum allowed maturity
   * rating of returned volumes. Books with a higher maturity rating are filtered
   * out.
   * @opt_param string pageSize Number of maximum results per page to be included
   * in the response.
   * @opt_param string pageToken The value of the nextToken from the previous
   * page.
   * @return Volume2
   */
  public function listCategoryVolumes($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('listCategoryVolumes', [$params], Volume2::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Onboarding::class, 'Google_Service_Books_Resource_Onboarding');
