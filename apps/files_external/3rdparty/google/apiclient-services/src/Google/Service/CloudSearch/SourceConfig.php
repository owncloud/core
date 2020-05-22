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

class Google_Service_CloudSearch_SourceConfig extends Google_Model
{
  protected $crowdingConfigType = 'Google_Service_CloudSearch_SourceCrowdingConfig';
  protected $crowdingConfigDataType = '';
  protected $scoringConfigType = 'Google_Service_CloudSearch_SourceScoringConfig';
  protected $scoringConfigDataType = '';
  protected $sourceType = 'Google_Service_CloudSearch_Source';
  protected $sourceDataType = '';

  /**
   * @param Google_Service_CloudSearch_SourceCrowdingConfig
   */
  public function setCrowdingConfig(Google_Service_CloudSearch_SourceCrowdingConfig $crowdingConfig)
  {
    $this->crowdingConfig = $crowdingConfig;
  }
  /**
   * @return Google_Service_CloudSearch_SourceCrowdingConfig
   */
  public function getCrowdingConfig()
  {
    return $this->crowdingConfig;
  }
  /**
   * @param Google_Service_CloudSearch_SourceScoringConfig
   */
  public function setScoringConfig(Google_Service_CloudSearch_SourceScoringConfig $scoringConfig)
  {
    $this->scoringConfig = $scoringConfig;
  }
  /**
   * @return Google_Service_CloudSearch_SourceScoringConfig
   */
  public function getScoringConfig()
  {
    return $this->scoringConfig;
  }
  /**
   * @param Google_Service_CloudSearch_Source
   */
  public function setSource(Google_Service_CloudSearch_Source $source)
  {
    $this->source = $source;
  }
  /**
   * @return Google_Service_CloudSearch_Source
   */
  public function getSource()
  {
    return $this->source;
  }
}
