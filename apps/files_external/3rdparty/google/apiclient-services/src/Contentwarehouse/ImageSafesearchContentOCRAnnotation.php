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

class ImageSafesearchContentOCRAnnotation extends \Google\Model
{
  /**
   * @var float
   */
  public $ocrProminenceScore;
  /**
   * @var float
   */
  public $offensiveScore;
  /**
   * @var float
   */
  public $pornScore;
  /**
   * @var float
   */
  public $prominentOffensiveScore;
  /**
   * @var float
   */
  public $prominentVulgarScore;
  /**
   * @var float
   */
  public $qbstOffensiveScore;
  /**
   * @var bool
   */
  public $vulgarI18nBit;
  /**
   * @var float
   */
  public $vulgarScore;

  /**
   * @param float
   */
  public function setOcrProminenceScore($ocrProminenceScore)
  {
    $this->ocrProminenceScore = $ocrProminenceScore;
  }
  /**
   * @return float
   */
  public function getOcrProminenceScore()
  {
    return $this->ocrProminenceScore;
  }
  /**
   * @param float
   */
  public function setOffensiveScore($offensiveScore)
  {
    $this->offensiveScore = $offensiveScore;
  }
  /**
   * @return float
   */
  public function getOffensiveScore()
  {
    return $this->offensiveScore;
  }
  /**
   * @param float
   */
  public function setPornScore($pornScore)
  {
    $this->pornScore = $pornScore;
  }
  /**
   * @return float
   */
  public function getPornScore()
  {
    return $this->pornScore;
  }
  /**
   * @param float
   */
  public function setProminentOffensiveScore($prominentOffensiveScore)
  {
    $this->prominentOffensiveScore = $prominentOffensiveScore;
  }
  /**
   * @return float
   */
  public function getProminentOffensiveScore()
  {
    return $this->prominentOffensiveScore;
  }
  /**
   * @param float
   */
  public function setProminentVulgarScore($prominentVulgarScore)
  {
    $this->prominentVulgarScore = $prominentVulgarScore;
  }
  /**
   * @return float
   */
  public function getProminentVulgarScore()
  {
    return $this->prominentVulgarScore;
  }
  /**
   * @param float
   */
  public function setQbstOffensiveScore($qbstOffensiveScore)
  {
    $this->qbstOffensiveScore = $qbstOffensiveScore;
  }
  /**
   * @return float
   */
  public function getQbstOffensiveScore()
  {
    return $this->qbstOffensiveScore;
  }
  /**
   * @param bool
   */
  public function setVulgarI18nBit($vulgarI18nBit)
  {
    $this->vulgarI18nBit = $vulgarI18nBit;
  }
  /**
   * @return bool
   */
  public function getVulgarI18nBit()
  {
    return $this->vulgarI18nBit;
  }
  /**
   * @param float
   */
  public function setVulgarScore($vulgarScore)
  {
    $this->vulgarScore = $vulgarScore;
  }
  /**
   * @return float
   */
  public function getVulgarScore()
  {
    return $this->vulgarScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageSafesearchContentOCRAnnotation::class, 'Google_Service_Contentwarehouse_ImageSafesearchContentOCRAnnotation');
