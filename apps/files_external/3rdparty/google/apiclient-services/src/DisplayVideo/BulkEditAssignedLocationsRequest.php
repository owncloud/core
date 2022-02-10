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

namespace Google\Service\DisplayVideo;

class BulkEditAssignedLocationsRequest extends \Google\Collection
{
  protected $collection_key = 'deletedAssignedLocations';
  protected $createdAssignedLocationsType = AssignedLocation::class;
  protected $createdAssignedLocationsDataType = 'array';
  /**
   * @var string[]
   */
  public $deletedAssignedLocations;

  /**
   * @param AssignedLocation[]
   */
  public function setCreatedAssignedLocations($createdAssignedLocations)
  {
    $this->createdAssignedLocations = $createdAssignedLocations;
  }
  /**
   * @return AssignedLocation[]
   */
  public function getCreatedAssignedLocations()
  {
    return $this->createdAssignedLocations;
  }
  /**
   * @param string[]
   */
  public function setDeletedAssignedLocations($deletedAssignedLocations)
  {
    $this->deletedAssignedLocations = $deletedAssignedLocations;
  }
  /**
   * @return string[]
   */
  public function getDeletedAssignedLocations()
  {
    return $this->deletedAssignedLocations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BulkEditAssignedLocationsRequest::class, 'Google_Service_DisplayVideo_BulkEditAssignedLocationsRequest');
