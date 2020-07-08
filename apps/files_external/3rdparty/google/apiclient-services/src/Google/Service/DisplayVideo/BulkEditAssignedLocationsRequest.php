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

class Google_Service_DisplayVideo_BulkEditAssignedLocationsRequest extends Google_Collection
{
  protected $collection_key = 'deletedAssignedLocations';
  protected $createdAssignedLocationsType = 'Google_Service_DisplayVideo_AssignedLocation';
  protected $createdAssignedLocationsDataType = 'array';
  public $deletedAssignedLocations;

  /**
   * @param Google_Service_DisplayVideo_AssignedLocation
   */
  public function setCreatedAssignedLocations($createdAssignedLocations)
  {
    $this->createdAssignedLocations = $createdAssignedLocations;
  }
  /**
   * @return Google_Service_DisplayVideo_AssignedLocation
   */
  public function getCreatedAssignedLocations()
  {
    return $this->createdAssignedLocations;
  }
  public function setDeletedAssignedLocations($deletedAssignedLocations)
  {
    $this->deletedAssignedLocations = $deletedAssignedLocations;
  }
  public function getDeletedAssignedLocations()
  {
    return $this->deletedAssignedLocations;
  }
}
