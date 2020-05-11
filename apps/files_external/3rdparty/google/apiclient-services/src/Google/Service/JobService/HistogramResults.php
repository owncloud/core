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

class Google_Service_JobService_HistogramResults extends Google_Collection
{
  protected $collection_key = 'simpleHistogramResults';
  protected $compensationHistogramResultsType = 'Google_Service_JobService_CompensationHistogramResult';
  protected $compensationHistogramResultsDataType = 'array';
  protected $customAttributeHistogramResultsType = 'Google_Service_JobService_CustomAttributeHistogramResult';
  protected $customAttributeHistogramResultsDataType = 'array';
  protected $simpleHistogramResultsType = 'Google_Service_JobService_HistogramResult';
  protected $simpleHistogramResultsDataType = 'array';

  /**
   * @param Google_Service_JobService_CompensationHistogramResult
   */
  public function setCompensationHistogramResults($compensationHistogramResults)
  {
    $this->compensationHistogramResults = $compensationHistogramResults;
  }
  /**
   * @return Google_Service_JobService_CompensationHistogramResult
   */
  public function getCompensationHistogramResults()
  {
    return $this->compensationHistogramResults;
  }
  /**
   * @param Google_Service_JobService_CustomAttributeHistogramResult
   */
  public function setCustomAttributeHistogramResults($customAttributeHistogramResults)
  {
    $this->customAttributeHistogramResults = $customAttributeHistogramResults;
  }
  /**
   * @return Google_Service_JobService_CustomAttributeHistogramResult
   */
  public function getCustomAttributeHistogramResults()
  {
    return $this->customAttributeHistogramResults;
  }
  /**
   * @param Google_Service_JobService_HistogramResult
   */
  public function setSimpleHistogramResults($simpleHistogramResults)
  {
    $this->simpleHistogramResults = $simpleHistogramResults;
  }
  /**
   * @return Google_Service_JobService_HistogramResult
   */
  public function getSimpleHistogramResults()
  {
    return $this->simpleHistogramResults;
  }
}
