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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1ScoreComponent extends \Google\Collection
{
  protected $collection_key = 'recommendations';
  /**
   * @var string
   */
  public $calculateTime;
  /**
   * @var string
   */
  public $dataCaptureTime;
  /**
   * @var string[]
   */
  public $drilldownPaths;
  protected $recommendationsType = GoogleCloudApigeeV1ScoreComponentRecommendation::class;
  protected $recommendationsDataType = 'array';
  /**
   * @var int
   */
  public $score;
  /**
   * @var string
   */
  public $scorePath;

  /**
   * @param string
   */
  public function setCalculateTime($calculateTime)
  {
    $this->calculateTime = $calculateTime;
  }
  /**
   * @return string
   */
  public function getCalculateTime()
  {
    return $this->calculateTime;
  }
  /**
   * @param string
   */
  public function setDataCaptureTime($dataCaptureTime)
  {
    $this->dataCaptureTime = $dataCaptureTime;
  }
  /**
   * @return string
   */
  public function getDataCaptureTime()
  {
    return $this->dataCaptureTime;
  }
  /**
   * @param string[]
   */
  public function setDrilldownPaths($drilldownPaths)
  {
    $this->drilldownPaths = $drilldownPaths;
  }
  /**
   * @return string[]
   */
  public function getDrilldownPaths()
  {
    return $this->drilldownPaths;
  }
  /**
   * @param GoogleCloudApigeeV1ScoreComponentRecommendation[]
   */
  public function setRecommendations($recommendations)
  {
    $this->recommendations = $recommendations;
  }
  /**
   * @return GoogleCloudApigeeV1ScoreComponentRecommendation[]
   */
  public function getRecommendations()
  {
    return $this->recommendations;
  }
  /**
   * @param int
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return int
   */
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param string
   */
  public function setScorePath($scorePath)
  {
    $this->scorePath = $scorePath;
  }
  /**
   * @return string
   */
  public function getScorePath()
  {
    return $this->scorePath;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1ScoreComponent::class, 'Google_Service_Apigee_GoogleCloudApigeeV1ScoreComponent');
