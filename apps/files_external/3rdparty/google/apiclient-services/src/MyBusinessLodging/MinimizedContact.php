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
  /**
   * @var bool
   */
  public $contactlessCheckinCheckout;
  /**
   * @var string
   */
  public $contactlessCheckinCheckoutException;
  /**
   * @var bool
   */
  public $digitalGuestRoomKeys;
  /**
   * @var string
   */
  public $digitalGuestRoomKeysException;
  /**
   * @var bool
   */
  public $housekeepingScheduledRequestOnly;
  /**
   * @var string
   */
  public $housekeepingScheduledRequestOnlyException;
  /**
   * @var bool
   */
  public $noHighTouchItemsCommonAreas;
  /**
   * @var string
   */
  public $noHighTouchItemsCommonAreasException;
  /**
   * @var bool
   */
  public $noHighTouchItemsGuestRooms;
  /**
   * @var string
   */
  public $noHighTouchItemsGuestRoomsException;
  /**
   * @var bool
   */
  public $plasticKeycardsDisinfected;
  /**
   * @var string
   */
  public $plasticKeycardsDisinfectedException;
  /**
   * @var bool
   */
  public $roomBookingsBuffer;
  /**
   * @var string
   */
  public $roomBookingsBufferException;

  /**
   * @param bool
   */
  public function setContactlessCheckinCheckout($contactlessCheckinCheckout)
  {
    $this->contactlessCheckinCheckout = $contactlessCheckinCheckout;
  }
  /**
   * @return bool
   */
  public function getContactlessCheckinCheckout()
  {
    return $this->contactlessCheckinCheckout;
  }
  /**
   * @param string
   */
  public function setContactlessCheckinCheckoutException($contactlessCheckinCheckoutException)
  {
    $this->contactlessCheckinCheckoutException = $contactlessCheckinCheckoutException;
  }
  /**
   * @return string
   */
  public function getContactlessCheckinCheckoutException()
  {
    return $this->contactlessCheckinCheckoutException;
  }
  /**
   * @param bool
   */
  public function setDigitalGuestRoomKeys($digitalGuestRoomKeys)
  {
    $this->digitalGuestRoomKeys = $digitalGuestRoomKeys;
  }
  /**
   * @return bool
   */
  public function getDigitalGuestRoomKeys()
  {
    return $this->digitalGuestRoomKeys;
  }
  /**
   * @param string
   */
  public function setDigitalGuestRoomKeysException($digitalGuestRoomKeysException)
  {
    $this->digitalGuestRoomKeysException = $digitalGuestRoomKeysException;
  }
  /**
   * @return string
   */
  public function getDigitalGuestRoomKeysException()
  {
    return $this->digitalGuestRoomKeysException;
  }
  /**
   * @param bool
   */
  public function setHousekeepingScheduledRequestOnly($housekeepingScheduledRequestOnly)
  {
    $this->housekeepingScheduledRequestOnly = $housekeepingScheduledRequestOnly;
  }
  /**
   * @return bool
   */
  public function getHousekeepingScheduledRequestOnly()
  {
    return $this->housekeepingScheduledRequestOnly;
  }
  /**
   * @param string
   */
  public function setHousekeepingScheduledRequestOnlyException($housekeepingScheduledRequestOnlyException)
  {
    $this->housekeepingScheduledRequestOnlyException = $housekeepingScheduledRequestOnlyException;
  }
  /**
   * @return string
   */
  public function getHousekeepingScheduledRequestOnlyException()
  {
    return $this->housekeepingScheduledRequestOnlyException;
  }
  /**
   * @param bool
   */
  public function setNoHighTouchItemsCommonAreas($noHighTouchItemsCommonAreas)
  {
    $this->noHighTouchItemsCommonAreas = $noHighTouchItemsCommonAreas;
  }
  /**
   * @return bool
   */
  public function getNoHighTouchItemsCommonAreas()
  {
    return $this->noHighTouchItemsCommonAreas;
  }
  /**
   * @param string
   */
  public function setNoHighTouchItemsCommonAreasException($noHighTouchItemsCommonAreasException)
  {
    $this->noHighTouchItemsCommonAreasException = $noHighTouchItemsCommonAreasException;
  }
  /**
   * @return string
   */
  public function getNoHighTouchItemsCommonAreasException()
  {
    return $this->noHighTouchItemsCommonAreasException;
  }
  /**
   * @param bool
   */
  public function setNoHighTouchItemsGuestRooms($noHighTouchItemsGuestRooms)
  {
    $this->noHighTouchItemsGuestRooms = $noHighTouchItemsGuestRooms;
  }
  /**
   * @return bool
   */
  public function getNoHighTouchItemsGuestRooms()
  {
    return $this->noHighTouchItemsGuestRooms;
  }
  /**
   * @param string
   */
  public function setNoHighTouchItemsGuestRoomsException($noHighTouchItemsGuestRoomsException)
  {
    $this->noHighTouchItemsGuestRoomsException = $noHighTouchItemsGuestRoomsException;
  }
  /**
   * @return string
   */
  public function getNoHighTouchItemsGuestRoomsException()
  {
    return $this->noHighTouchItemsGuestRoomsException;
  }
  /**
   * @param bool
   */
  public function setPlasticKeycardsDisinfected($plasticKeycardsDisinfected)
  {
    $this->plasticKeycardsDisinfected = $plasticKeycardsDisinfected;
  }
  /**
   * @return bool
   */
  public function getPlasticKeycardsDisinfected()
  {
    return $this->plasticKeycardsDisinfected;
  }
  /**
   * @param string
   */
  public function setPlasticKeycardsDisinfectedException($plasticKeycardsDisinfectedException)
  {
    $this->plasticKeycardsDisinfectedException = $plasticKeycardsDisinfectedException;
  }
  /**
   * @return string
   */
  public function getPlasticKeycardsDisinfectedException()
  {
    return $this->plasticKeycardsDisinfectedException;
  }
  /**
   * @param bool
   */
  public function setRoomBookingsBuffer($roomBookingsBuffer)
  {
    $this->roomBookingsBuffer = $roomBookingsBuffer;
  }
  /**
   * @return bool
   */
  public function getRoomBookingsBuffer()
  {
    return $this->roomBookingsBuffer;
  }
  /**
   * @param string
   */
  public function setRoomBookingsBufferException($roomBookingsBufferException)
  {
    $this->roomBookingsBufferException = $roomBookingsBufferException;
  }
  /**
   * @return string
   */
  public function getRoomBookingsBufferException()
  {
    return $this->roomBookingsBufferException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MinimizedContact::class, 'Google_Service_MyBusinessLodging_MinimizedContact');
