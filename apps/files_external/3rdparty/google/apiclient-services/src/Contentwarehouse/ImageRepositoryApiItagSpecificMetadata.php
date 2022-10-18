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

class ImageRepositoryApiItagSpecificMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $expirationTimestampSec;
  /**
   * @var string
   */
  public $genus;
  /**
   * @var string
   */
  public $state;
  /**
   * @var int
   */
  public $transcodeItag;
  protected $videoIdType = VideoAssetsVenomVideoId::class;
  protected $videoIdDataType = '';
  protected $xtagsListType = ImageRepositoryApiXtagList::class;
  protected $xtagsListDataType = '';

  /**
   * @param string
   */
  public function setExpirationTimestampSec($expirationTimestampSec)
  {
    $this->expirationTimestampSec = $expirationTimestampSec;
  }
  /**
   * @return string
   */
  public function getExpirationTimestampSec()
  {
    return $this->expirationTimestampSec;
  }
  /**
   * @param string
   */
  public function setGenus($genus)
  {
    $this->genus = $genus;
  }
  /**
   * @return string
   */
  public function getGenus()
  {
    return $this->genus;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param int
   */
  public function setTranscodeItag($transcodeItag)
  {
    $this->transcodeItag = $transcodeItag;
  }
  /**
   * @return int
   */
  public function getTranscodeItag()
  {
    return $this->transcodeItag;
  }
  /**
   * @param VideoAssetsVenomVideoId
   */
  public function setVideoId(VideoAssetsVenomVideoId $videoId)
  {
    $this->videoId = $videoId;
  }
  /**
   * @return VideoAssetsVenomVideoId
   */
  public function getVideoId()
  {
    return $this->videoId;
  }
  /**
   * @param ImageRepositoryApiXtagList
   */
  public function setXtagsList(ImageRepositoryApiXtagList $xtagsList)
  {
    $this->xtagsList = $xtagsList;
  }
  /**
   * @return ImageRepositoryApiXtagList
   */
  public function getXtagsList()
  {
    return $this->xtagsList;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageRepositoryApiItagSpecificMetadata::class, 'Google_Service_Contentwarehouse_ImageRepositoryApiItagSpecificMetadata');
