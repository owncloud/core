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

class WWWResultInfoSubImageDocInfo extends \Google\Collection
{
  protected $collection_key = 'additionalSafesearchSignals';
  /**
   * @var int[]
   */
  public $additionalSafesearchSignals;
  /**
   * @var string
   */
  public $bestThumbnailType;
  /**
   * @var string
   */
  public $crops;
  /**
   * @var string
   */
  public $deepCropBytes;
  /**
   * @var string
   */
  public $docid;
  /**
   * @var float
   */
  public $documentTrust;
  /**
   * @var float
   */
  public $eqStar;
  /**
   * @var float
   */
  public $estRelevance;
  protected $flowOutputType = ImageContentFlowProtoProd::class;
  protected $flowOutputDataType = '';
  /**
   * @var int
   */
  public $height;
  /**
   * @var string
   */
  public $height50k;
  /**
   * @var float
   */
  public $humanModelScore;
  /**
   * @var string
   */
  public $imageUrl;
  /**
   * @var float
   */
  public $pamirNormalizedScore;
  /**
   * @var int
   */
  public $pornSignals;
  /**
   * @var bool
   */
  public $safeForUniversal;
  /**
   * @var float
   */
  public $salience;
  /**
   * @var string
   */
  public $salientColorInfo;
  /**
   * @var float
   */
  public $score;
  /**
   * @var float
   */
  public $tqStar;
  /**
   * @var float
   */
  public $tradFrac;
  /**
   * @var int
   */
  public $width;
  /**
   * @var string
   */
  public $width50k;

  /**
   * @param int[]
   */
  public function setAdditionalSafesearchSignals($additionalSafesearchSignals)
  {
    $this->additionalSafesearchSignals = $additionalSafesearchSignals;
  }
  /**
   * @return int[]
   */
  public function getAdditionalSafesearchSignals()
  {
    return $this->additionalSafesearchSignals;
  }
  /**
   * @param string
   */
  public function setBestThumbnailType($bestThumbnailType)
  {
    $this->bestThumbnailType = $bestThumbnailType;
  }
  /**
   * @return string
   */
  public function getBestThumbnailType()
  {
    return $this->bestThumbnailType;
  }
  /**
   * @param string
   */
  public function setCrops($crops)
  {
    $this->crops = $crops;
  }
  /**
   * @return string
   */
  public function getCrops()
  {
    return $this->crops;
  }
  /**
   * @param string
   */
  public function setDeepCropBytes($deepCropBytes)
  {
    $this->deepCropBytes = $deepCropBytes;
  }
  /**
   * @return string
   */
  public function getDeepCropBytes()
  {
    return $this->deepCropBytes;
  }
  /**
   * @param string
   */
  public function setDocid($docid)
  {
    $this->docid = $docid;
  }
  /**
   * @return string
   */
  public function getDocid()
  {
    return $this->docid;
  }
  /**
   * @param float
   */
  public function setDocumentTrust($documentTrust)
  {
    $this->documentTrust = $documentTrust;
  }
  /**
   * @return float
   */
  public function getDocumentTrust()
  {
    return $this->documentTrust;
  }
  /**
   * @param float
   */
  public function setEqStar($eqStar)
  {
    $this->eqStar = $eqStar;
  }
  /**
   * @return float
   */
  public function getEqStar()
  {
    return $this->eqStar;
  }
  /**
   * @param float
   */
  public function setEstRelevance($estRelevance)
  {
    $this->estRelevance = $estRelevance;
  }
  /**
   * @return float
   */
  public function getEstRelevance()
  {
    return $this->estRelevance;
  }
  /**
   * @param ImageContentFlowProtoProd
   */
  public function setFlowOutput(ImageContentFlowProtoProd $flowOutput)
  {
    $this->flowOutput = $flowOutput;
  }
  /**
   * @return ImageContentFlowProtoProd
   */
  public function getFlowOutput()
  {
    return $this->flowOutput;
  }
  /**
   * @param int
   */
  public function setHeight($height)
  {
    $this->height = $height;
  }
  /**
   * @return int
   */
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param string
   */
  public function setHeight50k($height50k)
  {
    $this->height50k = $height50k;
  }
  /**
   * @return string
   */
  public function getHeight50k()
  {
    return $this->height50k;
  }
  /**
   * @param float
   */
  public function setHumanModelScore($humanModelScore)
  {
    $this->humanModelScore = $humanModelScore;
  }
  /**
   * @return float
   */
  public function getHumanModelScore()
  {
    return $this->humanModelScore;
  }
  /**
   * @param string
   */
  public function setImageUrl($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }
  /**
   * @return string
   */
  public function getImageUrl()
  {
    return $this->imageUrl;
  }
  /**
   * @param float
   */
  public function setPamirNormalizedScore($pamirNormalizedScore)
  {
    $this->pamirNormalizedScore = $pamirNormalizedScore;
  }
  /**
   * @return float
   */
  public function getPamirNormalizedScore()
  {
    return $this->pamirNormalizedScore;
  }
  /**
   * @param int
   */
  public function setPornSignals($pornSignals)
  {
    $this->pornSignals = $pornSignals;
  }
  /**
   * @return int
   */
  public function getPornSignals()
  {
    return $this->pornSignals;
  }
  /**
   * @param bool
   */
  public function setSafeForUniversal($safeForUniversal)
  {
    $this->safeForUniversal = $safeForUniversal;
  }
  /**
   * @return bool
   */
  public function getSafeForUniversal()
  {
    return $this->safeForUniversal;
  }
  /**
   * @param float
   */
  public function setSalience($salience)
  {
    $this->salience = $salience;
  }
  /**
   * @return float
   */
  public function getSalience()
  {
    return $this->salience;
  }
  /**
   * @param string
   */
  public function setSalientColorInfo($salientColorInfo)
  {
    $this->salientColorInfo = $salientColorInfo;
  }
  /**
   * @return string
   */
  public function getSalientColorInfo()
  {
    return $this->salientColorInfo;
  }
  /**
   * @param float
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return float
   */
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param float
   */
  public function setTqStar($tqStar)
  {
    $this->tqStar = $tqStar;
  }
  /**
   * @return float
   */
  public function getTqStar()
  {
    return $this->tqStar;
  }
  /**
   * @param float
   */
  public function setTradFrac($tradFrac)
  {
    $this->tradFrac = $tradFrac;
  }
  /**
   * @return float
   */
  public function getTradFrac()
  {
    return $this->tradFrac;
  }
  /**
   * @param int
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return int
   */
  public function getWidth()
  {
    return $this->width;
  }
  /**
   * @param string
   */
  public function setWidth50k($width50k)
  {
    $this->width50k = $width50k;
  }
  /**
   * @return string
   */
  public function getWidth50k()
  {
    return $this->width50k;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WWWResultInfoSubImageDocInfo::class, 'Google_Service_Contentwarehouse_WWWResultInfoSubImageDocInfo');
