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

class Google_Service_DLP_GooglePrivacyDlpV2PrivacyMetric extends Google_Model
{
  protected $categoricalStatsConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2CategoricalStatsConfig';
  protected $categoricalStatsConfigDataType = '';
  protected $deltaPresenceEstimationConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2DeltaPresenceEstimationConfig';
  protected $deltaPresenceEstimationConfigDataType = '';
  protected $kAnonymityConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2KAnonymityConfig';
  protected $kAnonymityConfigDataType = '';
  protected $kMapEstimationConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2KMapEstimationConfig';
  protected $kMapEstimationConfigDataType = '';
  protected $lDiversityConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2LDiversityConfig';
  protected $lDiversityConfigDataType = '';
  protected $numericalStatsConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2NumericalStatsConfig';
  protected $numericalStatsConfigDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2CategoricalStatsConfig
   */
  public function setCategoricalStatsConfig(Google_Service_DLP_GooglePrivacyDlpV2CategoricalStatsConfig $categoricalStatsConfig)
  {
    $this->categoricalStatsConfig = $categoricalStatsConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2CategoricalStatsConfig
   */
  public function getCategoricalStatsConfig()
  {
    return $this->categoricalStatsConfig;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2DeltaPresenceEstimationConfig
   */
  public function setDeltaPresenceEstimationConfig(Google_Service_DLP_GooglePrivacyDlpV2DeltaPresenceEstimationConfig $deltaPresenceEstimationConfig)
  {
    $this->deltaPresenceEstimationConfig = $deltaPresenceEstimationConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2DeltaPresenceEstimationConfig
   */
  public function getDeltaPresenceEstimationConfig()
  {
    return $this->deltaPresenceEstimationConfig;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2KAnonymityConfig
   */
  public function setKAnonymityConfig(Google_Service_DLP_GooglePrivacyDlpV2KAnonymityConfig $kAnonymityConfig)
  {
    $this->kAnonymityConfig = $kAnonymityConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2KAnonymityConfig
   */
  public function getKAnonymityConfig()
  {
    return $this->kAnonymityConfig;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2KMapEstimationConfig
   */
  public function setKMapEstimationConfig(Google_Service_DLP_GooglePrivacyDlpV2KMapEstimationConfig $kMapEstimationConfig)
  {
    $this->kMapEstimationConfig = $kMapEstimationConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2KMapEstimationConfig
   */
  public function getKMapEstimationConfig()
  {
    return $this->kMapEstimationConfig;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2LDiversityConfig
   */
  public function setLDiversityConfig(Google_Service_DLP_GooglePrivacyDlpV2LDiversityConfig $lDiversityConfig)
  {
    $this->lDiversityConfig = $lDiversityConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2LDiversityConfig
   */
  public function getLDiversityConfig()
  {
    return $this->lDiversityConfig;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2NumericalStatsConfig
   */
  public function setNumericalStatsConfig(Google_Service_DLP_GooglePrivacyDlpV2NumericalStatsConfig $numericalStatsConfig)
  {
    $this->numericalStatsConfig = $numericalStatsConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2NumericalStatsConfig
   */
  public function getNumericalStatsConfig()
  {
    return $this->numericalStatsConfig;
  }
}
