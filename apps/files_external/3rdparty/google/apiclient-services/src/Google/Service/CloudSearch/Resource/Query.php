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
 * The "query" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsearchService = new Google_Service_CloudSearch(...);
 *   $query = $cloudsearchService->query;
 *  </code>
 */
class Google_Service_CloudSearch_Resource_Query extends Google_Service_Resource
{
  /**
   * The Cloud Search Query API provides the search method, which returns the most
   * relevant results from a user query. The results can come from G Suite Apps,
   * such as Gmail or Google Drive, or they can come from data that you have
   * indexed from a third party. **Note:** This API requires a standard end user
   * account to execute. A service account can't perform Query API requests
   * directly; to use a service account to perform queries, set up [G Suite
   * domain-wide delegation of authority](https://developers.google.com/cloud-
   * search/docs/guides/delegation/). (query.search)
   *
   * @param Google_Service_CloudSearch_SearchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudSearch_SearchResponse
   */
  public function search(Google_Service_CloudSearch_SearchRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_CloudSearch_SearchResponse");
  }
  /**
   * Provides suggestions for autocompleting the query. **Note:** This API
   * requires a standard end user account to execute. A service account can't
   * perform Query API requests directly; to use a service account to perform
   * queries, set up [G Suite domain-wide delegation of
   * authority](https://developers.google.com/cloud-
   * search/docs/guides/delegation/). (query.suggest)
   *
   * @param Google_Service_CloudSearch_SuggestRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudSearch_SuggestResponse
   */
  public function suggest(Google_Service_CloudSearch_SuggestRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('suggest', array($params), "Google_Service_CloudSearch_SuggestResponse");
  }
}
