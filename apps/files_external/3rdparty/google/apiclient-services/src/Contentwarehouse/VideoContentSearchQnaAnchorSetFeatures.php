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

class VideoContentSearchQnaAnchorSetFeatures extends \Google\Model
{
  /**
   * @var string
   */
  public $backgroundEncodingPath;
  /**
   * @var string
   */
  public $descartesModelVersion;
  /**
   * @var float
   */
  public $descartesScoreThreshold;
  protected $dolphinConfigType = VideoContentSearchDolphinScoringConfig::class;
  protected $dolphinConfigDataType = '';
  /**
   * @var string
   */
  public $ensembleModelPath;
  /**
   * @var float
   */
  public $ensembleModelScoreThreshold;
  /**
   * @var float
   */
  public $minEntityTopicalityScore;
  /**
   * @var float
   */
  public $minQuestionDistance;
  /**
   * @var string
   */
  public $relatedQuestionsSstablePath;
  /**
   * @var string
   */
  public $spanDurationSecs;

  /**
   * @param string
   */
  public function setBackgroundEncodingPath($backgroundEncodingPath)
  {
    $this->backgroundEncodingPath = $backgroundEncodingPath;
  }
  /**
   * @return string
   */
  public function getBackgroundEncodingPath()
  {
    return $this->backgroundEncodingPath;
  }
  /**
   * @param string
   */
  public function setDescartesModelVersion($descartesModelVersion)
  {
    $this->descartesModelVersion = $descartesModelVersion;
  }
  /**
   * @return string
   */
  public function getDescartesModelVersion()
  {
    return $this->descartesModelVersion;
  }
  /**
   * @param float
   */
  public function setDescartesScoreThreshold($descartesScoreThreshold)
  {
    $this->descartesScoreThreshold = $descartesScoreThreshold;
  }
  /**
   * @return float
   */
  public function getDescartesScoreThreshold()
  {
    return $this->descartesScoreThreshold;
  }
  /**
   * @param VideoContentSearchDolphinScoringConfig
   */
  public function setDolphinConfig(VideoContentSearchDolphinScoringConfig $dolphinConfig)
  {
    $this->dolphinConfig = $dolphinConfig;
  }
  /**
   * @return VideoContentSearchDolphinScoringConfig
   */
  public function getDolphinConfig()
  {
    return $this->dolphinConfig;
  }
  /**
   * @param string
   */
  public function setEnsembleModelPath($ensembleModelPath)
  {
    $this->ensembleModelPath = $ensembleModelPath;
  }
  /**
   * @return string
   */
  public function getEnsembleModelPath()
  {
    return $this->ensembleModelPath;
  }
  /**
   * @param float
   */
  public function setEnsembleModelScoreThreshold($ensembleModelScoreThreshold)
  {
    $this->ensembleModelScoreThreshold = $ensembleModelScoreThreshold;
  }
  /**
   * @return float
   */
  public function getEnsembleModelScoreThreshold()
  {
    return $this->ensembleModelScoreThreshold;
  }
  /**
   * @param float
   */
  public function setMinEntityTopicalityScore($minEntityTopicalityScore)
  {
    $this->minEntityTopicalityScore = $minEntityTopicalityScore;
  }
  /**
   * @return float
   */
  public function getMinEntityTopicalityScore()
  {
    return $this->minEntityTopicalityScore;
  }
  /**
   * @param float
   */
  public function setMinQuestionDistance($minQuestionDistance)
  {
    $this->minQuestionDistance = $minQuestionDistance;
  }
  /**
   * @return float
   */
  public function getMinQuestionDistance()
  {
    return $this->minQuestionDistance;
  }
  /**
   * @param string
   */
  public function setRelatedQuestionsSstablePath($relatedQuestionsSstablePath)
  {
    $this->relatedQuestionsSstablePath = $relatedQuestionsSstablePath;
  }
  /**
   * @return string
   */
  public function getRelatedQuestionsSstablePath()
  {
    return $this->relatedQuestionsSstablePath;
  }
  /**
   * @param string
   */
  public function setSpanDurationSecs($spanDurationSecs)
  {
    $this->spanDurationSecs = $spanDurationSecs;
  }
  /**
   * @return string
   */
  public function getSpanDurationSecs()
  {
    return $this->spanDurationSecs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchQnaAnchorSetFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchQnaAnchorSetFeatures');
