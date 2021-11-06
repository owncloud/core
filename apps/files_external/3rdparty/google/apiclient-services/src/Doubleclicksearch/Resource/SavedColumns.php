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

namespace Google\Service\Doubleclicksearch\Resource;

use Google\Service\Doubleclicksearch\SavedColumnList;

/**
 * The "savedColumns" collection of methods.
 * Typical usage is:
 *  <code>
 *   $doubleclicksearchService = new Google\Service\Doubleclicksearch(...);
 *   $savedColumns = $doubleclicksearchService->savedColumns;
 *  </code>
 */
class SavedColumns extends \Google\Service\Resource
{
  /**
   * Retrieve the list of saved columns for a specified advertiser.
   * (savedColumns.listSavedColumns)
   *
   * @param string $agencyId DS ID of the agency.
   * @param string $advertiserId DS ID of the advertiser.
   * @param array $optParams Optional parameters.
   * @return SavedColumnList
   */
  public function listSavedColumns($agencyId, $advertiserId, $optParams = [])
  {
    $params = ['agencyId' => $agencyId, 'advertiserId' => $advertiserId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], SavedColumnList::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SavedColumns::class, 'Google_Service_Doubleclicksearch_Resource_SavedColumns');
