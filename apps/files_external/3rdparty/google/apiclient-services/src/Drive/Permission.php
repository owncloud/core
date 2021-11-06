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

namespace Google\Service\Drive;

class Permission extends \Google\Collection
{
  protected $collection_key = 'teamDrivePermissionDetails';
  public $allowFileDiscovery;
  public $deleted;
  public $displayName;
  public $domain;
  public $emailAddress;
  public $expirationTime;
  public $id;
  public $kind;
  protected $permissionDetailsType = PermissionPermissionDetails::class;
  protected $permissionDetailsDataType = 'array';
  public $photoLink;
  public $role;
  protected $teamDrivePermissionDetailsType = PermissionTeamDrivePermissionDetails::class;
  protected $teamDrivePermissionDetailsDataType = 'array';
  public $type;
  public $view;

  public function setAllowFileDiscovery($allowFileDiscovery)
  {
    $this->allowFileDiscovery = $allowFileDiscovery;
  }
  public function getAllowFileDiscovery()
  {
    return $this->allowFileDiscovery;
  }
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  public function getDeleted()
  {
    return $this->deleted;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  public function getDomain()
  {
    return $this->domain;
  }
  public function setEmailAddress($emailAddress)
  {
    $this->emailAddress = $emailAddress;
  }
  public function getEmailAddress()
  {
    return $this->emailAddress;
  }
  public function setExpirationTime($expirationTime)
  {
    $this->expirationTime = $expirationTime;
  }
  public function getExpirationTime()
  {
    return $this->expirationTime;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param PermissionPermissionDetails[]
   */
  public function setPermissionDetails($permissionDetails)
  {
    $this->permissionDetails = $permissionDetails;
  }
  /**
   * @return PermissionPermissionDetails[]
   */
  public function getPermissionDetails()
  {
    return $this->permissionDetails;
  }
  public function setPhotoLink($photoLink)
  {
    $this->photoLink = $photoLink;
  }
  public function getPhotoLink()
  {
    return $this->photoLink;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
  /**
   * @param PermissionTeamDrivePermissionDetails[]
   */
  public function setTeamDrivePermissionDetails($teamDrivePermissionDetails)
  {
    $this->teamDrivePermissionDetails = $teamDrivePermissionDetails;
  }
  /**
   * @return PermissionTeamDrivePermissionDetails[]
   */
  public function getTeamDrivePermissionDetails()
  {
    return $this->teamDrivePermissionDetails;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setView($view)
  {
    $this->view = $view;
  }
  public function getView()
  {
    return $this->view;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Permission::class, 'Google_Service_Drive_Permission');
