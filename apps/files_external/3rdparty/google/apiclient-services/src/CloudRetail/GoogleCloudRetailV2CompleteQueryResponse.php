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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2CompleteQueryResponse extends \Google\Collection
{
  protected $collection_key = 'recentSearchResults';
  public $attributionToken;
  protected $completionResultsType = GoogleCloudRetailV2CompleteQueryResponseCompletionResult::class;
  protected $completionResultsDataType = 'array';
  protected $recentSearchResultsType = GoogleCloudRetailV2CompleteQueryResponseRecentSearchResult::class;
  protected $recentSearchResultsDataType = 'array';

  public function setAttributionToken($attributionToken)
  {
    $this->attributionToken = $attributionToken;
  }
  public function getAttributionToken()
  {
    return $this->attributionToken;
  }
  /**
   * @param GoogleCloudRetailV2CompleteQueryResponseCompletionResult[]
   */
  public function setCompletionResults($completionResults)
  {
    $this->completionResults = $completionResults;
  }
  /**
   * @return GoogleCloudRetailV2CompleteQueryResponseCompletionResult[]
   */
  public function getCompletionResults()
  {
    return $this->completionResults;
  }
  /**
   * @param GoogleCloudRetailV2CompleteQueryResponseRecentSearchResult[]
   */
  public function setRecentSearchResults($recentSearchResults)
  {
    $this->recentSearchResults = $recentSearchResults;
  }
  /**
   * @return GoogleCloudRetailV2CompleteQueryResponseRecentSearchResult[]
   */
  public function getRecentSearchResults()
  {
    return $this->recentSearchResults;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2CompleteQueryResponse::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2CompleteQueryResponse');
