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

namespace Google\Service\DoubleClickBidManager\Resource;

use Google\Service\DoubleClickBidManager\ListReportsResponse;

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $doubleclickbidmanagerService = new Google\Service\DoubleClickBidManager(...);
 *   $reports = $doubleclickbidmanagerService->reports;
 *  </code>
 */
class Reports extends \Google\Service\Resource
{
  /**
   * Retrieves stored reports. (reports.listreports)
   *
   * @param string $queryId Query ID with which the reports are associated.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of results per page. Must be between 1
   * and 100. Defaults to 100 if unspecified.
   * @opt_param string pageToken Optional pagination token.
   * @return ListReportsResponse
   */
  public function listreports($queryId, $optParams = [])
  {
    $params = ['queryId' => $queryId];
    $params = array_merge($params, $optParams);
    return $this->call('listreports', [$params], ListReportsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Reports::class, 'Google_Service_DoubleClickBidManager_Resource_Reports');
