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

class AppsDynamiteRoomUpdatedMetadataGroupDetailsUpdatedMetadata extends \Google\Model
{
  protected $newGroupDetailsType = AppsDynamiteSharedGroupDetails::class;
  protected $newGroupDetailsDataType = '';
  protected $prevGroupDetailsType = AppsDynamiteSharedGroupDetails::class;
  protected $prevGroupDetailsDataType = '';

  /**
   * @param AppsDynamiteSharedGroupDetails
   */
  public function setNewGroupDetails(AppsDynamiteSharedGroupDetails $newGroupDetails)
  {
    $this->newGroupDetails = $newGroupDetails;
  }
  /**
   * @return AppsDynamiteSharedGroupDetails
   */
  public function getNewGroupDetails()
  {
    return $this->newGroupDetails;
  }
  /**
   * @param AppsDynamiteSharedGroupDetails
   */
  public function setPrevGroupDetails(AppsDynamiteSharedGroupDetails $prevGroupDetails)
  {
    $this->prevGroupDetails = $prevGroupDetails;
  }
  /**
   * @return AppsDynamiteSharedGroupDetails
   */
  public function getPrevGroupDetails()
  {
    return $this->prevGroupDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteRoomUpdatedMetadataGroupDetailsUpdatedMetadata::class, 'Google_Service_CloudSearch_AppsDynamiteRoomUpdatedMetadataGroupDetailsUpdatedMetadata');
