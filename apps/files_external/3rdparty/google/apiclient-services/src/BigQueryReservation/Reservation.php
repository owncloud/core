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

namespace Google\Service\BigQueryReservation;

class Reservation extends \Google\Model
{
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var bool
   */
  public $ignoreIdleSlots;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $slotCapacity;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param bool
   */
  public function setIgnoreIdleSlots($ignoreIdleSlots)
  {
    $this->ignoreIdleSlots = $ignoreIdleSlots;
  }
  /**
   * @return bool
   */
  public function getIgnoreIdleSlots()
  {
    return $this->ignoreIdleSlots;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setSlotCapacity($slotCapacity)
  {
    $this->slotCapacity = $slotCapacity;
  }
  /**
   * @return string
   */
  public function getSlotCapacity()
  {
    return $this->slotCapacity;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Reservation::class, 'Google_Service_BigQueryReservation_Reservation');
