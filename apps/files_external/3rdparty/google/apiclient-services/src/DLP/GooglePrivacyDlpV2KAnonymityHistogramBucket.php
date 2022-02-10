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

class GooglePrivacyDlpV2KAnonymityHistogramBucket extends \Google\Collection
{
  protected $collection_key = 'bucketValues';
  /**
   * @var string
   */
  public $bucketSize;
  /**
   * @var string
   */
  public $bucketValueCount;
  protected $bucketValuesType = GooglePrivacyDlpV2KAnonymityEquivalenceClass::class;
  protected $bucketValuesDataType = 'array';
  /**
   * @var string
   */
  public $equivalenceClassSizeLowerBound;
  /**
   * @var string
   */
  public $equivalenceClassSizeUpperBound;

  /**
   * @param string
   */
  public function setBucketSize($bucketSize)
  {
    $this->bucketSize = $bucketSize;
  }
  /**
   * @return string
   */
  public function getBucketSize()
  {
    return $this->bucketSize;
  }
  /**
   * @param string
   */
  public function setBucketValueCount($bucketValueCount)
  {
    $this->bucketValueCount = $bucketValueCount;
  }
  /**
   * @return string
   */
  public function getBucketValueCount()
  {
    return $this->bucketValueCount;
  }
  /**
   * @param GooglePrivacyDlpV2KAnonymityEquivalenceClass[]
   */
  public function setBucketValues($bucketValues)
  {
    $this->bucketValues = $bucketValues;
  }
  /**
   * @return GooglePrivacyDlpV2KAnonymityEquivalenceClass[]
   */
  public function getBucketValues()
  {
    return $this->bucketValues;
  }
  /**
   * @param string
   */
  public function setEquivalenceClassSizeLowerBound($equivalenceClassSizeLowerBound)
  {
    $this->equivalenceClassSizeLowerBound = $equivalenceClassSizeLowerBound;
  }
  /**
   * @return string
   */
  public function getEquivalenceClassSizeLowerBound()
  {
    return $this->equivalenceClassSizeLowerBound;
  }
  /**
   * @param string
   */
  public function setEquivalenceClassSizeUpperBound($equivalenceClassSizeUpperBound)
  {
    $this->equivalenceClassSizeUpperBound = $equivalenceClassSizeUpperBound;
  }
  /**
   * @return string
   */
  public function getEquivalenceClassSizeUpperBound()
  {
    return $this->equivalenceClassSizeUpperBound;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2KAnonymityHistogramBucket::class, 'Google_Service_DLP_GooglePrivacyDlpV2KAnonymityHistogramBucket');
