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

class Google_Service_DLP_GooglePrivacyDlpV2KMapEstimationHistogramBucket extends Google_Collection
{
  protected $collection_key = 'bucketValues';
  public $bucketSize;
  public $bucketValueCount;
  protected $bucketValuesType = 'Google_Service_DLP_GooglePrivacyDlpV2KMapEstimationQuasiIdValues';
  protected $bucketValuesDataType = 'array';
  public $maxAnonymity;
  public $minAnonymity;

  public function setBucketSize($bucketSize)
  {
    $this->bucketSize = $bucketSize;
  }
  public function getBucketSize()
  {
    return $this->bucketSize;
  }
  public function setBucketValueCount($bucketValueCount)
  {
    $this->bucketValueCount = $bucketValueCount;
  }
  public function getBucketValueCount()
  {
    return $this->bucketValueCount;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2KMapEstimationQuasiIdValues
   */
  public function setBucketValues($bucketValues)
  {
    $this->bucketValues = $bucketValues;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2KMapEstimationQuasiIdValues
   */
  public function getBucketValues()
  {
    return $this->bucketValues;
  }
  public function setMaxAnonymity($maxAnonymity)
  {
    $this->maxAnonymity = $maxAnonymity;
  }
  public function getMaxAnonymity()
  {
    return $this->maxAnonymity;
  }
  public function setMinAnonymity($minAnonymity)
  {
    $this->minAnonymity = $minAnonymity;
  }
  public function getMinAnonymity()
  {
    return $this->minAnonymity;
  }
}
