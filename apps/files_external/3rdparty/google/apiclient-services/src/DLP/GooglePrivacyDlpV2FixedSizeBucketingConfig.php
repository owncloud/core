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

class GooglePrivacyDlpV2FixedSizeBucketingConfig extends \Google\Model
{
  public $bucketSize;
  protected $lowerBoundType = GooglePrivacyDlpV2Value::class;
  protected $lowerBoundDataType = '';
  protected $upperBoundType = GooglePrivacyDlpV2Value::class;
  protected $upperBoundDataType = '';

  public function setBucketSize($bucketSize)
  {
    $this->bucketSize = $bucketSize;
  }
  public function getBucketSize()
  {
    return $this->bucketSize;
  }
  /**
   * @param GooglePrivacyDlpV2Value
   */
  public function setLowerBound(GooglePrivacyDlpV2Value $lowerBound)
  {
    $this->lowerBound = $lowerBound;
  }
  /**
   * @return GooglePrivacyDlpV2Value
   */
  public function getLowerBound()
  {
    return $this->lowerBound;
  }
  /**
   * @param GooglePrivacyDlpV2Value
   */
  public function setUpperBound(GooglePrivacyDlpV2Value $upperBound)
  {
    $this->upperBound = $upperBound;
  }
  /**
   * @return GooglePrivacyDlpV2Value
   */
  public function getUpperBound()
  {
    return $this->upperBound;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2FixedSizeBucketingConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2FixedSizeBucketingConfig');
