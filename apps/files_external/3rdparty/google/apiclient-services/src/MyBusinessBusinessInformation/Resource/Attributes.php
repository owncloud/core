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

use Google\Service\MyBusinessBusinessInformation\ListAttributeMetadataResponse;

/**
 * The "attributes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessbusinessinformationService = new Google\Service\MyBusinessBusinessInformation(...);
 *   $attributes = $mybusinessbusinessinformationService->attributes;
 *  </code>
 */
class Attributes extends \Google\Service\Resource
{
  /**
   * Returns the list of attributes that would be available for a location with
   * the given primary category and country. (attributes.listAttributes)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string categoryName The primary category stable ID to find
   * available attributes. Must be of the format categories/{category_id}.
   * @opt_param string languageCode The BCP 47 code of language to get attribute
   * display names in. If this language is not available, they will be provided in
   * English.
   * @opt_param int pageSize How many attributes to include per page. Default is
   * 200, minimum is 1.
   * @opt_param string pageToken If specified, the next page of attribute metadata
   * is retrieved.
   * @opt_param string parent Resource name of the location to look up available
   * attributes. If this field is set, category_name, region_code, language_code
   * and show_all are not required and must not be set.
   * @opt_param string regionCode The ISO 3166-1 alpha-2 country code to find
   * available attributes.
   * @opt_param bool showAll Metadata for all available attributes are returned
   * when this field is set to true, disregarding parent and category_name fields.
   * language_code and region_code are required when show_all is set to true.
   * @return ListAttributeMetadataResponse
   */
  public function listAttributes($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAttributeMetadataResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Attributes::class, 'Google_Service_MyBusinessBusinessInformation_Resource_Attributes');
