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

namespace Google\Service\CloudSearch;

class RestrictItem extends \Google\Model
{
  protected $driveFollowUpRestrictType = DriveFollowUpRestrict::class;
  protected $driveFollowUpRestrictDataType = '';
  protected $driveLocationRestrictType = DriveLocationRestrict::class;
  protected $driveLocationRestrictDataType = '';
  protected $driveMimeTypeRestrictType = DriveMimeTypeRestrict::class;
  protected $driveMimeTypeRestrictDataType = '';
  protected $driveTimeSpanRestrictType = DriveTimeSpanRestrict::class;
  protected $driveTimeSpanRestrictDataType = '';
  public $searchOperator;

  /**
   * @param DriveFollowUpRestrict
   */
  public function setDriveFollowUpRestrict(DriveFollowUpRestrict $driveFollowUpRestrict)
  {
    $this->driveFollowUpRestrict = $driveFollowUpRestrict;
  }
  /**
   * @return DriveFollowUpRestrict
   */
  public function getDriveFollowUpRestrict()
  {
    return $this->driveFollowUpRestrict;
  }
  /**
   * @param DriveLocationRestrict
   */
  public function setDriveLocationRestrict(DriveLocationRestrict $driveLocationRestrict)
  {
    $this->driveLocationRestrict = $driveLocationRestrict;
  }
  /**
   * @return DriveLocationRestrict
   */
  public function getDriveLocationRestrict()
  {
    return $this->driveLocationRestrict;
  }
  /**
   * @param DriveMimeTypeRestrict
   */
  public function setDriveMimeTypeRestrict(DriveMimeTypeRestrict $driveMimeTypeRestrict)
  {
    $this->driveMimeTypeRestrict = $driveMimeTypeRestrict;
  }
  /**
   * @return DriveMimeTypeRestrict
   */
  public function getDriveMimeTypeRestrict()
  {
    return $this->driveMimeTypeRestrict;
  }
  /**
   * @param DriveTimeSpanRestrict
   */
  public function setDriveTimeSpanRestrict(DriveTimeSpanRestrict $driveTimeSpanRestrict)
  {
    $this->driveTimeSpanRestrict = $driveTimeSpanRestrict;
  }
  /**
   * @return DriveTimeSpanRestrict
   */
  public function getDriveTimeSpanRestrict()
  {
    return $this->driveTimeSpanRestrict;
  }
  public function setSearchOperator($searchOperator)
  {
    $this->searchOperator = $searchOperator;
  }
  public function getSearchOperator()
  {
    return $this->searchOperator;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RestrictItem::class, 'Google_Service_CloudSearch_RestrictItem');
