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

namespace Google\Service\StreetViewPublish;

class Pose extends \Google\Model
{
  /**
   * @var float
   */
  public $accuracyMeters;
  public $altitude;
  /**
   * @var string
   */
  public $gpsRecordTimestampUnixEpoch;
  public $heading;
  protected $latLngPairType = LatLng::class;
  protected $latLngPairDataType = '';
  protected $levelType = Level::class;
  protected $levelDataType = '';
  public $pitch;
  public $roll;

  /**
   * @param float
   */
  public function setAccuracyMeters($accuracyMeters)
  {
    $this->accuracyMeters = $accuracyMeters;
  }
  /**
   * @return float
   */
  public function getAccuracyMeters()
  {
    return $this->accuracyMeters;
  }
  public function setAltitude($altitude)
  {
    $this->altitude = $altitude;
  }
  public function getAltitude()
  {
    return $this->altitude;
  }
  /**
   * @param string
   */
  public function setGpsRecordTimestampUnixEpoch($gpsRecordTimestampUnixEpoch)
  {
    $this->gpsRecordTimestampUnixEpoch = $gpsRecordTimestampUnixEpoch;
  }
  /**
   * @return string
   */
  public function getGpsRecordTimestampUnixEpoch()
  {
    return $this->gpsRecordTimestampUnixEpoch;
  }
  public function setHeading($heading)
  {
    $this->heading = $heading;
  }
  public function getHeading()
  {
    return $this->heading;
  }
  /**
   * @param LatLng
   */
  public function setLatLngPair(LatLng $latLngPair)
  {
    $this->latLngPair = $latLngPair;
  }
  /**
   * @return LatLng
   */
  public function getLatLngPair()
  {
    return $this->latLngPair;
  }
  /**
   * @param Level
   */
  public function setLevel(Level $level)
  {
    $this->level = $level;
  }
  /**
   * @return Level
   */
  public function getLevel()
  {
    return $this->level;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Pose::class, 'Google_Service_StreetViewPublish_Pose');
