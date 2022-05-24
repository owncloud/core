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

namespace Google\Service\CustomSearchAPI;

class SearchQueries extends \Google\Collection
{
  protected $collection_key = 'request';
  protected $nextPageType = SearchQueriesNextPage::class;
  protected $nextPageDataType = 'array';
  protected $previousPageType = SearchQueriesPreviousPage::class;
  protected $previousPageDataType = 'array';
  protected $requestType = SearchQueriesRequest::class;
  protected $requestDataType = 'array';

  /**
   * @param SearchQueriesNextPage[]
   */
  public function setNextPage($nextPage)
  {
    $this->nextPage = $nextPage;
  }
  /**
   * @return SearchQueriesNextPage[]
   */
  public function getNextPage()
  {
    return $this->nextPage;
  }
  /**
   * @param SearchQueriesPreviousPage[]
   */
  public function setPreviousPage($previousPage)
  {
    $this->previousPage = $previousPage;
  }
  /**
   * @return SearchQueriesPreviousPage[]
   */
  public function getPreviousPage()
  {
    return $this->previousPage;
  }
  /**
   * @param SearchQueriesRequest[]
   */
  public function setRequest($request)
  {
    $this->request = $request;
  }
  /**
   * @return SearchQueriesRequest[]
   */
  public function getRequest()
  {
    return $this->request;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchQueries::class, 'Google_Service_CustomSearchAPI_SearchQueries');
