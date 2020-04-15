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

class Google_Service_Customsearch_SearchQueries extends Google_Collection
{
  protected $collection_key = 'request';
  protected $nextPageType = 'Google_Service_Customsearch_SearchQueriesNextPage';
  protected $nextPageDataType = 'array';
  protected $previousPageType = 'Google_Service_Customsearch_SearchQueriesPreviousPage';
  protected $previousPageDataType = 'array';
  protected $requestType = 'Google_Service_Customsearch_SearchQueriesRequest';
  protected $requestDataType = 'array';

  /**
   * @param Google_Service_Customsearch_SearchQueriesNextPage
   */
  public function setNextPage($nextPage)
  {
    $this->nextPage = $nextPage;
  }
  /**
   * @return Google_Service_Customsearch_SearchQueriesNextPage
   */
  public function getNextPage()
  {
    return $this->nextPage;
  }
  /**
   * @param Google_Service_Customsearch_SearchQueriesPreviousPage
   */
  public function setPreviousPage($previousPage)
  {
    $this->previousPage = $previousPage;
  }
  /**
   * @return Google_Service_Customsearch_SearchQueriesPreviousPage
   */
  public function getPreviousPage()
  {
    return $this->previousPage;
  }
  /**
   * @param Google_Service_Customsearch_SearchQueriesRequest
   */
  public function setRequest($request)
  {
    $this->request = $request;
  }
  /**
   * @return Google_Service_Customsearch_SearchQueriesRequest
   */
  public function getRequest()
  {
    return $this->request;
  }
}
