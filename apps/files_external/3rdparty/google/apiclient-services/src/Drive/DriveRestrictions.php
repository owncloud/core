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

class DriveRestrictions extends \Google\Model
{
  public $adminManagedRestrictions;
  public $copyRequiresWriterPermission;
  public $domainUsersOnly;
  public $driveMembersOnly;

  public function setAdminManagedRestrictions($adminManagedRestrictions)
  {
    $this->adminManagedRestrictions = $adminManagedRestrictions;
  }
  public function getAdminManagedRestrictions()
  {
    return $this->adminManagedRestrictions;
  }
  public function setCopyRequiresWriterPermission($copyRequiresWriterPermission)
  {
    $this->copyRequiresWriterPermission = $copyRequiresWriterPermission;
  }
  public function getCopyRequiresWriterPermission()
  {
    return $this->copyRequiresWriterPermission;
  }
  public function setDomainUsersOnly($domainUsersOnly)
  {
    $this->domainUsersOnly = $domainUsersOnly;
  }
  public function getDomainUsersOnly()
  {
    return $this->domainUsersOnly;
  }
  public function setDriveMembersOnly($driveMembersOnly)
  {
    $this->driveMembersOnly = $driveMembersOnly;
  }
  public function getDriveMembersOnly()
  {
    return $this->driveMembersOnly;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DriveRestrictions::class, 'Google_Service_Drive_DriveRestrictions');
