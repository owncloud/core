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

class GeolayerdataGeo extends \Google\Collection
{
  protected $collection_key = 'boundary';
  /**
   * @var string[]
   */
  public $boundary;
  /**
   * @var string
   */
  public $cachePolicy;
  /**
   * @var string
   */
  public $countryCode;
  public $latitude;
  public $longitude;
  /**
   * @var string
   */
  public $mapType;
  protected $viewportType = GeolayerdataGeoViewport::class;
  protected $viewportDataType = '';
  /**
   * @var int
   */
  public $zoom;

  /**
   * @param string[]
   */
  public function setBoundary($boundary)
  {
    $this->boundary = $boundary;
  }
  /**
   * @return string[]
   */
  public function getBoundary()
  {
    return $this->boundary;
  }
  /**
   * @param string
   */
  public function setCachePolicy($cachePolicy)
  {
    $this->cachePolicy = $cachePolicy;
  }
  /**
   * @return string
   */
  public function getCachePolicy()
  {
    return $this->cachePolicy;
  }
  /**
   * @param string
   */
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  /**
   * @return string
   */
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  public function setLatitude($latitude)
  {
    $this->latitude = $latitude;
  }
  public function getLatitude()
  {
    return $this->latitude;
  }
  public function setLongitude($longitude)
  {
    $this->longitude = $longitude;
  }
  public function getLongitude()
  {
    return $this->longitude;
  }
  /**
   * @param string
   */
  public function setMapType($mapType)
  {
    $this->mapType = $mapType;
  }
  /**
   * @return string
   */
  public function getMapType()
  {
    return $this->mapType;
  }
  /**
   * @param GeolayerdataGeoViewport
   */
  public function setViewport(GeolayerdataGeoViewport $viewport)
  {
    $this->viewport = $viewport;
  }
  /**
   * @return GeolayerdataGeoViewport
   */
  public function getViewport()
  {
    return $this->viewport;
  }
  /**
   * @param int
   */
  public function setZoom($zoom)
  {
    $this->zoom = $zoom;
  }
  /**
   * @return int
   */
  public function getZoom()
  {
    return $this->zoom;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeolayerdataGeo::class, 'Google_Service_Books_GeolayerdataGeo');
