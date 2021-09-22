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

namespace Google\Service\MyBusinessLodging;

class MinimizedContact extends \Google\Model
{
  public $contactlessCheckinCheckout;
  public $contactlessCheckinCheckoutException;
  public $digitalGuestRoomKeys;
  public $digitalGuestRoomKeysException;
  public $housekeepingScheduledRequestOnly;
  public $housekeepingScheduledRequestOnlyException;
  public $noHighTouchItemsCommonAreas;
  public $noHighTouchItemsCommonAreasException;
  public $noHighTouchItemsGuestRooms;
  public $noHighTouchItemsGuestRoomsException;
  public $plasticKeycardsDisinfected;
  public $plasticKeycardsDisinfectedException;
  public $roomBookingsBuffer;
  public $roomBookingsBufferException;

  public function setContactlessCheckinCheckout($contactlessCheckinCheckout)
  {
    $this->contactlessCheckinCheckout = $contactlessCheckinCheckout;
  }
  public function getContactlessCheckinCheckout()
  {
    return $this->contactlessCheckinCheckout;
  }
  public function setContactlessCheckinCheckoutException($contactlessCheckinCheckoutException)
  {
    $this->contactlessCheckinCheckoutException = $contactlessCheckinCheckoutException;
  }
  public function getContactlessCheckinCheckoutException()
  {
    return $this->contactlessCheckinCheckoutException;
  }
  public function setDigitalGuestRoomKeys($digitalGuestRoomKeys)
  {
    $this->digitalGuestRoomKeys = $digitalGuestRoomKeys;
  }
  public function getDigitalGuestRoomKeys()
  {
    return $this->digitalGuestRoomKeys;
  }
  public function setDigitalGuestRoomKeysException($digitalGuestRoomKeysException)
  {
    $this->digitalGuestRoomKeysException = $digitalGuestRoomKeysException;
  }
  public function getDigitalGuestRoomKeysException()
  {
    return $this->digitalGuestRoomKeysException;
  }
  public function setHousekeepingScheduledRequestOnly($housekeepingScheduledRequestOnly)
  {
    $this->housekeepingScheduledRequestOnly = $housekeepingScheduledRequestOnly;
  }
  public function getHousekeepingScheduledRequestOnly()
  {
    return $this->housekeepingScheduledRequestOnly;
  }
  public function setHousekeepingScheduledRequestOnlyException($housekeepingScheduledRequestOnlyException)
  {
    $this->housekeepingScheduledRequestOnlyException = $housekeepingScheduledRequestOnlyException;
  }
  public function getHousekeepingScheduledRequestOnlyException()
  {
    return $this->housekeepingScheduledRequestOnlyException;
  }
  public function setNoHighTouchItemsCommonAreas($noHighTouchItemsCommonAreas)
  {
    $this->noHighTouchItemsCommonAreas = $noHighTouchItemsCommonAreas;
  }
  public function getNoHighTouchItemsCommonAreas()
  {
    return $this->noHighTouchItemsCommonAreas;
  }
  public function setNoHighTouchItemsCommonAreasException($noHighTouchItemsCommonAreasException)
  {
    $this->noHighTouchItemsCommonAreasException = $noHighTouchItemsCommonAreasException;
  }
  public function getNoHighTouchItemsCommonAreasException()
  {
    return $this->noHighTouchItemsCommonAreasException;
  }
  public function setNoHighTouchItemsGuestRooms($noHighTouchItemsGuestRooms)
  {
    $this->noHighTouchItemsGuestRooms = $noHighTouchItemsGuestRooms;
  }
  public function getNoHighTouchItemsGuestRooms()
  {
    return $this->noHighTouchItemsGuestRooms;
  }
  public function setNoHighTouchItemsGuestRoomsException($noHighTouchItemsGuestRoomsException)
  {
    $this->noHighTouchItemsGuestRoomsException = $noHighTouchItemsGuestRoomsException;
  }
  public function getNoHighTouchItemsGuestRoomsException()
  {
    return $this->noHighTouchItemsGuestRoomsException;
  }
  public function setPlasticKeycardsDisinfected($plasticKeycardsDisinfected)
  {
    $this->plasticKeycardsDisinfected = $plasticKeycardsDisinfected;
  }
  public function getPlasticKeycardsDisinfected()
  {
    return $this->plasticKeycardsDisinfected;
  }
  public function setPlasticKeycardsDisinfectedException($plasticKeycardsDisinfectedException)
  {
    $this->plasticKeycardsDisinfectedException = $plasticKeycardsDisinfectedException;
  }
  public function getPlasticKeycardsDisinfectedException()
  {
    return $this->plasticKeycardsDisinfectedException;
  }
  public function setRoomBookingsBuffer($roomBookingsBuffer)
  {
    $this->roomBookingsBuffer = $roomBookingsBuffer;
  }
  public function getRoomBookingsBuffer()
  {
    return $this->roomBookingsBuffer;
  }
  public function setRoomBookingsBufferException($roomBookingsBufferException)
  {
    $this->roomBookingsBufferException = $roomBookingsBufferException;
  }
  public function getRoomBookingsBufferException()
  {
    return $this->roomBookingsBufferException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MinimizedContact::class, 'Google_Service_MyBusinessLodging_MinimizedContact');
