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

class DrishtiVesperUserReportUserReportedThumbnail extends \Google\Collection
{
  protected $collection_key = 'rawHumanLabels';
  /**
   * @var float[]
   */
  public $denseFeatures;
  /**
   * @var int
   */
  public $duration;
  protected $humanLabelType = DrishtiVesperUserReportHumanLabel::class;
  protected $humanLabelDataType = '';
  /**
   * @var int
   */
  public $impressions;
  /**
   * @var bool
   */
  public $needHumanLabel;
  protected $rawHumanLabelsType = DrishtiVesperUserReportHumanLabel::class;
  protected $rawHumanLabelsDataType = 'array';
  protected $reportScoreType = DrishtiVesperUserReportModelScore::class;
  protected $reportScoreDataType = '';
  /**
   * @var string
   */
  public $reportType;
  protected $scoreType = DrishtiVesperUserReportModelScore::class;
  protected $scoreDataType = '';
  /**
   * @var string
   */
  public $useCase;
  /**
   * @var int
   */
  public $volume;

  /**
   * @param float[]
   */
  public function setDenseFeatures($denseFeatures)
  {
    $this->denseFeatures = $denseFeatures;
  }
  /**
   * @return float[]
   */
  public function getDenseFeatures()
  {
    return $this->denseFeatures;
  }
  /**
   * @param int
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return int
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param DrishtiVesperUserReportHumanLabel
   */
  public function setHumanLabel(DrishtiVesperUserReportHumanLabel $humanLabel)
  {
    $this->humanLabel = $humanLabel;
  }
  /**
   * @return DrishtiVesperUserReportHumanLabel
   */
  public function getHumanLabel()
  {
    return $this->humanLabel;
  }
  /**
   * @param int
   */
  public function setImpressions($impressions)
  {
    $this->impressions = $impressions;
  }
  /**
   * @return int
   */
  public function getImpressions()
  {
    return $this->impressions;
  }
  /**
   * @param bool
   */
  public function setNeedHumanLabel($needHumanLabel)
  {
    $this->needHumanLabel = $needHumanLabel;
  }
  /**
   * @return bool
   */
  public function getNeedHumanLabel()
  {
    return $this->needHumanLabel;
  }
  /**
   * @param DrishtiVesperUserReportHumanLabel[]
   */
  public function setRawHumanLabels($rawHumanLabels)
  {
    $this->rawHumanLabels = $rawHumanLabels;
  }
  /**
   * @return DrishtiVesperUserReportHumanLabel[]
   */
  public function getRawHumanLabels()
  {
    return $this->rawHumanLabels;
  }
  /**
   * @param DrishtiVesperUserReportModelScore
   */
  public function setReportScore(DrishtiVesperUserReportModelScore $reportScore)
  {
    $this->reportScore = $reportScore;
  }
  /**
   * @return DrishtiVesperUserReportModelScore
   */
  public function getReportScore()
  {
    return $this->reportScore;
  }
  /**
   * @param string
   */
  public function setReportType($reportType)
  {
    $this->reportType = $reportType;
  }
  /**
   * @return string
   */
  public function getReportType()
  {
    return $this->reportType;
  }
  /**
   * @param DrishtiVesperUserReportModelScore
   */
  public function setScore(DrishtiVesperUserReportModelScore $score)
  {
    $this->score = $score;
  }
  /**
   * @return DrishtiVesperUserReportModelScore
   */
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param string
   */
  public function setUseCase($useCase)
  {
    $this->useCase = $useCase;
  }
  /**
   * @return string
   */
  public function getUseCase()
  {
    return $this->useCase;
  }
  /**
   * @param int
   */
  public function setVolume($volume)
  {
    $this->volume = $volume;
  }
  /**
   * @return int
   */
  public function getVolume()
  {
    return $this->volume;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DrishtiVesperUserReportUserReportedThumbnail::class, 'Google_Service_Contentwarehouse_DrishtiVesperUserReportUserReportedThumbnail');
