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

namespace Google\Service\Contentwarehouse;

class LensDiscoveryStyleStyleImageTypeSignals extends \Google\Collection
{
  protected $collection_key = 'styleImageTypePredictions';
  protected $styleImageTypePredictionsType = LensDiscoveryStyleStyleImageTypeSignalsStyleImageTypePrediction::class;
  protected $styleImageTypePredictionsDataType = 'array';
  /**
   * @var string
   */
  public $version;

  /**
   * @param LensDiscoveryStyleStyleImageTypeSignalsStyleImageTypePrediction[]
   */
  public function setStyleImageTypePredictions($styleImageTypePredictions)
  {
    $this->styleImageTypePredictions = $styleImageTypePredictions;
  }
  /**
   * @return LensDiscoveryStyleStyleImageTypeSignalsStyleImageTypePrediction[]
   */
  public function getStyleImageTypePredictions()
  {
    return $this->styleImageTypePredictions;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LensDiscoveryStyleStyleImageTypeSignals::class, 'Google_Service_Contentwarehouse_LensDiscoveryStyleStyleImageTypeSignals');
