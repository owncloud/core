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

namespace Google\Service\DisplayVideo;

class ObaIcon extends \Google\Model
{
  /**
   * @var string
   */
  public $clickTrackingUrl;
  protected $dimensionsType = Dimensions::class;
  protected $dimensionsDataType = '';
  /**
   * @var string
   */
  public $landingPageUrl;
  /**
   * @var string
   */
  public $position;
  /**
   * @var string
   */
  public $program;
  /**
   * @var string
   */
  public $resourceMimeType;
  /**
   * @var string
   */
  public $resourceUrl;
  /**
   * @var string
   */
  public $viewTrackingUrl;

  /**
   * @param string
   */
  public function setClickTrackingUrl($clickTrackingUrl)
  {
    $this->clickTrackingUrl = $clickTrackingUrl;
  }
  /**
   * @return string
   */
  public function getClickTrackingUrl()
  {
    return $this->clickTrackingUrl;
  }
  /**
   * @param Dimensions
   */
  public function setDimensions(Dimensions $dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return Dimensions
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param string
   */
  public function setLandingPageUrl($landingPageUrl)
  {
    $this->landingPageUrl = $landingPageUrl;
  }
  /**
   * @return string
   */
  public function getLandingPageUrl()
  {
    return $this->landingPageUrl;
  }
  /**
   * @param string
   */
  public function setPosition($position)
  {
    $this->position = $position;
  }
  /**
   * @return string
   */
  public function getPosition()
  {
    return $this->position;
  }
  /**
   * @param string
   */
  public function setProgram($program)
  {
    $this->program = $program;
  }
  /**
   * @return string
   */
  public function getProgram()
  {
    return $this->program;
  }
  /**
   * @param string
   */
  public function setResourceMimeType($resourceMimeType)
  {
    $this->resourceMimeType = $resourceMimeType;
  }
  /**
   * @return string
   */
  public function getResourceMimeType()
  {
    return $this->resourceMimeType;
  }
  /**
   * @param string
   */
  public function setResourceUrl($resourceUrl)
  {
    $this->resourceUrl = $resourceUrl;
  }
  /**
   * @return string
   */
  public function getResourceUrl()
  {
    return $this->resourceUrl;
  }
  /**
   * @param string
   */
  public function setViewTrackingUrl($viewTrackingUrl)
  {
    $this->viewTrackingUrl = $viewTrackingUrl;
  }
  /**
   * @return string
   */
  public function getViewTrackingUrl()
  {
    return $this->viewTrackingUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ObaIcon::class, 'Google_Service_DisplayVideo_ObaIcon');
