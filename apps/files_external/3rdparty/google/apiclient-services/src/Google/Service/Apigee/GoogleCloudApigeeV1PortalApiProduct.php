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

class Google_Service_Apigee_GoogleCloudApigeeV1PortalApiProduct extends Google_Collection
{
  protected $collection_key = 'proxies';
  public $approvalType;
  public $description;
  public $displayName;
  public $isChecked;
  public $isPublic;
  public $name;
  public $proxies;
  public $rights;
  public $status;

  public function setApprovalType($approvalType)
  {
    $this->approvalType = $approvalType;
  }
  public function getApprovalType()
  {
    return $this->approvalType;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setIsChecked($isChecked)
  {
    $this->isChecked = $isChecked;
  }
  public function getIsChecked()
  {
    return $this->isChecked;
  }
  public function setIsPublic($isPublic)
  {
    $this->isPublic = $isPublic;
  }
  public function getIsPublic()
  {
    return $this->isPublic;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProxies($proxies)
  {
    $this->proxies = $proxies;
  }
  public function getProxies()
  {
    return $this->proxies;
  }
  public function setRights($rights)
  {
    $this->rights = $rights;
  }
  public function getRights()
  {
    return $this->rights;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}
