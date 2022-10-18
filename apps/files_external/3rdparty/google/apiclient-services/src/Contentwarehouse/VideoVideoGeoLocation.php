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

class VideoVideoGeoLocation extends \Google\Model
{
  /**
   * @var int
   */
  public $altitudeE2;
  /**
   * @var int
   */
  public $latitudeE7;
  /**
   * @var int
   */
  public $longitudeE7;

  /**
   * @param int
   */
  public function setAltitudeE2($altitudeE2)
  {
    $this->altitudeE2 = $altitudeE2;
  }
  /**
   * @return int
   */
  public function getAltitudeE2()
  {
    return $this->altitudeE2;
  }
  /**
   * @param int
   */
  public function setLatitudeE7($latitudeE7)
  {
    $this->latitudeE7 = $latitudeE7;
  }
  /**
   * @return int
   */
  public function getLatitudeE7()
  {
    return $this->latitudeE7;
  }
  /**
   * @param int
   */
  public function setLongitudeE7($longitudeE7)
  {
    $this->longitudeE7 = $longitudeE7;
  }
  /**
   * @return int
   */
  public function getLongitudeE7()
  {
    return $this->longitudeE7;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoVideoGeoLocation::class, 'Google_Service_Contentwarehouse_VideoVideoGeoLocation');
