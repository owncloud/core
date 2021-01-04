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

class Google_Service_DisplayVideo_BulkEditPartnerAssignedTargetingOptionsRequest extends Google_Collection
{
  protected $collection_key = 'deleteRequests';
  protected $createRequestsType = 'Google_Service_DisplayVideo_CreateAssignedTargetingOptionsRequest';
  protected $createRequestsDataType = 'array';
  protected $deleteRequestsType = 'Google_Service_DisplayVideo_DeleteAssignedTargetingOptionsRequest';
  protected $deleteRequestsDataType = 'array';

  /**
   * @param Google_Service_DisplayVideo_CreateAssignedTargetingOptionsRequest[]
   */
  public function setCreateRequests($createRequests)
  {
    $this->createRequests = $createRequests;
  }
  /**
   * @return Google_Service_DisplayVideo_CreateAssignedTargetingOptionsRequest[]
   */
  public function getCreateRequests()
  {
    return $this->createRequests;
  }
  /**
   * @param Google_Service_DisplayVideo_DeleteAssignedTargetingOptionsRequest[]
   */
  public function setDeleteRequests($deleteRequests)
  {
    $this->deleteRequests = $deleteRequests;
  }
  /**
   * @return Google_Service_DisplayVideo_DeleteAssignedTargetingOptionsRequest[]
   */
  public function getDeleteRequests()
  {
    return $this->deleteRequests;
  }
}
