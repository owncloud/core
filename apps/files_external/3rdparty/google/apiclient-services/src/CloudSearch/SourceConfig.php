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

namespace Google\Service\CloudSearch;

class SourceConfig extends \Google\Model
{
  protected $crowdingConfigType = SourceCrowdingConfig::class;
  protected $crowdingConfigDataType = '';
  protected $scoringConfigType = SourceScoringConfig::class;
  protected $scoringConfigDataType = '';
  protected $sourceType = Source::class;
  protected $sourceDataType = '';

  /**
   * @param SourceCrowdingConfig
   */
  public function setCrowdingConfig(SourceCrowdingConfig $crowdingConfig)
  {
    $this->crowdingConfig = $crowdingConfig;
  }
  /**
   * @return SourceCrowdingConfig
   */
  public function getCrowdingConfig()
  {
    return $this->crowdingConfig;
  }
  /**
   * @param SourceScoringConfig
   */
  public function setScoringConfig(SourceScoringConfig $scoringConfig)
  {
    $this->scoringConfig = $scoringConfig;
  }
  /**
   * @return SourceScoringConfig
   */
  public function getScoringConfig()
  {
    return $this->scoringConfig;
  }
  /**
   * @param Source
   */
  public function setSource(Source $source)
  {
    $this->source = $source;
  }
  /**
   * @return Source
   */
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SourceConfig::class, 'Google_Service_CloudSearch_SourceConfig');
