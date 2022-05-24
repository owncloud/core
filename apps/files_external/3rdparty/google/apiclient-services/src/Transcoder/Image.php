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

namespace Google\Service\Transcoder;

class Image extends \Google\Model
{
  public $alpha;
  protected $resolutionType = NormalizedCoordinate::class;
  protected $resolutionDataType = '';
  /**
   * @var string
   */
  public $uri;

  public function setAlpha($alpha)
  {
    $this->alpha = $alpha;
  }
  public function getAlpha()
  {
    return $this->alpha;
  }
  /**
   * @param NormalizedCoordinate
   */
  public function setResolution(NormalizedCoordinate $resolution)
  {
    $this->resolution = $resolution;
  }
  /**
   * @return NormalizedCoordinate
   */
  public function getResolution()
  {
    return $this->resolution;
  }
  /**
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Image::class, 'Google_Service_Transcoder_Image');
