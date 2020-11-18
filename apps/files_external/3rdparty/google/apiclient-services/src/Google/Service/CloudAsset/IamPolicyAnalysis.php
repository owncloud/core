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

class Google_Service_CloudAsset_IamPolicyAnalysis extends Google_Collection
{
  protected $collection_key = 'nonCriticalErrors';
  protected $analysisQueryType = 'Google_Service_CloudAsset_IamPolicyAnalysisQuery';
  protected $analysisQueryDataType = '';
  protected $analysisResultsType = 'Google_Service_CloudAsset_IamPolicyAnalysisResult';
  protected $analysisResultsDataType = 'array';
  public $fullyExplored;
  protected $nonCriticalErrorsType = 'Google_Service_CloudAsset_IamPolicyAnalysisState';
  protected $nonCriticalErrorsDataType = 'array';

  /**
   * @param Google_Service_CloudAsset_IamPolicyAnalysisQuery
   */
  public function setAnalysisQuery(Google_Service_CloudAsset_IamPolicyAnalysisQuery $analysisQuery)
  {
    $this->analysisQuery = $analysisQuery;
  }
  /**
   * @return Google_Service_CloudAsset_IamPolicyAnalysisQuery
   */
  public function getAnalysisQuery()
  {
    return $this->analysisQuery;
  }
  /**
   * @param Google_Service_CloudAsset_IamPolicyAnalysisResult
   */
  public function setAnalysisResults($analysisResults)
  {
    $this->analysisResults = $analysisResults;
  }
  /**
   * @return Google_Service_CloudAsset_IamPolicyAnalysisResult
   */
  public function getAnalysisResults()
  {
    return $this->analysisResults;
  }
  public function setFullyExplored($fullyExplored)
  {
    $this->fullyExplored = $fullyExplored;
  }
  public function getFullyExplored()
  {
    return $this->fullyExplored;
  }
  /**
   * @param Google_Service_CloudAsset_IamPolicyAnalysisState
   */
  public function setNonCriticalErrors($nonCriticalErrors)
  {
    $this->nonCriticalErrors = $nonCriticalErrors;
  }
  /**
   * @return Google_Service_CloudAsset_IamPolicyAnalysisState
   */
  public function getNonCriticalErrors()
  {
    return $this->nonCriticalErrors;
  }
}
