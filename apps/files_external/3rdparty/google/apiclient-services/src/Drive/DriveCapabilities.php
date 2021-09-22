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

class DriveCapabilities extends \Google\Model
{
  public $canAddChildren;
  public $canChangeCopyRequiresWriterPermissionRestriction;
  public $canChangeDomainUsersOnlyRestriction;
  public $canChangeDriveBackground;
  public $canChangeDriveMembersOnlyRestriction;
  public $canComment;
  public $canCopy;
  public $canDeleteChildren;
  public $canDeleteDrive;
  public $canDownload;
  public $canEdit;
  public $canListChildren;
  public $canManageMembers;
  public $canReadRevisions;
  public $canRename;
  public $canRenameDrive;
  public $canShare;
  public $canTrashChildren;

  public function setCanAddChildren($canAddChildren)
  {
    $this->canAddChildren = $canAddChildren;
  }
  public function getCanAddChildren()
  {
    return $this->canAddChildren;
  }
  public function setCanChangeCopyRequiresWriterPermissionRestriction($canChangeCopyRequiresWriterPermissionRestriction)
  {
    $this->canChangeCopyRequiresWriterPermissionRestriction = $canChangeCopyRequiresWriterPermissionRestriction;
  }
  public function getCanChangeCopyRequiresWriterPermissionRestriction()
  {
    return $this->canChangeCopyRequiresWriterPermissionRestriction;
  }
  public function setCanChangeDomainUsersOnlyRestriction($canChangeDomainUsersOnlyRestriction)
  {
    $this->canChangeDomainUsersOnlyRestriction = $canChangeDomainUsersOnlyRestriction;
  }
  public function getCanChangeDomainUsersOnlyRestriction()
  {
    return $this->canChangeDomainUsersOnlyRestriction;
  }
  public function setCanChangeDriveBackground($canChangeDriveBackground)
  {
    $this->canChangeDriveBackground = $canChangeDriveBackground;
  }
  public function getCanChangeDriveBackground()
  {
    return $this->canChangeDriveBackground;
  }
  public function setCanChangeDriveMembersOnlyRestriction($canChangeDriveMembersOnlyRestriction)
  {
    $this->canChangeDriveMembersOnlyRestriction = $canChangeDriveMembersOnlyRestriction;
  }
  public function getCanChangeDriveMembersOnlyRestriction()
  {
    return $this->canChangeDriveMembersOnlyRestriction;
  }
  public function setCanComment($canComment)
  {
    $this->canComment = $canComment;
  }
  public function getCanComment()
  {
    return $this->canComment;
  }
  public function setCanCopy($canCopy)
  {
    $this->canCopy = $canCopy;
  }
  public function getCanCopy()
  {
    return $this->canCopy;
  }
  public function setCanDeleteChildren($canDeleteChildren)
  {
    $this->canDeleteChildren = $canDeleteChildren;
  }
  public function getCanDeleteChildren()
  {
    return $this->canDeleteChildren;
  }
  public function setCanDeleteDrive($canDeleteDrive)
  {
    $this->canDeleteDrive = $canDeleteDrive;
  }
  public function getCanDeleteDrive()
  {
    return $this->canDeleteDrive;
  }
  public function setCanDownload($canDownload)
  {
    $this->canDownload = $canDownload;
  }
  public function getCanDownload()
  {
    return $this->canDownload;
  }
  public function setCanEdit($canEdit)
  {
    $this->canEdit = $canEdit;
  }
  public function getCanEdit()
  {
    return $this->canEdit;
  }
  public function setCanListChildren($canListChildren)
  {
    $this->canListChildren = $canListChildren;
  }
  public function getCanListChildren()
  {
    return $this->canListChildren;
  }
  public function setCanManageMembers($canManageMembers)
  {
    $this->canManageMembers = $canManageMembers;
  }
  public function getCanManageMembers()
  {
    return $this->canManageMembers;
  }
  public function setCanReadRevisions($canReadRevisions)
  {
    $this->canReadRevisions = $canReadRevisions;
  }
  public function getCanReadRevisions()
  {
    return $this->canReadRevisions;
  }
  public function setCanRename($canRename)
  {
    $this->canRename = $canRename;
  }
  public function getCanRename()
  {
    return $this->canRename;
  }
  public function setCanRenameDrive($canRenameDrive)
  {
    $this->canRenameDrive = $canRenameDrive;
  }
  public function getCanRenameDrive()
  {
    return $this->canRenameDrive;
  }
  public function setCanShare($canShare)
  {
    $this->canShare = $canShare;
  }
  public function getCanShare()
  {
    return $this->canShare;
  }
  public function setCanTrashChildren($canTrashChildren)
  {
    $this->canTrashChildren = $canTrashChildren;
  }
  public function getCanTrashChildren()
  {
    return $this->canTrashChildren;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DriveCapabilities::class, 'Google_Service_Drive_DriveCapabilities');
