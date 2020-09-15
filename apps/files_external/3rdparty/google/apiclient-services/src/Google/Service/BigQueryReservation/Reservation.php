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

class Google_Service_BigQueryReservation_Reservation extends Google_Model
{
  public $creationTime;
  public $ignoreIdleSlots;
  public $name;
  public $slotCapacity;
  public $updateTime;

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setIgnoreIdleSlots($ignoreIdleSlots)
  {
    $this->ignoreIdleSlots = $ignoreIdleSlots;
  }
  public function getIgnoreIdleSlots()
  {
    return $this->ignoreIdleSlots;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSlotCapacity($slotCapacity)
  {
    $this->slotCapacity = $slotCapacity;
  }
  public function getSlotCapacity()
  {
    return $this->slotCapacity;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
