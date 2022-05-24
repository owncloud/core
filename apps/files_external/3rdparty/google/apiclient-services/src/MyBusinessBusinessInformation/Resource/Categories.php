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

namespace Google\Service\MyBusinessBusinessInformation\Resource;

use Google\Service\MyBusinessBusinessInformation\BatchGetCategoriesResponse;
use Google\Service\MyBusinessBusinessInformation\ListCategoriesResponse;

/**
 * The "categories" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessbusinessinformationService = new Google\Service\MyBusinessBusinessInformation(...);
 *   $categories = $mybusinessbusinessinformationService->categories;
 *  </code>
 */
class Categories extends \Google\Service\Resource
{
  /**
   * Returns a list of business categories for the provided language and GConcept
   * ids. (categories.batchGet)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode Required. The BCP 47 code of language that the
   * category names should be returned in.
   * @opt_param string names Required. At least one name must be set. The GConcept
   * ids the localized category names should be returned for. To return details
   * for more than one category, repeat this parameter in the request.
   * @opt_param string regionCode Optional. The ISO 3166-1 alpha-2 country code
   * used to infer non-standard language.
   * @opt_param string view Required. Specifies which parts to the Category
   * resource should be returned in the response.
   * @return BatchGetCategoriesResponse
   */
  public function batchGet($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', [$params], BatchGetCategoriesResponse::class);
  }
  /**
   * Returns a list of business categories. Search will match the category name
   * but not the category ID. Search only matches the front of a category name
   * (that is, 'food' may return 'Food Court' but not 'Fast Food Restaurant').
   * (categories.listCategories)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter string from user. The only field
   * that supported is `displayName`. Eg: `filter=displayName=foo`.
   * @opt_param string languageCode Required. The BCP 47 code of language.
   * @opt_param int pageSize Optional. How many categories to fetch per page.
   * Default is 100, minimum is 1, and maximum page size is 100.
   * @opt_param string pageToken Optional. If specified, the next page of
   * categories will be fetched.
   * @opt_param string regionCode Required. The ISO 3166-1 alpha-2 country code.
   * @opt_param string view Required. Specifies which parts to the Category
   * resource should be returned in the response.
   * @return ListCategoriesResponse
   */
  public function listCategories($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCategoriesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Categories::class, 'Google_Service_MyBusinessBusinessInformation_Resource_Categories');
