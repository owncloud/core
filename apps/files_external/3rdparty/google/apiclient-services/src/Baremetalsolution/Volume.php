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

namespace Google\Service\Baremetalsolution;

class Volume extends \Google\Model
{
  public $autoGrownSizeGib;
  public $currentSizeGib;
  public $name;
  public $remainingSpaceGib;
  public $requestedSizeGib;
  protected $snapshotReservationDetailType = SnapshotReservationDetail::class;
  protected $snapshotReservationDetailDataType = '';
  public $state;
  public $storageType;

  public function setAutoGrownSizeGib($autoGrownSizeGib)
  {
    $this->autoGrownSizeGib = $autoGrownSizeGib;
  }
  public function getAutoGrownSizeGib()
  {
    return $this->autoGrownSizeGib;
  }
  public function setCurrentSizeGib($currentSizeGib)
  {
    $this->currentSizeGib = $currentSizeGib;
  }
  public function getCurrentSizeGib()
  {
    return $this->currentSizeGib;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRemainingSpaceGib($remainingSpaceGib)
  {
    $this->remainingSpaceGib = $remainingSpaceGib;
  }
  public function getRemainingSpaceGib()
  {
    return $this->remainingSpaceGib;
  }
  public function setRequestedSizeGib($requestedSizeGib)
  {
    $this->requestedSizeGib = $requestedSizeGib;
  }
  public function getRequestedSizeGib()
  {
    return $this->requestedSizeGib;
  }
  /**
   * @param SnapshotReservationDetail
   */
  public function setSnapshotReservationDetail(SnapshotReservationDetail $snapshotReservationDetail)
  {
    $this->snapshotReservationDetail = $snapshotReservationDetail;
  }
  /**
   * @return SnapshotReservationDetail
   */
  public function getSnapshotReservationDetail()
  {
    return $this->snapshotReservationDetail;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStorageType($storageType)
  {
    $this->storageType = $storageType;
  }
  public function getStorageType()
  {
    return $this->storageType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Volume::class, 'Google_Service_Baremetalsolution_Volume');
