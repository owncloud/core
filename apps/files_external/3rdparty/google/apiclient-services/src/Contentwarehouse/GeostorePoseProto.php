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

class GeostorePoseProto extends \Google\Model
{
  public $altitude;
  /**
   * @var int
   */
  public $index;
  public $lat;
  public $lng;
  public $pitch;
  public $roll;
  public $yaw;

  public function setAltitude($altitude)
  {
    $this->altitude = $altitude;
  }
  public function getAltitude()
  {
    return $this->altitude;
  }
  /**
   * @param int
   */
  public function setIndex($index)
  {
    $this->index = $index;
  }
  /**
   * @return int
   */
  public function getIndex()
  {
    return $this->index;
  }
  public function setLat($lat)
  {
    $this->lat = $lat;
  }
  public function getLat()
  {
    return $this->lat;
  }
  public function setLng($lng)
  {
    $this->lng = $lng;
  }
  public function getLng()
  {
    return $this->lng;
  }
  public function setPitch($pitch)
  {
    $this->pitch = $pitch;
  }
  public function getPitch()
  {
    return $this->pitch;
  }
  public function setRoll($roll)
  {
    $this->roll = $roll;
  }
  public function getRoll()
  {
    return $this->roll;
  }
  public function setYaw($yaw)
  {
    $this->yaw = $yaw;
  }
  public function getYaw()
  {
    return $this->yaw;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostorePoseProto::class, 'Google_Service_Contentwarehouse_GeostorePoseProto');
