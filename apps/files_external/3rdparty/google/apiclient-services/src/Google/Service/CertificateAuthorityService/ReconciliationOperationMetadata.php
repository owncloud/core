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

class Google_Service_CertificateAuthorityService_ReconciliationOperationMetadata extends Google_Model
{
  public $deleteResource;
  public $exclusiveAction;

  public function setDeleteResource($deleteResource)
  {
    $this->deleteResource = $deleteResource;
  }
  public function getDeleteResource()
  {
    return $this->deleteResource;
  }
  public function setExclusiveAction($exclusiveAction)
  {
    $this->exclusiveAction = $exclusiveAction;
  }
  public function getExclusiveAction()
  {
    return $this->exclusiveAction;
  }
}
