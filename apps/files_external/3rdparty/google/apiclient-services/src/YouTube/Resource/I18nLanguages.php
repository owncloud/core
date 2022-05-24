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

namespace Google\Service\YouTube\Resource;

use Google\Service\YouTube\I18nLanguageListResponse;

/**
 * The "i18nLanguages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google\Service\YouTube(...);
 *   $i18nLanguages = $youtubeService->i18nLanguages;
 *  </code>
 */
class I18nLanguages extends \Google\Service\Resource
{
  /**
   * Retrieves a list of resources, possibly filtered.
   * (i18nLanguages.listI18nLanguages)
   *
   * @param string|array $part The *part* parameter specifies the i18nLanguage
   * resource properties that the API response will include. Set the parameter
   * value to snippet.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string hl
   * @return I18nLanguageListResponse
   */
  public function listI18nLanguages($part, $optParams = [])
  {
    $params = ['part' => $part];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], I18nLanguageListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(I18nLanguages::class, 'Google_Service_YouTube_Resource_I18nLanguages');
