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

class GooglePrivacyDlpV2HotwordRule extends \Google\Model
{
  protected $hotwordRegexType = GooglePrivacyDlpV2Regex::class;
  protected $hotwordRegexDataType = '';
  protected $likelihoodAdjustmentType = GooglePrivacyDlpV2LikelihoodAdjustment::class;
  protected $likelihoodAdjustmentDataType = '';
  protected $proximityType = GooglePrivacyDlpV2Proximity::class;
  protected $proximityDataType = '';

  /**
   * @param GooglePrivacyDlpV2Regex
   */
  public function setHotwordRegex(GooglePrivacyDlpV2Regex $hotwordRegex)
  {
    $this->hotwordRegex = $hotwordRegex;
  }
  /**
   * @return GooglePrivacyDlpV2Regex
   */
  public function getHotwordRegex()
  {
    return $this->hotwordRegex;
  }
  /**
   * @param GooglePrivacyDlpV2LikelihoodAdjustment
   */
  public function setLikelihoodAdjustment(GooglePrivacyDlpV2LikelihoodAdjustment $likelihoodAdjustment)
  {
    $this->likelihoodAdjustment = $likelihoodAdjustment;
  }
  /**
   * @return GooglePrivacyDlpV2LikelihoodAdjustment
   */
  public function getLikelihoodAdjustment()
  {
    return $this->likelihoodAdjustment;
  }
  /**
   * @param GooglePrivacyDlpV2Proximity
   */
  public function setProximity(GooglePrivacyDlpV2Proximity $proximity)
  {
    $this->proximity = $proximity;
  }
  /**
   * @return GooglePrivacyDlpV2Proximity
   */
  public function getProximity()
  {
    return $this->proximity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2HotwordRule::class, 'Google_Service_DLP_GooglePrivacyDlpV2HotwordRule');
