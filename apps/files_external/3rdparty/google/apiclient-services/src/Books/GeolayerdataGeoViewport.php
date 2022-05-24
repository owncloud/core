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

namespace Google\Service\Books;

class GeolayerdataGeoViewport extends \Google\Model
{
  protected $hiType = GeolayerdataGeoViewportHi::class;
  protected $hiDataType = '';
  protected $loType = GeolayerdataGeoViewportLo::class;
  protected $loDataType = '';

  /**
   * @param GeolayerdataGeoViewportHi
   */
  public function setHi(GeolayerdataGeoViewportHi $hi)
  {
    $this->hi = $hi;
  }
  /**
   * @return GeolayerdataGeoViewportHi
   */
  public function getHi()
  {
    return $this->hi;
  }
  /**
   * @param GeolayerdataGeoViewportLo
   */
  public function setLo(GeolayerdataGeoViewportLo $lo)
  {
    $this->lo = $lo;
  }
  /**
   * @return GeolayerdataGeoViewportLo
   */
  public function getLo()
  {
    return $this->lo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeolayerdataGeoViewport::class, 'Google_Service_Books_GeolayerdataGeoViewport');
