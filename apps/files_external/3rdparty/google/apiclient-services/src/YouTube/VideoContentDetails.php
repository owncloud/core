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

namespace Google\Service\YouTube;

class VideoContentDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $caption;
  protected $contentRatingType = ContentRating::class;
  protected $contentRatingDataType = '';
  protected $countryRestrictionType = AccessPolicy::class;
  protected $countryRestrictionDataType = '';
  /**
   * @var string
   */
  public $definition;
  /**
   * @var string
   */
  public $dimension;
  /**
   * @var string
   */
  public $duration;
  /**
   * @var bool
   */
  public $hasCustomThumbnail;
  /**
   * @var bool
   */
  public $licensedContent;
  /**
   * @var string
   */
  public $projection;
  protected $regionRestrictionType = VideoContentDetailsRegionRestriction::class;
  protected $regionRestrictionDataType = '';

  /**
   * @param string
   */
  public function setCaption($caption)
  {
    $this->caption = $caption;
  }
  /**
   * @return string
   */
  public function getCaption()
  {
    return $this->caption;
  }
  /**
   * @param ContentRating
   */
  public function setContentRating(ContentRating $contentRating)
  {
    $this->contentRating = $contentRating;
  }
  /**
   * @return ContentRating
   */
  public function getContentRating()
  {
    return $this->contentRating;
  }
  /**
   * @param AccessPolicy
   */
  public function setCountryRestriction(AccessPolicy $countryRestriction)
  {
    $this->countryRestriction = $countryRestriction;
  }
  /**
   * @return AccessPolicy
   */
  public function getCountryRestriction()
  {
    return $this->countryRestriction;
  }
  /**
   * @param string
   */
  public function setDefinition($definition)
  {
    $this->definition = $definition;
  }
  /**
   * @return string
   */
  public function getDefinition()
  {
    return $this->definition;
  }
  /**
   * @param string
   */
  public function setDimension($dimension)
  {
    $this->dimension = $dimension;
  }
  /**
   * @return string
   */
  public function getDimension()
  {
    return $this->dimension;
  }
  /**
   * @param string
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return string
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param bool
   */
  public function setHasCustomThumbnail($hasCustomThumbnail)
  {
    $this->hasCustomThumbnail = $hasCustomThumbnail;
  }
  /**
   * @return bool
   */
  public function getHasCustomThumbnail()
  {
    return $this->hasCustomThumbnail;
  }
  /**
   * @param bool
   */
  public function setLicensedContent($licensedContent)
  {
    $this->licensedContent = $licensedContent;
  }
  /**
   * @return bool
   */
  public function getLicensedContent()
  {
    return $this->licensedContent;
  }
  /**
   * @param string
   */
  public function setProjection($projection)
  {
    $this->projection = $projection;
  }
  /**
   * @return string
   */
  public function getProjection()
  {
    return $this->projection;
  }
  /**
   * @param VideoContentDetailsRegionRestriction
   */
  public function setRegionRestriction(VideoContentDetailsRegionRestriction $regionRestriction)
  {
    $this->regionRestriction = $regionRestriction;
  }
  /**
   * @return VideoContentDetailsRegionRestriction
   */
  public function getRegionRestriction()
  {
    return $this->regionRestriction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentDetails::class, 'Google_Service_YouTube_VideoContentDetails');
