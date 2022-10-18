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

class DrishtiVesperThumbnail extends \Google\Collection
{
  protected $collection_key = 'userReportedThumbnails';
  /**
   * @var float[]
   */
  public $denseFeatures;
  /**
   * @var string
   */
  public $encodedImageString;
  /**
   * @var string
   */
  public $encodedImageStringSmall;
  protected $encodedThumbnailsType = DrishtiVesperEncodedThumbnail::class;
  protected $encodedThumbnailsDataType = 'array';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $ocrText;
  protected $qualityScoresType = DrishtiVesperThumbnailQualityScore::class;
  protected $qualityScoresDataType = 'array';
  /**
   * @var bool
   */
  public $shouldUpdateDefaultThumbnail;
  /**
   * @var string
   */
  public $thumbnailerModelVersion;
  /**
   * @var int
   */
  public $timestampMs;
  /**
   * @var string
   */
  public $type;
  protected $userReportedThumbnailType = DrishtiVesperUserReportUserReportedThumbnail::class;
  protected $userReportedThumbnailDataType = '';
  protected $userReportedThumbnailsType = DrishtiVesperUserReportUserReportedThumbnail::class;
  protected $userReportedThumbnailsDataType = 'array';
  /**
   * @var string
   */
  public $version;

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
   * @param string
   */
  public function setEncodedImageString($encodedImageString)
  {
    $this->encodedImageString = $encodedImageString;
  }
  /**
   * @return string
   */
  public function getEncodedImageString()
  {
    return $this->encodedImageString;
  }
  /**
   * @param string
   */
  public function setEncodedImageStringSmall($encodedImageStringSmall)
  {
    $this->encodedImageStringSmall = $encodedImageStringSmall;
  }
  /**
   * @return string
   */
  public function getEncodedImageStringSmall()
  {
    return $this->encodedImageStringSmall;
  }
  /**
   * @param DrishtiVesperEncodedThumbnail[]
   */
  public function setEncodedThumbnails($encodedThumbnails)
  {
    $this->encodedThumbnails = $encodedThumbnails;
  }
  /**
   * @return DrishtiVesperEncodedThumbnail[]
   */
  public function getEncodedThumbnails()
  {
    return $this->encodedThumbnails;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setOcrText($ocrText)
  {
    $this->ocrText = $ocrText;
  }
  /**
   * @return string
   */
  public function getOcrText()
  {
    return $this->ocrText;
  }
  /**
   * @param DrishtiVesperThumbnailQualityScore[]
   */
  public function setQualityScores($qualityScores)
  {
    $this->qualityScores = $qualityScores;
  }
  /**
   * @return DrishtiVesperThumbnailQualityScore[]
   */
  public function getQualityScores()
  {
    return $this->qualityScores;
  }
  /**
   * @param bool
   */
  public function setShouldUpdateDefaultThumbnail($shouldUpdateDefaultThumbnail)
  {
    $this->shouldUpdateDefaultThumbnail = $shouldUpdateDefaultThumbnail;
  }
  /**
   * @return bool
   */
  public function getShouldUpdateDefaultThumbnail()
  {
    return $this->shouldUpdateDefaultThumbnail;
  }
  /**
   * @param string
   */
  public function setThumbnailerModelVersion($thumbnailerModelVersion)
  {
    $this->thumbnailerModelVersion = $thumbnailerModelVersion;
  }
  /**
   * @return string
   */
  public function getThumbnailerModelVersion()
  {
    return $this->thumbnailerModelVersion;
  }
  /**
   * @param int
   */
  public function setTimestampMs($timestampMs)
  {
    $this->timestampMs = $timestampMs;
  }
  /**
   * @return int
   */
  public function getTimestampMs()
  {
    return $this->timestampMs;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param DrishtiVesperUserReportUserReportedThumbnail
   */
  public function setUserReportedThumbnail(DrishtiVesperUserReportUserReportedThumbnail $userReportedThumbnail)
  {
    $this->userReportedThumbnail = $userReportedThumbnail;
  }
  /**
   * @return DrishtiVesperUserReportUserReportedThumbnail
   */
  public function getUserReportedThumbnail()
  {
    return $this->userReportedThumbnail;
  }
  /**
   * @param DrishtiVesperUserReportUserReportedThumbnail[]
   */
  public function setUserReportedThumbnails($userReportedThumbnails)
  {
    $this->userReportedThumbnails = $userReportedThumbnails;
  }
  /**
   * @return DrishtiVesperUserReportUserReportedThumbnail[]
   */
  public function getUserReportedThumbnails()
  {
    return $this->userReportedThumbnails;
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
class_alias(DrishtiVesperThumbnail::class, 'Google_Service_Contentwarehouse_DrishtiVesperThumbnail');
