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
  /**
   * @var bool
   */
  public $allowFileDiscovery;
  /**
   * @var bool
   */
  public $deleted;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $domain;
  /**
   * @var string
   */
  public $emailAddress;
  /**
   * @var string
   */
  public $expirationTime;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var bool
   */
  public $pendingOwner;
  protected $permissionDetailsType = PermissionPermissionDetails::class;
  protected $permissionDetailsDataType = 'array';
  /**
   * @var string
   */
  public $photoLink;
  /**
   * @var string
   */
  public $role;
  protected $teamDrivePermissionDetailsType = PermissionTeamDrivePermissionDetails::class;
  protected $teamDrivePermissionDetailsDataType = 'array';
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $view;

  /**
   * @param bool
   */
  public function setAllowFileDiscovery($allowFileDiscovery)
  {
    $this->allowFileDiscovery = $allowFileDiscovery;
  }
  /**
   * @return bool
   */
  public function getAllowFileDiscovery()
  {
    return $this->allowFileDiscovery;
  }
  /**
   * @param bool
   */
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  /**
   * @return bool
   */
  public function getDeleted()
  {
    return $this->deleted;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return string
   */
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param string
   */
  public function setEmailAddress($emailAddress)
  {
    $this->emailAddress = $emailAddress;
  }
  /**
   * @return string
   */
  public function getEmailAddress()
  {
    return $this->emailAddress;
  }
  /**
   * @param string
   */
  public function setExpirationTime($expirationTime)
  {
    $this->expirationTime = $expirationTime;
  }
  /**
   * @return string
   */
  public function getExpirationTime()
  {
    return $this->expirationTime;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param bool
   */
  public function setPendingOwner($pendingOwner)
  {
    $this->pendingOwner = $pendingOwner;
  }
  /**
   * @return bool
   */
  public function getPendingOwner()
  {
    return $this->pendingOwner;
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
  /**
   * @param string
   */
  public function setPhotoLink($photoLink)
  {
    $this->photoLink = $photoLink;
  }
  /**
   * @return string
   */
  public function getPhotoLink()
  {
    return $this->photoLink;
  }
  /**
   * @param string
   */
  public function setRole($role)
  {
    $this->role = $role;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setView($view)
  {
    $this->view = $view;
  }
  /**
   * @return string
   */
  public function getView()
  {
    return $this->view;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Permission::class, 'Google_Service_Drive_Permission');
