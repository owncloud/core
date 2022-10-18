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

class MediaIndexVideoFrame extends \Google\Collection
{
  protected $collection_key = 'thumbnailType';
  /**
   * @var string
   */
  public $docid;
  protected $frameIdentifierType = MediaIndexFrameIdentifier::class;
  protected $frameIdentifierDataType = '';
  protected $regionsType = MediaIndexRegion::class;
  protected $regionsDataType = 'array';
  /**
   * @var string
   */
  public $starburstFeaturesV4;
  /**
   * @var string[]
   */
  public $starburstTokensV4;
  /**
   * @var string[]
   */
  public $thumbnailType;

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
   * @param MediaIndexFrameIdentifier
   */
  public function setFrameIdentifier(MediaIndexFrameIdentifier $frameIdentifier)
  {
    $this->frameIdentifier = $frameIdentifier;
  }
  /**
   * @return MediaIndexFrameIdentifier
   */
  public function getFrameIdentifier()
  {
    return $this->frameIdentifier;
  }
  /**
   * @param MediaIndexRegion[]
   */
  public function setRegions($regions)
  {
    $this->regions = $regions;
  }
  /**
   * @return MediaIndexRegion[]
   */
  public function getRegions()
  {
    return $this->regions;
  }
  /**
   * @param string
   */
  public function setStarburstFeaturesV4($starburstFeaturesV4)
  {
    $this->starburstFeaturesV4 = $starburstFeaturesV4;
  }
  /**
   * @return string
   */
  public function getStarburstFeaturesV4()
  {
    return $this->starburstFeaturesV4;
  }
  /**
   * @param string[]
   */
  public function setStarburstTokensV4($starburstTokensV4)
  {
    $this->starburstTokensV4 = $starburstTokensV4;
  }
  /**
   * @return string[]
   */
  public function getStarburstTokensV4()
  {
    return $this->starburstTokensV4;
  }
  /**
   * @param string[]
   */
  public function setThumbnailType($thumbnailType)
  {
    $this->thumbnailType = $thumbnailType;
  }
  /**
   * @return string[]
   */
  public function getThumbnailType()
  {
    return $this->thumbnailType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MediaIndexVideoFrame::class, 'Google_Service_Contentwarehouse_MediaIndexVideoFrame');
