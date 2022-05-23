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

class TeamDriveCapabilities extends \Google\Model
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
  public $canChangeTeamDriveBackground;
  /**
   * @var bool
   */
  public $canChangeTeamMembersOnlyRestriction;
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
  public $canDeleteTeamDrive;
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
  public $canRemoveChildren;
  /**
   * @var bool
   */
  public $canRename;
  /**
   * @var bool
   */
  public $canRenameTeamDrive;
  /**
   * @var bool
   */
  public $canResetTeamDriveRestrictions;
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
  public function setCanChangeTeamDriveBackground($canChangeTeamDriveBackground)
  {
    $this->canChangeTeamDriveBackground = $canChangeTeamDriveBackground;
  }
  /**
   * @return bool
   */
  public function getCanChangeTeamDriveBackground()
  {
    return $this->canChangeTeamDriveBackground;
  }
  /**
   * @param bool
   */
  public function setCanChangeTeamMembersOnlyRestriction($canChangeTeamMembersOnlyRestriction)
  {
    $this->canChangeTeamMembersOnlyRestriction = $canChangeTeamMembersOnlyRestriction;
  }
  /**
   * @return bool
   */
  public function getCanChangeTeamMembersOnlyRestriction()
  {
    return $this->canChangeTeamMembersOnlyRestriction;
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
  public function setCanDeleteTeamDrive($canDeleteTeamDrive)
  {
    $this->canDeleteTeamDrive = $canDeleteTeamDrive;
  }
  /**
   * @return bool
   */
  public function getCanDeleteTeamDrive()
  {
    return $this->canDeleteTeamDrive;
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
  public function setCanRemoveChildren($canRemoveChildren)
  {
    $this->canRemoveChildren = $canRemoveChildren;
  }
  /**
   * @return bool
   */
  public function getCanRemoveChildren()
  {
    return $this->canRemoveChildren;
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
  public function setCanRenameTeamDrive($canRenameTeamDrive)
  {
    $this->canRenameTeamDrive = $canRenameTeamDrive;
  }
  /**
   * @return bool
   */
  public function getCanRenameTeamDrive()
  {
    return $this->canRenameTeamDrive;
  }
  /**
   * @param bool
   */
  public function setCanResetTeamDriveRestrictions($canResetTeamDriveRestrictions)
  {
    $this->canResetTeamDriveRestrictions = $canResetTeamDriveRestrictions;
  }
  /**
   * @return bool
   */
  public function getCanResetTeamDriveRestrictions()
  {
    return $this->canResetTeamDriveRestrictions;
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
class_alias(TeamDriveCapabilities::class, 'Google_Service_Drive_TeamDriveCapabilities');
