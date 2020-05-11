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

class Google_Service_CloudSearch_SearchResponse extends Google_Collection
{
  protected $collection_key = 'structuredResults';
  protected $debugInfoType = 'Google_Service_CloudSearch_ResponseDebugInfo';
  protected $debugInfoDataType = '';
  protected $errorInfoType = 'Google_Service_CloudSearch_ErrorInfo';
  protected $errorInfoDataType = '';
  protected $facetResultsType = 'Google_Service_CloudSearch_FacetResult';
  protected $facetResultsDataType = 'array';
  public $hasMoreResults;
  protected $queryInterpretationType = 'Google_Service_CloudSearch_QueryInterpretation';
  protected $queryInterpretationDataType = '';
  public $resultCountEstimate;
  public $resultCountExact;
  protected $resultCountsType = 'Google_Service_CloudSearch_ResultCounts';
  protected $resultCountsDataType = '';
  protected $resultsType = 'Google_Service_CloudSearch_SearchResult';
  protected $resultsDataType = 'array';
  protected $spellResultsType = 'Google_Service_CloudSearch_SpellResult';
  protected $spellResultsDataType = 'array';
  protected $structuredResultsType = 'Google_Service_CloudSearch_StructuredResult';
  protected $structuredResultsDataType = 'array';

  /**
   * @param Google_Service_CloudSearch_ResponseDebugInfo
   */
  public function setDebugInfo(Google_Service_CloudSearch_ResponseDebugInfo $debugInfo)
  {
    $this->debugInfo = $debugInfo;
  }
  /**
   * @return Google_Service_CloudSearch_ResponseDebugInfo
   */
  public function getDebugInfo()
  {
    return $this->debugInfo;
  }
  /**
   * @param Google_Service_CloudSearch_ErrorInfo
   */
  public function setErrorInfo(Google_Service_CloudSearch_ErrorInfo $errorInfo)
  {
    $this->errorInfo = $errorInfo;
  }
  /**
   * @return Google_Service_CloudSearch_ErrorInfo
   */
  public function getErrorInfo()
  {
    return $this->errorInfo;
  }
  /**
   * @param Google_Service_CloudSearch_FacetResult
   */
  public function setFacetResults($facetResults)
  {
    $this->facetResults = $facetResults;
  }
  /**
   * @return Google_Service_CloudSearch_FacetResult
   */
  public function getFacetResults()
  {
    return $this->facetResults;
  }
  public function setHasMoreResults($hasMoreResults)
  {
    $this->hasMoreResults = $hasMoreResults;
  }
  public function getHasMoreResults()
  {
    return $this->hasMoreResults;
  }
  /**
   * @param Google_Service_CloudSearch_QueryInterpretation
   */
  public function setQueryInterpretation(Google_Service_CloudSearch_QueryInterpretation $queryInterpretation)
  {
    $this->queryInterpretation = $queryInterpretation;
  }
  /**
   * @return Google_Service_CloudSearch_QueryInterpretation
   */
  public function getQueryInterpretation()
  {
    return $this->queryInterpretation;
  }
  public function setResultCountEstimate($resultCountEstimate)
  {
    $this->resultCountEstimate = $resultCountEstimate;
  }
  public function getResultCountEstimate()
  {
    return $this->resultCountEstimate;
  }
  public function setResultCountExact($resultCountExact)
  {
    $this->resultCountExact = $resultCountExact;
  }
  public function getResultCountExact()
  {
    return $this->resultCountExact;
  }
  /**
   * @param Google_Service_CloudSearch_ResultCounts
   */
  public function setResultCounts(Google_Service_CloudSearch_ResultCounts $resultCounts)
  {
    $this->resultCounts = $resultCounts;
  }
  /**
   * @return Google_Service_CloudSearch_ResultCounts
   */
  public function getResultCounts()
  {
    return $this->resultCounts;
  }
  /**
   * @param Google_Service_CloudSearch_SearchResult
   */
  public function setResults($results)
  {
    $this->results = $results;
  }
  /**
   * @return Google_Service_CloudSearch_SearchResult
   */
  public function getResults()
  {
    return $this->results;
  }
  /**
   * @param Google_Service_CloudSearch_SpellResult
   */
  public function setSpellResults($spellResults)
  {
    $this->spellResults = $spellResults;
  }
  /**
   * @return Google_Service_CloudSearch_SpellResult
   */
  public function getSpellResults()
  {
    return $this->spellResults;
  }
  /**
   * @param Google_Service_CloudSearch_StructuredResult
   */
  public function setStructuredResults($structuredResults)
  {
    $this->structuredResults = $structuredResults;
  }
  /**
   * @return Google_Service_CloudSearch_StructuredResult
   */
  public function getStructuredResults()
  {
    return $this->structuredResults;
  }
}
