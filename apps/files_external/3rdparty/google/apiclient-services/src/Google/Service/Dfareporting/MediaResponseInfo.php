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

class Google_Service_Dfareporting_MediaResponseInfo extends Google_Model
{
  public $customData;
  public $dataStorageTransform;
  public $dynamicDropTarget;
  public $dynamicDropzone;
  public $requestClass;
  public $trafficClassField;
  public $verifyHashFromHeader;

  public function setCustomData($customData)
  {
    $this->customData = $customData;
  }
  public function getCustomData()
  {
    return $this->customData;
  }
  public function setDataStorageTransform($dataStorageTransform)
  {
    $this->dataStorageTransform = $dataStorageTransform;
  }
  public function getDataStorageTransform()
  {
    return $this->dataStorageTransform;
  }
  public function setDynamicDropTarget($dynamicDropTarget)
  {
    $this->dynamicDropTarget = $dynamicDropTarget;
  }
  public function getDynamicDropTarget()
  {
    return $this->dynamicDropTarget;
  }
  public function setDynamicDropzone($dynamicDropzone)
  {
    $this->dynamicDropzone = $dynamicDropzone;
  }
  public function getDynamicDropzone()
  {
    return $this->dynamicDropzone;
  }
  public function setRequestClass($requestClass)
  {
    $this->requestClass = $requestClass;
  }
  public function getRequestClass()
  {
    return $this->requestClass;
  }
  public function setTrafficClassField($trafficClassField)
  {
    $this->trafficClassField = $trafficClassField;
  }
  public function getTrafficClassField()
  {
    return $this->trafficClassField;
  }
  public function setVerifyHashFromHeader($verifyHashFromHeader)
  {
    $this->verifyHashFromHeader = $verifyHashFromHeader;
  }
  public function getVerifyHashFromHeader()
  {
    return $this->verifyHashFromHeader;
  }
}
