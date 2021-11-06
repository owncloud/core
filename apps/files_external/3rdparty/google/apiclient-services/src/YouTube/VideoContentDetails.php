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
  public $caption;
  protected $contentRatingType = ContentRating::class;
  protected $contentRatingDataType = '';
  protected $countryRestrictionType = AccessPolicy::class;
  protected $countryRestrictionDataType = '';
  public $definition;
  public $dimension;
  public $duration;
  public $hasCustomThumbnail;
  public $licensedContent;
  public $projection;
  protected $regionRestrictionType = VideoContentDetailsRegionRestriction::class;
  protected $regionRestrictionDataType = '';

  public function setCaption($caption)
  {
    $this->caption = $caption;
  }
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
  public function setDefinition($definition)
  {
    $this->definition = $definition;
  }
  public function getDefinition()
  {
    return $this->definition;
  }
  public function setDimension($dimension)
  {
    $this->dimension = $dimension;
  }
  public function getDimension()
  {
    return $this->dimension;
  }
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  public function getDuration()
  {
    return $this->duration;
  }
  public function setHasCustomThumbnail($hasCustomThumbnail)
  {
    $this->hasCustomThumbnail = $hasCustomThumbnail;
  }
  public function getHasCustomThumbnail()
  {
    return $this->hasCustomThumbnail;
  }
  public function setLicensedContent($licensedContent)
  {
    $this->licensedContent = $licensedContent;
  }
  public function getLicensedContent()
  {
    return $this->licensedContent;
  }
  public function setProjection($projection)
  {
    $this->projection = $projection;
  }
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
