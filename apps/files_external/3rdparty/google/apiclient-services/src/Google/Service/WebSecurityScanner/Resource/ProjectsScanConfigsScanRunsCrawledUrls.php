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
 * The "crawledUrls" collection of methods.
 * Typical usage is:
 *  <code>
 *   $websecurityscannerService = new Google_Service_WebSecurityScanner(...);
 *   $crawledUrls = $websecurityscannerService->crawledUrls;
 *  </code>
 */
class Google_Service_WebSecurityScanner_Resource_ProjectsScanConfigsScanRunsCrawledUrls extends Google_Service_Resource
{
  /**
   * List CrawledUrls under a given ScanRun.
   * (crawledUrls.listProjectsScanConfigsScanRunsCrawledUrls)
   *
   * @param string $parent Required. The parent resource name, which should be a
   * scan run resource name in the format
   * 'projects/{projectId}/scanConfigs/{scanConfigId}/scanRuns/{scanRunId}'.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A token identifying a page of results to be
   * returned. This should be a `next_page_token` value returned from a previous
   * List request. If unspecified, the first page of results is returned.
   * @opt_param int pageSize The maximum number of CrawledUrls to return, can be
   * limited by server. If not specified or not positive, the implementation will
   * select a reasonable value.
   * @return Google_Service_WebSecurityScanner_ListCrawledUrlsResponse
   */
  public function listProjectsScanConfigsScanRunsCrawledUrls($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_WebSecurityScanner_ListCrawledUrlsResponse");
  }
}
