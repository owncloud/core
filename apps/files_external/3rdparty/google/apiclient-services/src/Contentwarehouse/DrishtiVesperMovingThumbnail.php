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

class DrishtiVesperMovingThumbnail extends \Google\Collection
{
  protected $collection_key = 'thumbnails';
  /**
   * @var int
   */
  public $beginTimestampMs;
  /**
   * @var int
   */
  public $durationMs;
  /**
   * @var string
   */
  public $encodedGifAnimation;
  /**
   * @var string
   */
  public $encodedVideoString;
  /**
   * @var string
   */
  public $encodedWebpAnimation;
  /**
   * @var int
   */
  public $endTimestampMs;
  /**
   * @var int
   */
  public $height;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $movingThumbnailerVersion;
  /**
   * @var string
   */
  public $name;
  /**
   * @var float
   */
  public $score;
  protected $scoreComponentsType = DrishtiVesperMovingThumbnailScoreComponents::class;
  protected $scoreComponentsDataType = '';
  protected $thumbnailsType = DrishtiVesperThumbnail::class;
  protected $thumbnailsDataType = 'array';
  /**
   * @var string
   */
  public $type;
  /**
   * @var float
   */
  public $webpQualityLevel;
  /**
   * @var int
   */
  public $width;

  /**
   * @param int
   */
  public function setBeginTimestampMs($beginTimestampMs)
  {
    $this->beginTimestampMs = $beginTimestampMs;
  }
  /**
   * @return int
   */
  public function getBeginTimestampMs()
  {
    return $this->beginTimestampMs;
  }
  /**
   * @param int
   */
  public function setDurationMs($durationMs)
  {
    $this->durationMs = $durationMs;
  }
  /**
   * @return int
   */
  public function getDurationMs()
  {
    return $this->durationMs;
  }
  /**
   * @param string
   */
  public function setEncodedGifAnimation($encodedGifAnimation)
  {
    $this->encodedGifAnimation = $encodedGifAnimation;
  }
  /**
   * @return string
   */
  public function getEncodedGifAnimation()
  {
    return $this->encodedGifAnimation;
  }
  /**
   * @param string
   */
  public function setEncodedVideoString($encodedVideoString)
  {
    $this->encodedVideoString = $encodedVideoString;
  }
  /**
   * @return string
   */
  public function getEncodedVideoString()
  {
    return $this->encodedVideoString;
  }
  /**
   * @param string
   */
  public function setEncodedWebpAnimation($encodedWebpAnimation)
  {
    $this->encodedWebpAnimation = $encodedWebpAnimation;
  }
  /**
   * @return string
   */
  public function getEncodedWebpAnimation()
  {
    return $this->encodedWebpAnimation;
  }
  /**
   * @param int
   */
  public function setEndTimestampMs($endTimestampMs)
  {
    $this->endTimestampMs = $endTimestampMs;
  }
  /**
   * @return int
   */
  public function getEndTimestampMs()
  {
    return $this->endTimestampMs;
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
  public function setMovingThumbnailerVersion($movingThumbnailerVersion)
  {
    $this->movingThumbnailerVersion = $movingThumbnailerVersion;
  }
  /**
   * @return string
   */
  public function getMovingThumbnailerVersion()
  {
    return $this->movingThumbnailerVersion;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
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
   * @param DrishtiVesperMovingThumbnailScoreComponents
   */
  public function setScoreComponents(DrishtiVesperMovingThumbnailScoreComponents $scoreComponents)
  {
    $this->scoreComponents = $scoreComponents;
  }
  /**
   * @return DrishtiVesperMovingThumbnailScoreComponents
   */
  public function getScoreComponents()
  {
    return $this->scoreComponents;
  }
  /**
   * @param DrishtiVesperThumbnail[]
   */
  public function setThumbnails($thumbnails)
  {
    $this->thumbnails = $thumbnails;
  }
  /**
   * @return DrishtiVesperThumbnail[]
   */
  public function getThumbnails()
  {
    return $this->thumbnails;
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
   * @param float
   */
  public function setWebpQualityLevel($webpQualityLevel)
  {
    $this->webpQualityLevel = $webpQualityLevel;
  }
  /**
   * @return float
   */
  public function getWebpQualityLevel()
  {
    return $this->webpQualityLevel;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DrishtiVesperMovingThumbnail::class, 'Google_Service_Contentwarehouse_DrishtiVesperMovingThumbnail');
