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

class ImageSafesearchContentBrainPornAnnotation extends \Google\Model
{
  /**
   * @var float
   */
  public $childScore;
  public $csaiScore;
  /**
   * @var float
   */
  public $iuInappropriateScore;
  /**
   * @var float
   */
  public $medicalScore;
  /**
   * @var float
   */
  public $pedoScore;
  public $pornScore;
  /**
   * @var float
   */
  public $racyScore;
  /**
   * @var float
   */
  public $spoofScore;
  /**
   * @var string
   */
  public $version;
  /**
   * @var float
   */
  public $violenceScore;
  /**
   * @var float
   */
  public $ytPornScore;

  /**
   * @param float
   */
  public function setChildScore($childScore)
  {
    $this->childScore = $childScore;
  }
  /**
   * @return float
   */
  public function getChildScore()
  {
    return $this->childScore;
  }
  public function setCsaiScore($csaiScore)
  {
    $this->csaiScore = $csaiScore;
  }
  public function getCsaiScore()
  {
    return $this->csaiScore;
  }
  /**
   * @param float
   */
  public function setIuInappropriateScore($iuInappropriateScore)
  {
    $this->iuInappropriateScore = $iuInappropriateScore;
  }
  /**
   * @return float
   */
  public function getIuInappropriateScore()
  {
    return $this->iuInappropriateScore;
  }
  /**
   * @param float
   */
  public function setMedicalScore($medicalScore)
  {
    $this->medicalScore = $medicalScore;
  }
  /**
   * @return float
   */
  public function getMedicalScore()
  {
    return $this->medicalScore;
  }
  /**
   * @param float
   */
  public function setPedoScore($pedoScore)
  {
    $this->pedoScore = $pedoScore;
  }
  /**
   * @return float
   */
  public function getPedoScore()
  {
    return $this->pedoScore;
  }
  public function setPornScore($pornScore)
  {
    $this->pornScore = $pornScore;
  }
  public function getPornScore()
  {
    return $this->pornScore;
  }
  /**
   * @param float
   */
  public function setRacyScore($racyScore)
  {
    $this->racyScore = $racyScore;
  }
  /**
   * @return float
   */
  public function getRacyScore()
  {
    return $this->racyScore;
  }
  /**
   * @param float
   */
  public function setSpoofScore($spoofScore)
  {
    $this->spoofScore = $spoofScore;
  }
  /**
   * @return float
   */
  public function getSpoofScore()
  {
    return $this->spoofScore;
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
  /**
   * @param float
   */
  public function setViolenceScore($violenceScore)
  {
    $this->violenceScore = $violenceScore;
  }
  /**
   * @return float
   */
  public function getViolenceScore()
  {
    return $this->violenceScore;
  }
  /**
   * @param float
   */
  public function setYtPornScore($ytPornScore)
  {
    $this->ytPornScore = $ytPornScore;
  }
  /**
   * @return float
   */
  public function getYtPornScore()
  {
    return $this->ytPornScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageSafesearchContentBrainPornAnnotation::class, 'Google_Service_Contentwarehouse_ImageSafesearchContentBrainPornAnnotation');
