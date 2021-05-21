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

class Google_Service_MyBusinessLodging_PersonalProtection extends Google_Model
{
  public $commonAreasOfferSanitizingItems;
  public $commonAreasOfferSanitizingItemsException;
  public $faceMaskRequired;
  public $faceMaskRequiredException;
  public $guestRoomHygieneKitsAvailable;
  public $guestRoomHygieneKitsAvailableException;
  public $protectiveEquipmentAvailable;
  public $protectiveEquipmentAvailableException;

  public function setCommonAreasOfferSanitizingItems($commonAreasOfferSanitizingItems)
  {
    $this->commonAreasOfferSanitizingItems = $commonAreasOfferSanitizingItems;
  }
  public function getCommonAreasOfferSanitizingItems()
  {
    return $this->commonAreasOfferSanitizingItems;
  }
  public function setCommonAreasOfferSanitizingItemsException($commonAreasOfferSanitizingItemsException)
  {
    $this->commonAreasOfferSanitizingItemsException = $commonAreasOfferSanitizingItemsException;
  }
  public function getCommonAreasOfferSanitizingItemsException()
  {
    return $this->commonAreasOfferSanitizingItemsException;
  }
  public function setFaceMaskRequired($faceMaskRequired)
  {
    $this->faceMaskRequired = $faceMaskRequired;
  }
  public function getFaceMaskRequired()
  {
    return $this->faceMaskRequired;
  }
  public function setFaceMaskRequiredException($faceMaskRequiredException)
  {
    $this->faceMaskRequiredException = $faceMaskRequiredException;
  }
  public function getFaceMaskRequiredException()
  {
    return $this->faceMaskRequiredException;
  }
  public function setGuestRoomHygieneKitsAvailable($guestRoomHygieneKitsAvailable)
  {
    $this->guestRoomHygieneKitsAvailable = $guestRoomHygieneKitsAvailable;
  }
  public function getGuestRoomHygieneKitsAvailable()
  {
    return $this->guestRoomHygieneKitsAvailable;
  }
  public function setGuestRoomHygieneKitsAvailableException($guestRoomHygieneKitsAvailableException)
  {
    $this->guestRoomHygieneKitsAvailableException = $guestRoomHygieneKitsAvailableException;
  }
  public function getGuestRoomHygieneKitsAvailableException()
  {
    return $this->guestRoomHygieneKitsAvailableException;
  }
  public function setProtectiveEquipmentAvailable($protectiveEquipmentAvailable)
  {
    $this->protectiveEquipmentAvailable = $protectiveEquipmentAvailable;
  }
  public function getProtectiveEquipmentAvailable()
  {
    return $this->protectiveEquipmentAvailable;
  }
  public function setProtectiveEquipmentAvailableException($protectiveEquipmentAvailableException)
  {
    $this->protectiveEquipmentAvailableException = $protectiveEquipmentAvailableException;
  }
  public function getProtectiveEquipmentAvailableException()
  {
    return $this->protectiveEquipmentAvailableException;
  }
}
