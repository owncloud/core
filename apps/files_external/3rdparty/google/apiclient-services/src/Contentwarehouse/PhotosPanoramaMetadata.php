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

class PhotosPanoramaMetadata extends \Google\Model
{
  /**
   * @var bool
   */
  public $sphericalPanorama;
  /**
   * @var bool
   */
  public $vr180Panorama;

  /**
   * @param bool
   */
  public function setSphericalPanorama($sphericalPanorama)
  {
    $this->sphericalPanorama = $sphericalPanorama;
  }
  /**
   * @return bool
   */
  public function getSphericalPanorama()
  {
    return $this->sphericalPanorama;
  }
  /**
   * @param bool
   */
  public function setVr180Panorama($vr180Panorama)
  {
    $this->vr180Panorama = $vr180Panorama;
  }
  /**
   * @return bool
   */
  public function getVr180Panorama()
  {
    return $this->vr180Panorama;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhotosPanoramaMetadata::class, 'Google_Service_Contentwarehouse_PhotosPanoramaMetadata');
