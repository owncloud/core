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

class Google_Service_DLP_GooglePrivacyDlpV2HotwordRule extends Google_Model
{
  protected $hotwordRegexType = 'Google_Service_DLP_GooglePrivacyDlpV2Regex';
  protected $hotwordRegexDataType = '';
  protected $likelihoodAdjustmentType = 'Google_Service_DLP_GooglePrivacyDlpV2LikelihoodAdjustment';
  protected $likelihoodAdjustmentDataType = '';
  protected $proximityType = 'Google_Service_DLP_GooglePrivacyDlpV2Proximity';
  protected $proximityDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Regex
   */
  public function setHotwordRegex(Google_Service_DLP_GooglePrivacyDlpV2Regex $hotwordRegex)
  {
    $this->hotwordRegex = $hotwordRegex;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Regex
   */
  public function getHotwordRegex()
  {
    return $this->hotwordRegex;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2LikelihoodAdjustment
   */
  public function setLikelihoodAdjustment(Google_Service_DLP_GooglePrivacyDlpV2LikelihoodAdjustment $likelihoodAdjustment)
  {
    $this->likelihoodAdjustment = $likelihoodAdjustment;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2LikelihoodAdjustment
   */
  public function getLikelihoodAdjustment()
  {
    return $this->likelihoodAdjustment;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Proximity
   */
  public function setProximity(Google_Service_DLP_GooglePrivacyDlpV2Proximity $proximity)
  {
    $this->proximity = $proximity;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Proximity
   */
  public function getProximity()
  {
    return $this->proximity;
  }
}
