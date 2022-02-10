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

class PersonalProtection extends \Google\Model
{
  /**
   * @var bool
   */
  public $commonAreasOfferSanitizingItems;
  /**
   * @var string
   */
  public $commonAreasOfferSanitizingItemsException;
  /**
   * @var bool
   */
  public $faceMaskRequired;
  /**
   * @var string
   */
  public $faceMaskRequiredException;
  /**
   * @var bool
   */
  public $guestRoomHygieneKitsAvailable;
  /**
   * @var string
   */
  public $guestRoomHygieneKitsAvailableException;
  /**
   * @var bool
   */
  public $protectiveEquipmentAvailable;
  /**
   * @var string
   */
  public $protectiveEquipmentAvailableException;

  /**
   * @param bool
   */
  public function setCommonAreasOfferSanitizingItems($commonAreasOfferSanitizingItems)
  {
    $this->commonAreasOfferSanitizingItems = $commonAreasOfferSanitizingItems;
  }
  /**
   * @return bool
   */
  public function getCommonAreasOfferSanitizingItems()
  {
    return $this->commonAreasOfferSanitizingItems;
  }
  /**
   * @param string
   */
  public function setCommonAreasOfferSanitizingItemsException($commonAreasOfferSanitizingItemsException)
  {
    $this->commonAreasOfferSanitizingItemsException = $commonAreasOfferSanitizingItemsException;
  }
  /**
   * @return string
   */
  public function getCommonAreasOfferSanitizingItemsException()
  {
    return $this->commonAreasOfferSanitizingItemsException;
  }
  /**
   * @param bool
   */
  public function setFaceMaskRequired($faceMaskRequired)
  {
    $this->faceMaskRequired = $faceMaskRequired;
  }
  /**
   * @return bool
   */
  public function getFaceMaskRequired()
  {
    return $this->faceMaskRequired;
  }
  /**
   * @param string
   */
  public function setFaceMaskRequiredException($faceMaskRequiredException)
  {
    $this->faceMaskRequiredException = $faceMaskRequiredException;
  }
  /**
   * @return string
   */
  public function getFaceMaskRequiredException()
  {
    return $this->faceMaskRequiredException;
  }
  /**
   * @param bool
   */
  public function setGuestRoomHygieneKitsAvailable($guestRoomHygieneKitsAvailable)
  {
    $this->guestRoomHygieneKitsAvailable = $guestRoomHygieneKitsAvailable;
  }
  /**
   * @return bool
   */
  public function getGuestRoomHygieneKitsAvailable()
  {
    return $this->guestRoomHygieneKitsAvailable;
  }
  /**
   * @param string
   */
  public function setGuestRoomHygieneKitsAvailableException($guestRoomHygieneKitsAvailableException)
  {
    $this->guestRoomHygieneKitsAvailableException = $guestRoomHygieneKitsAvailableException;
  }
  /**
   * @return string
   */
  public function getGuestRoomHygieneKitsAvailableException()
  {
    return $this->guestRoomHygieneKitsAvailableException;
  }
  /**
   * @param bool
   */
  public function setProtectiveEquipmentAvailable($protectiveEquipmentAvailable)
  {
    $this->protectiveEquipmentAvailable = $protectiveEquipmentAvailable;
  }
  /**
   * @return bool
   */
  public function getProtectiveEquipmentAvailable()
  {
    return $this->protectiveEquipmentAvailable;
  }
  /**
   * @param string
   */
  public function setProtectiveEquipmentAvailableException($protectiveEquipmentAvailableException)
  {
    $this->protectiveEquipmentAvailableException = $protectiveEquipmentAvailableException;
  }
  /**
   * @return string
   */
  public function getProtectiveEquipmentAvailableException()
  {
    return $this->protectiveEquipmentAvailableException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PersonalProtection::class, 'Google_Service_MyBusinessLodging_PersonalProtection');
