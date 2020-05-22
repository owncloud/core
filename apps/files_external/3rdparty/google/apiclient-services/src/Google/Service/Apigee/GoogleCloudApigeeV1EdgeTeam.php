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

class Google_Service_Apigee_GoogleCloudApigeeV1EdgeTeam extends Google_Model
{
  protected $internal_gapi_mappings = array(
        "createdAt" => "created_at",
        "updatedAt" => "updated_at",
  );
  public $createdBy;
  public $createdAt;
  public $displayName;
  public $id;
  public $name;
  public $organization;
  public $updatedBy;
  public $updatedAt;

  public function setCreatedBy($createdBy)
  {
    $this->createdBy = $createdBy;
  }
  public function getCreatedBy()
  {
    return $this->createdBy;
  }
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
  public function getCreatedAt()
  {
    return $this->createdAt;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOrganization($organization)
  {
    $this->organization = $organization;
  }
  public function getOrganization()
  {
    return $this->organization;
  }
  public function setUpdatedBy($updatedBy)
  {
    $this->updatedBy = $updatedBy;
  }
  public function getUpdatedBy()
  {
    return $this->updatedBy;
  }
  public function setUpdatedAt($updatedAt)
  {
    $this->updatedAt = $updatedAt;
  }
  public function getUpdatedAt()
  {
    return $this->updatedAt;
  }
}
