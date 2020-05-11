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
 * The "claims" collection of methods.
 * Typical usage is:
 *  <code>
 *   $factchecktoolsService = new Google_Service_FactCheckTools(...);
 *   $claims = $factchecktoolsService->claims;
 *  </code>
 */
class Google_Service_FactCheckTools_Resource_Claims extends Google_Service_Resource
{
  /**
   * Search through fact-checked claims. (claims.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxAgeDays The maximum age of the returned search results, in
   * days. Age is determined by either claim date or review date, whichever is
   * newer.
   * @opt_param int offset An integer that specifies the current offset (that is,
   * starting result location) in search results. This field is only considered if
   * `page_token` is unset. For example, 0 means to return results starting from
   * the first matching result, and 10 means to return from the 11th result.
   * @opt_param string pageToken The pagination token. You may provide the
   * `next_page_token` returned from a previous List request, if any, in order to
   * get the next page. All other fields must have the same values as in the
   * previous request.
   * @opt_param string reviewPublisherSiteFilter The review publisher site to
   * filter results by, e.g. nytimes.com.
   * @opt_param int pageSize The pagination size. We will return up to that many
   * results. Defaults to 10 if not set.
   * @opt_param string query Textual query string. Required unless
   * `review_publisher_site_filter` is specified.
   * @opt_param string languageCode The BCP-47 language code, such as "en-US" or
   * "sr-Latn". Can be used to restrict results by language, though we do not
   * currently consider the region.
   * @return Google_Service_FactCheckTools_GoogleFactcheckingFactchecktoolsV1alpha1FactCheckedClaimSearchResponse
   */
  public function search($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_FactCheckTools_GoogleFactcheckingFactchecktoolsV1alpha1FactCheckedClaimSearchResponse");
  }
}
