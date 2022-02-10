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

class SearchSearchInformation extends \Google\Model
{
  /**
   * @var string
   */
  public $formattedSearchTime;
  /**
   * @var string
   */
  public $formattedTotalResults;
  public $searchTime;
  /**
   * @var string
   */
  public $totalResults;

  /**
   * @param string
   */
  public function setFormattedSearchTime($formattedSearchTime)
  {
    $this->formattedSearchTime = $formattedSearchTime;
  }
  /**
   * @return string
   */
  public function getFormattedSearchTime()
  {
    return $this->formattedSearchTime;
  }
  /**
   * @param string
   */
  public function setFormattedTotalResults($formattedTotalResults)
  {
    $this->formattedTotalResults = $formattedTotalResults;
  }
  /**
   * @return string
   */
  public function getFormattedTotalResults()
  {
    return $this->formattedTotalResults;
  }
  public function setSearchTime($searchTime)
  {
    $this->searchTime = $searchTime;
  }
  public function getSearchTime()
  {
    return $this->searchTime;
  }
  /**
   * @param string
   */
  public function setTotalResults($totalResults)
  {
    $this->totalResults = $totalResults;
  }
  /**
   * @return string
   */
  public function getTotalResults()
  {
    return $this->totalResults;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchSearchInformation::class, 'Google_Service_CustomSearchAPI_SearchSearchInformation');
