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
  /**
   * @var bool
   */
  public $canAddChildren;
  /**
   * @var bool
   */
  public $canChangeCopyRequiresWriterPermissionRestriction;
  /**
   * @var bool
   */
  public $canChangeDomainUsersOnlyRestriction;
  /**
   * @var bool
   */
  public $canChangeDriveBackground;
  /**
   * @var bool
   */
  public $canChangeDriveMembersOnlyRestriction;
  /**
   * @var bool
   */
  public $canChangeSharingFoldersRequiresOrganizerPermissionRestriction;
  /**
   * @var bool
   */
  public $canComment;
  /**
   * @var bool
   */
  public $canCopy;
  /**
   * @var bool
   */
  public $canDeleteChildren;
  /**
   * @var bool
   */
  public $canDeleteDrive;
  /**
   * @var bool
   */
  public $canDownload;
  /**
   * @var bool
   */
  public $canEdit;
  /**
   * @var bool
   */
  public $canListChildren;
  /**
   * @var bool
   */
  public $canManageMembers;
  /**
   * @var bool
   */
  public $canReadRevisions;
  /**
   * @var bool
   */
  public $canRename;
  /**
   * @var bool
   */
  public $canRenameDrive;
  /**
   * @var bool
   */
  public $canResetDriveRestrictions;
  /**
   * @var bool
   */
  public $canShare;
  /**
   * @var bool
   */
  public $canTrashChildren;

  /**
   * @param bool
   */
  public function setCanAddChildren($canAddChildren)
  {
    $this->canAddChildren = $canAddChildren;
  }
  /**
   * @return bool
   */
  public function getCanAddChildren()
  {
    return $this->canAddChildren;
  }
  /**
   * @param bool
   */
  public function setCanChangeCopyRequiresWriterPermissionRestriction($canChangeCopyRequiresWriterPermissionRestriction)
  {
    $this->canChangeCopyRequiresWriterPermissionRestriction = $canChangeCopyRequiresWriterPermissionRestriction;
  }
  /**
   * @return bool
   */
  public function getCanChangeCopyRequiresWriterPermissionRestriction()
  {
    return $this->canChangeCopyRequiresWriterPermissionRestriction;
  }
  /**
   * @param bool
   */
  public function setCanChangeDomainUsersOnlyRestriction($canChangeDomainUsersOnlyRestriction)
  {
    $this->canChangeDomainUsersOnlyRestriction = $canChangeDomainUsersOnlyRestriction;
  }
  /**
   * @return bool
   */
  public function getCanChangeDomainUsersOnlyRestriction()
  {
    return $this->canChangeDomainUsersOnlyRestriction;
  }
  /**
   * @param bool
   */
  public function setCanChangeDriveBackground($canChangeDriveBackground)
  {
    $this->canChangeDriveBackground = $canChangeDriveBackground;
  }
  /**
   * @return bool
   */
  public function getCanChangeDriveBackground()
  {
    return $this->canChangeDriveBackground;
  }
  /**
   * @param bool
   */
  public function setCanChangeDriveMembersOnlyRestriction($canChangeDriveMembersOnlyRestriction)
  {
    $this->canChangeDriveMembersOnlyRestriction = $canChangeDriveMembersOnlyRestriction;
  }
  /**
   * @return bool
   */
  public function getCanChangeDriveMembersOnlyRestriction()
  {
    return $this->canChangeDriveMembersOnlyRestriction;
  }
  /**
   * @param bool
   */
  public function setCanChangeSharingFoldersRequiresOrganizerPermissionRestriction($canChangeSharingFoldersRequiresOrganizerPermissionRestriction)
  {
    $this->canChangeSharingFoldersRequiresOrganizerPermissionRestriction = $canChangeSharingFoldersRequiresOrganizerPermissionRestriction;
  }
  /**
   * @return bool
   */
  public function getCanChangeSharingFoldersRequiresOrganizerPermissionRestriction()
  {
    return $this->canChangeSharingFoldersRequiresOrganizerPermissionRestriction;
  }
  /**
   * @param bool
   */
  public function setCanComment($canComment)
  {
    $this->canComment = $canComment;
  }
  /**
   * @return bool
   */
  public function getCanComment()
  {
    return $this->canComment;
  }
  /**
   * @param bool
   */
  public function setCanCopy($canCopy)
  {
    $this->canCopy = $canCopy;
  }
  /**
   * @return bool
   */
  public function getCanCopy()
  {
    return $this->canCopy;
  }
  /**
   * @param bool
   */
  public function setCanDeleteChildren($canDeleteChildren)
  {
    $this->canDeleteChildren = $canDeleteChildren;
  }
  /**
   * @return bool
   */
  public function getCanDeleteChildren()
  {
    return $this->canDeleteChildren;
  }
  /**
   * @param bool
   */
  public function setCanDeleteDrive($canDeleteDrive)
  {
    $this->canDeleteDrive = $canDeleteDrive;
  }
  /**
   * @return bool
   */
  public function getCanDeleteDrive()
  {
    return $this->canDeleteDrive;
  }
  /**
   * @param bool
   */
  public function setCanDownload($canDownload)
  {
    $this->canDownload = $canDownload;
  }
  /**
   * @return bool
   */
  public function getCanDownload()
  {
    return $this->canDownload;
  }
  /**
   * @param bool
   */
  public function setCanEdit($canEdit)
  {
    $this->canEdit = $canEdit;
  }
  /**
   * @return bool
   */
  public function getCanEdit()
  {
    return $this->canEdit;
  }
  /**
   * @param bool
   */
  public function setCanListChildren($canListChildren)
  {
    $this->canListChildren = $canListChildren;
  }
  /**
   * @return bool
   */
  public function getCanListChildren()
  {
    return $this->canListChildren;
  }
  /**
   * @param bool
   */
  public function setCanManageMembers($canManageMembers)
  {
    $this->canManageMembers = $canManageMembers;
  }
  /**
   * @return bool
   */
  public function getCanManageMembers()
  {
    return $this->canManageMembers;
  }
  /**
   * @param bool
   */
  public function setCanReadRevisions($canReadRevisions)
  {
    $this->canReadRevisions = $canReadRevisions;
  }
  /**
   * @return bool
   */
  public function getCanReadRevisions()
  {
    return $this->canReadRevisions;
  }
  /**
   * @param bool
   */
  public function setCanRename($canRename)
  {
    $this->canRename = $canRename;
  }
  /**
   * @return bool
   */
  public function getCanRename()
  {
    return $this->canRename;
  }
  /**
   * @param bool
   */
  public function setCanRenameDrive($canRenameDrive)
  {
    $this->canRenameDrive = $canRenameDrive;
  }
  /**
   * @return bool
   */
  public function getCanRenameDrive()
  {
    return $this->canRenameDrive;
  }
  /**
   * @param bool
   */
  public function setCanResetDriveRestrictions($canResetDriveRestrictions)
  {
    $this->canResetDriveRestrictions = $canResetDriveRestrictions;
  }
  /**
   * @return bool
   */
  public function getCanResetDriveRestrictions()
  {
    return $this->canResetDriveRestrictions;
  }
  /**
   * @param bool
   */
  public function setCanShare($canShare)
  {
    $this->canShare = $canShare;
  }
  /**
   * @return bool
   */
  public function getCanShare()
  {
    return $this->canShare;
  }
  /**
   * @param bool
   */
  public function setCanTrashChildren($canTrashChildren)
  {
    $this->canTrashChildren = $canTrashChildren;
  }
  /**
   * @return bool
   */
  public function getCanTrashChildren()
  {
    return $this->canTrashChildren;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DriveCapabilities::class, 'Google_Service_Drive_DriveCapabilities');
