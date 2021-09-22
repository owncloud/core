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

class BulkEditAdvertiserAssignedTargetingOptionsRequest extends \Google\Collection
{
  protected $collection_key = 'deleteRequests';
  protected $createRequestsType = CreateAssignedTargetingOptionsRequest::class;
  protected $createRequestsDataType = 'array';
  protected $deleteRequestsType = DeleteAssignedTargetingOptionsRequest::class;
  protected $deleteRequestsDataType = 'array';

  /**
   * @param CreateAssignedTargetingOptionsRequest[]
   */
  public function setCreateRequests($createRequests)
  {
    $this->createRequests = $createRequests;
  }
  /**
   * @return CreateAssignedTargetingOptionsRequest[]
   */
  public function getCreateRequests()
  {
    return $this->createRequests;
  }
  /**
   * @param DeleteAssignedTargetingOptionsRequest[]
   */
  public function setDeleteRequests($deleteRequests)
  {
    $this->deleteRequests = $deleteRequests;
  }
  /**
   * @return DeleteAssignedTargetingOptionsRequest[]
   */
  public function getDeleteRequests()
  {
    return $this->deleteRequests;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BulkEditAdvertiserAssignedTargetingOptionsRequest::class, 'Google_Service_DisplayVideo_BulkEditAdvertiserAssignedTargetingOptionsRequest');
