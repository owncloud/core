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

class GooglePrivacyDlpV2PubSubCondition extends \Google\Model
{
  /**
   * @var string
   */
  public $minimumRiskScore;
  /**
   * @var string
   */
  public $minimumSensitivityScore;

  /**
   * @param string
   */
  public function setMinimumRiskScore($minimumRiskScore)
  {
    $this->minimumRiskScore = $minimumRiskScore;
  }
  /**
   * @return string
   */
  public function getMinimumRiskScore()
  {
    return $this->minimumRiskScore;
  }
  /**
   * @param string
   */
  public function setMinimumSensitivityScore($minimumSensitivityScore)
  {
    $this->minimumSensitivityScore = $minimumSensitivityScore;
  }
  /**
   * @return string
   */
  public function getMinimumSensitivityScore()
  {
    return $this->minimumSensitivityScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2PubSubCondition::class, 'Google_Service_DLP_GooglePrivacyDlpV2PubSubCondition');
