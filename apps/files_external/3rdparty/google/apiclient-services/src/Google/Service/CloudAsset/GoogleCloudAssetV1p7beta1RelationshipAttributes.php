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

class Google_Service_CloudAsset_GoogleCloudAssetV1p7beta1RelationshipAttributes extends Google_Model
{
  public $action;
  public $sourceResourceType;
  public $targetResourceType;
  public $type;

  public function setAction($action)
  {
    $this->action = $action;
  }
  public function getAction()
  {
    return $this->action;
  }
  public function setSourceResourceType($sourceResourceType)
  {
    $this->sourceResourceType = $sourceResourceType;
  }
  public function getSourceResourceType()
  {
    return $this->sourceResourceType;
  }
  public function setTargetResourceType($targetResourceType)
  {
    $this->targetResourceType = $targetResourceType;
  }
  public function getTargetResourceType()
  {
    return $this->targetResourceType;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
