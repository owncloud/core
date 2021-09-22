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

namespace Google\Service\Vision;

class GoogleCloudVisionV1p3beta1ProductSearchResults extends \Google\Collection
{
  protected $collection_key = 'results';
  public $indexTime;
  protected $productGroupedResultsType = GoogleCloudVisionV1p3beta1ProductSearchResultsGroupedResult::class;
  protected $productGroupedResultsDataType = 'array';
  protected $resultsType = GoogleCloudVisionV1p3beta1ProductSearchResultsResult::class;
  protected $resultsDataType = 'array';

  public function setIndexTime($indexTime)
  {
    $this->indexTime = $indexTime;
  }
  public function getIndexTime()
  {
    return $this->indexTime;
  }
  /**
   * @param GoogleCloudVisionV1p3beta1ProductSearchResultsGroupedResult[]
   */
  public function setProductGroupedResults($productGroupedResults)
  {
    $this->productGroupedResults = $productGroupedResults;
  }
  /**
   * @return GoogleCloudVisionV1p3beta1ProductSearchResultsGroupedResult[]
   */
  public function getProductGroupedResults()
  {
    return $this->productGroupedResults;
  }
  /**
   * @param GoogleCloudVisionV1p3beta1ProductSearchResultsResult[]
   */
  public function setResults($results)
  {
    $this->results = $results;
  }
  /**
   * @return GoogleCloudVisionV1p3beta1ProductSearchResultsResult[]
   */
  public function getResults()
  {
    return $this->results;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p3beta1ProductSearchResults::class, 'Google_Service_Vision_GoogleCloudVisionV1p3beta1ProductSearchResults');
