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
 * The "records" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chromeuxreportService = new Google_Service_ChromeUXReport(...);
 *   $records = $chromeuxreportService->records;
 *  </code>
 */
class Google_Service_ChromeUXReport_Resource_Records extends Google_Service_Resource
{
  /**
   * Queries the Chrome User Experience for a single `record` for a given site.
   * Returns a `record` that contains one or more `metrics` corresponding to
   * performance data about the requested site. (records.queryRecord)
   *
   * @param Google_Service_ChromeUXReport_QueryRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ChromeUXReport_QueryResponse
   */
  public function queryRecord(Google_Service_ChromeUXReport_QueryRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('queryRecord', array($params), "Google_Service_ChromeUXReport_QueryResponse");
  }
}
