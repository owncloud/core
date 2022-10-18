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

class VideoFileMasteringDisplayMetadata extends \Google\Model
{
  protected $blueType = VideoFileMasteringDisplayMetadataCIE1931Coordinate::class;
  protected $blueDataType = '';
  protected $greenType = VideoFileMasteringDisplayMetadataCIE1931Coordinate::class;
  protected $greenDataType = '';
  /**
   * @var float
   */
  public $maxLuminance;
  /**
   * @var float
   */
  public $minLuminance;
  protected $redType = VideoFileMasteringDisplayMetadataCIE1931Coordinate::class;
  protected $redDataType = '';
  protected $whitePointType = VideoFileMasteringDisplayMetadataCIE1931Coordinate::class;
  protected $whitePointDataType = '';

  /**
   * @param VideoFileMasteringDisplayMetadataCIE1931Coordinate
   */
  public function setBlue(VideoFileMasteringDisplayMetadataCIE1931Coordinate $blue)
  {
    $this->blue = $blue;
  }
  /**
   * @return VideoFileMasteringDisplayMetadataCIE1931Coordinate
   */
  public function getBlue()
  {
    return $this->blue;
  }
  /**
   * @param VideoFileMasteringDisplayMetadataCIE1931Coordinate
   */
  public function setGreen(VideoFileMasteringDisplayMetadataCIE1931Coordinate $green)
  {
    $this->green = $green;
  }
  /**
   * @return VideoFileMasteringDisplayMetadataCIE1931Coordinate
   */
  public function getGreen()
  {
    return $this->green;
  }
  /**
   * @param float
   */
  public function setMaxLuminance($maxLuminance)
  {
    $this->maxLuminance = $maxLuminance;
  }
  /**
   * @return float
   */
  public function getMaxLuminance()
  {
    return $this->maxLuminance;
  }
  /**
   * @param float
   */
  public function setMinLuminance($minLuminance)
  {
    $this->minLuminance = $minLuminance;
  }
  /**
   * @return float
   */
  public function getMinLuminance()
  {
    return $this->minLuminance;
  }
  /**
   * @param VideoFileMasteringDisplayMetadataCIE1931Coordinate
   */
  public function setRed(VideoFileMasteringDisplayMetadataCIE1931Coordinate $red)
  {
    $this->red = $red;
  }
  /**
   * @return VideoFileMasteringDisplayMetadataCIE1931Coordinate
   */
  public function getRed()
  {
    return $this->red;
  }
  /**
   * @param VideoFileMasteringDisplayMetadataCIE1931Coordinate
   */
  public function setWhitePoint(VideoFileMasteringDisplayMetadataCIE1931Coordinate $whitePoint)
  {
    $this->whitePoint = $whitePoint;
  }
  /**
   * @return VideoFileMasteringDisplayMetadataCIE1931Coordinate
   */
  public function getWhitePoint()
  {
    return $this->whitePoint;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoFileMasteringDisplayMetadata::class, 'Google_Service_Contentwarehouse_VideoFileMasteringDisplayMetadata');
