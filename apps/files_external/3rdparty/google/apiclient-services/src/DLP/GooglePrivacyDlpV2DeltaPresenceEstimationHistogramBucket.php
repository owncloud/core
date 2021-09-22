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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2DeltaPresenceEstimationHistogramBucket extends \Google\Collection
{
  protected $collection_key = 'bucketValues';
  public $bucketSize;
  public $bucketValueCount;
  protected $bucketValuesType = GooglePrivacyDlpV2DeltaPresenceEstimationQuasiIdValues::class;
  protected $bucketValuesDataType = 'array';
  public $maxProbability;
  public $minProbability;

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
   * @param GooglePrivacyDlpV2DeltaPresenceEstimationQuasiIdValues[]
   */
  public function setBucketValues($bucketValues)
  {
    $this->bucketValues = $bucketValues;
  }
  /**
   * @return GooglePrivacyDlpV2DeltaPresenceEstimationQuasiIdValues[]
   */
  public function getBucketValues()
  {
    return $this->bucketValues;
  }
  public function setMaxProbability($maxProbability)
  {
    $this->maxProbability = $maxProbability;
  }
  public function getMaxProbability()
  {
    return $this->maxProbability;
  }
  public function setMinProbability($minProbability)
  {
    $this->minProbability = $minProbability;
  }
  public function getMinProbability()
  {
    return $this->minProbability;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2DeltaPresenceEstimationHistogramBucket::class, 'Google_Service_DLP_GooglePrivacyDlpV2DeltaPresenceEstimationHistogramBucket');
