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

namespace Google\Service\Doubleclicksearch;

class Availability extends \Google\Model
{
  /**
   * @var string
   */
  public $advertiserId;
  /**
   * @var string
   */
  public $agencyId;
  /**
   * @var string
   */
  public $availabilityTimestamp;
  /**
   * @var string
   */
  public $segmentationId;
  /**
   * @var string
   */
  public $segmentationName;
  /**
   * @var string
   */
  public $segmentationType;

  /**
   * @param string
   */
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  /**
   * @return string
   */
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param string
   */
  public function setAgencyId($agencyId)
  {
    $this->agencyId = $agencyId;
  }
  /**
   * @return string
   */
  public function getAgencyId()
  {
    return $this->agencyId;
  }
  /**
   * @param string
   */
  public function setAvailabilityTimestamp($availabilityTimestamp)
  {
    $this->availabilityTimestamp = $availabilityTimestamp;
  }
  /**
   * @return string
   */
  public function getAvailabilityTimestamp()
  {
    return $this->availabilityTimestamp;
  }
  /**
   * @param string
   */
  public function setSegmentationId($segmentationId)
  {
    $this->segmentationId = $segmentationId;
  }
  /**
   * @return string
   */
  public function getSegmentationId()
  {
    return $this->segmentationId;
  }
  /**
   * @param string
   */
  public function setSegmentationName($segmentationName)
  {
    $this->segmentationName = $segmentationName;
  }
  /**
   * @return string
   */
  public function getSegmentationName()
  {
    return $this->segmentationName;
  }
  /**
   * @param string
   */
  public function setSegmentationType($segmentationType)
  {
    $this->segmentationType = $segmentationType;
  }
  /**
   * @return string
   */
  public function getSegmentationType()
  {
    return $this->segmentationType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Availability::class, 'Google_Service_Doubleclicksearch_Availability');
