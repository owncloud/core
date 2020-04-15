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

class Google_Service_JobService_CustomAttributeHistogramResult extends Google_Model
{
  public $key;
  protected $longValueHistogramResultType = 'Google_Service_JobService_NumericBucketingResult';
  protected $longValueHistogramResultDataType = '';
  public $stringValueHistogramResult;

  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param Google_Service_JobService_NumericBucketingResult
   */
  public function setLongValueHistogramResult(Google_Service_JobService_NumericBucketingResult $longValueHistogramResult)
  {
    $this->longValueHistogramResult = $longValueHistogramResult;
  }
  /**
   * @return Google_Service_JobService_NumericBucketingResult
   */
  public function getLongValueHistogramResult()
  {
    return $this->longValueHistogramResult;
  }
  public function setStringValueHistogramResult($stringValueHistogramResult)
  {
    $this->stringValueHistogramResult = $stringValueHistogramResult;
  }
  public function getStringValueHistogramResult()
  {
    return $this->stringValueHistogramResult;
  }
}
