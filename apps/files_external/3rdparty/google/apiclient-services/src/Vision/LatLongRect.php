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

namespace Google\Service\Vision;

class LatLongRect extends \Google\Model
{
  protected $maxLatLngType = LatLng::class;
  protected $maxLatLngDataType = '';
  protected $minLatLngType = LatLng::class;
  protected $minLatLngDataType = '';

  /**
   * @param LatLng
   */
  public function setMaxLatLng(LatLng $maxLatLng)
  {
    $this->maxLatLng = $maxLatLng;
  }
  /**
   * @return LatLng
   */
  public function getMaxLatLng()
  {
    return $this->maxLatLng;
  }
  /**
   * @param LatLng
   */
  public function setMinLatLng(LatLng $minLatLng)
  {
    $this->minLatLng = $minLatLng;
  }
  /**
   * @return LatLng
   */
  public function getMinLatLng()
  {
    return $this->minLatLng;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LatLongRect::class, 'Google_Service_Vision_LatLongRect');
