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

class SocialGraphApiProtoSearchProfileLocation extends \Google\Model
{
  protected $endTimeType = GoogleTypeDate::class;
  protected $endTimeDataType = '';
  /**
   * @var string
   */
  public $lengthOfStay;
  protected $placeType = SocialGraphApiProtoSearchProfileEntity::class;
  protected $placeDataType = '';
  protected $pointType = SocialGraphApiProtoSearchProfileLocationInfo::class;
  protected $pointDataType = '';
  protected $startTimeType = GoogleTypeDate::class;
  protected $startTimeDataType = '';
  /**
   * @var string
   */
  public $type;

  /**
   * @param GoogleTypeDate
   */
  public function setEndTime(GoogleTypeDate $endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param string
   */
  public function setLengthOfStay($lengthOfStay)
  {
    $this->lengthOfStay = $lengthOfStay;
  }
  /**
   * @return string
   */
  public function getLengthOfStay()
  {
    return $this->lengthOfStay;
  }
  /**
   * @param SocialGraphApiProtoSearchProfileEntity
   */
  public function setPlace(SocialGraphApiProtoSearchProfileEntity $place)
  {
    $this->place = $place;
  }
  /**
   * @return SocialGraphApiProtoSearchProfileEntity
   */
  public function getPlace()
  {
    return $this->place;
  }
  /**
   * @param SocialGraphApiProtoSearchProfileLocationInfo
   */
  public function setPoint(SocialGraphApiProtoSearchProfileLocationInfo $point)
  {
    $this->point = $point;
  }
  /**
   * @return SocialGraphApiProtoSearchProfileLocationInfo
   */
  public function getPoint()
  {
    return $this->point;
  }
  /**
   * @param GoogleTypeDate
   */
  public function setStartTime(GoogleTypeDate $startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SocialGraphApiProtoSearchProfileLocation::class, 'Google_Service_Contentwarehouse_SocialGraphApiProtoSearchProfileLocation');
