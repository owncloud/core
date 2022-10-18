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

class VideoContentSearchOcrVideoFeature extends \Google\Model
{
  /**
   * @var float
   */
  public $averageTextAreaRatio;
  /**
   * @var int[]
   */
  public $clusterIdToFrameSize;
  /**
   * @var int
   */
  public $durationInMs;
  /**
   * @var string
   */
  public $langIdDetectedLanguage;
  /**
   * @var int
   */
  public $numClusters;
  /**
   * @var int
   */
  public $numFrames;
  /**
   * @var string
   */
  public $ocrDetectedLanguage;

  /**
   * @param float
   */
  public function setAverageTextAreaRatio($averageTextAreaRatio)
  {
    $this->averageTextAreaRatio = $averageTextAreaRatio;
  }
  /**
   * @return float
   */
  public function getAverageTextAreaRatio()
  {
    return $this->averageTextAreaRatio;
  }
  /**
   * @param int[]
   */
  public function setClusterIdToFrameSize($clusterIdToFrameSize)
  {
    $this->clusterIdToFrameSize = $clusterIdToFrameSize;
  }
  /**
   * @return int[]
   */
  public function getClusterIdToFrameSize()
  {
    return $this->clusterIdToFrameSize;
  }
  /**
   * @param int
   */
  public function setDurationInMs($durationInMs)
  {
    $this->durationInMs = $durationInMs;
  }
  /**
   * @return int
   */
  public function getDurationInMs()
  {
    return $this->durationInMs;
  }
  /**
   * @param string
   */
  public function setLangIdDetectedLanguage($langIdDetectedLanguage)
  {
    $this->langIdDetectedLanguage = $langIdDetectedLanguage;
  }
  /**
   * @return string
   */
  public function getLangIdDetectedLanguage()
  {
    return $this->langIdDetectedLanguage;
  }
  /**
   * @param int
   */
  public function setNumClusters($numClusters)
  {
    $this->numClusters = $numClusters;
  }
  /**
   * @return int
   */
  public function getNumClusters()
  {
    return $this->numClusters;
  }
  /**
   * @param int
   */
  public function setNumFrames($numFrames)
  {
    $this->numFrames = $numFrames;
  }
  /**
   * @return int
   */
  public function getNumFrames()
  {
    return $this->numFrames;
  }
  /**
   * @param string
   */
  public function setOcrDetectedLanguage($ocrDetectedLanguage)
  {
    $this->ocrDetectedLanguage = $ocrDetectedLanguage;
  }
  /**
   * @return string
   */
  public function getOcrDetectedLanguage()
  {
    return $this->ocrDetectedLanguage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchOcrVideoFeature::class, 'Google_Service_Contentwarehouse_VideoContentSearchOcrVideoFeature');
