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

class DriveFileCapabilities extends \Google\Model
{
  /**
   * @var bool
   */
  public $canAcceptOwnership;
  /**
   * @var bool
   */
  public $canAddChildren;
  /**
   * @var bool
   */
  public $canAddFolderFromAnotherDrive;
  /**
   * @var bool
   */
  public $canAddMyDriveParent;
  /**
   * @var bool
   */
  public $canChangeCopyRequiresWriterPermission;
  /**
   * @var bool
   */
  public $canChangeSecurityUpdateEnabled;
  /**
   * @var bool
   */
  public $canChangeViewersCanCopyContent;
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
  public $canDelete;
  /**
   * @var bool
   */
  public $canDeleteChildren;
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
  public $canModifyContent;
  /**
   * @var bool
   */
  public $canModifyContentRestriction;
  /**
   * @var bool
   */
  public $canModifyLabels;
  /**
   * @var bool
   */
  public $canMoveChildrenOutOfDrive;
  /**
   * @var bool
   */
  public $canMoveChildrenOutOfTeamDrive;
  /**
   * @var bool
   */
  public $canMoveChildrenWithinDrive;
  /**
   * @var bool
   */
  public $canMoveChildrenWithinTeamDrive;
  /**
   * @var bool
   */
  public $canMoveItemIntoTeamDrive;
  /**
   * @var bool
   */
  public $canMoveItemOutOfDrive;
  /**
   * @var bool
   */
  public $canMoveItemOutOfTeamDrive;
  /**
   * @var bool
   */
  public $canMoveItemWithinDrive;
  /**
   * @var bool
   */
  public $canMoveItemWithinTeamDrive;
  /**
   * @var bool
   */
  public $canMoveTeamDriveItem;
  /**
   * @var bool
   */
  public $canReadDrive;
  /**
   * @var bool
   */
  public $canReadLabels;
  /**
   * @var bool
   */
  public $canReadRevisions;
  /**
   * @var bool
   */
  public $canReadTeamDrive;
  /**
   * @var bool
   */
  public $canRemoveChildren;
  /**
   * @var bool
   */
  public $canRemoveMyDriveParent;
  /**
   * @var bool
   */
  public $canRename;
  /**
   * @var bool
   */
  public $canShare;
  /**
   * @var bool
   */
  public $canTrash;
  /**
   * @var bool
   */
  public $canTrashChildren;
  /**
   * @var bool
   */
  public $canUntrash;

  /**
   * @param bool
   */
  public function setCanAcceptOwnership($canAcceptOwnership)
  {
    $this->canAcceptOwnership = $canAcceptOwnership;
  }
  /**
   * @return bool
   */
  public function getCanAcceptOwnership()
  {
    return $this->canAcceptOwnership;
  }
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
  public function setCanAddFolderFromAnotherDrive($canAddFolderFromAnotherDrive)
  {
    $this->canAddFolderFromAnotherDrive = $canAddFolderFromAnotherDrive;
  }
  /**
   * @return bool
   */
  public function getCanAddFolderFromAnotherDrive()
  {
    return $this->canAddFolderFromAnotherDrive;
  }
  /**
   * @param bool
   */
  public function setCanAddMyDriveParent($canAddMyDriveParent)
  {
    $this->canAddMyDriveParent = $canAddMyDriveParent;
  }
  /**
   * @return bool
   */
  public function getCanAddMyDriveParent()
  {
    return $this->canAddMyDriveParent;
  }
  /**
   * @param bool
   */
  public function setCanChangeCopyRequiresWriterPermission($canChangeCopyRequiresWriterPermission)
  {
    $this->canChangeCopyRequiresWriterPermission = $canChangeCopyRequiresWriterPermission;
  }
  /**
   * @return bool
   */
  public function getCanChangeCopyRequiresWriterPermission()
  {
    return $this->canChangeCopyRequiresWriterPermission;
  }
  /**
   * @param bool
   */
  public function setCanChangeSecurityUpdateEnabled($canChangeSecurityUpdateEnabled)
  {
    $this->canChangeSecurityUpdateEnabled = $canChangeSecurityUpdateEnabled;
  }
  /**
   * @return bool
   */
  public function getCanChangeSecurityUpdateEnabled()
  {
    return $this->canChangeSecurityUpdateEnabled;
  }
  /**
   * @param bool
   */
  public function setCanChangeViewersCanCopyContent($canChangeViewersCanCopyContent)
  {
    $this->canChangeViewersCanCopyContent = $canChangeViewersCanCopyContent;
  }
  /**
   * @return bool
   */
  public function getCanChangeViewersCanCopyContent()
  {
    return $this->canChangeViewersCanCopyContent;
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
  public function setCanDelete($canDelete)
  {
    $this->canDelete = $canDelete;
  }
  /**
   * @return bool
   */
  public function getCanDelete()
  {
    return $this->canDelete;
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
  public function setCanModifyContent($canModifyContent)
  {
    $this->canModifyContent = $canModifyContent;
  }
  /**
   * @return bool
   */
  public function getCanModifyContent()
  {
    return $this->canModifyContent;
  }
  /**
   * @param bool
   */
  public function setCanModifyContentRestriction($canModifyContentRestriction)
  {
    $this->canModifyContentRestriction = $canModifyContentRestriction;
  }
  /**
   * @return bool
   */
  public function getCanModifyContentRestriction()
  {
    return $this->canModifyContentRestriction;
  }
  /**
   * @param bool
   */
  public function setCanModifyLabels($canModifyLabels)
  {
    $this->canModifyLabels = $canModifyLabels;
  }
  /**
   * @return bool
   */
  public function getCanModifyLabels()
  {
    return $this->canModifyLabels;
  }
  /**
   * @param bool
   */
  public function setCanMoveChildrenOutOfDrive($canMoveChildrenOutOfDrive)
  {
    $this->canMoveChildrenOutOfDrive = $canMoveChildrenOutOfDrive;
  }
  /**
   * @return bool
   */
  public function getCanMoveChildrenOutOfDrive()
  {
    return $this->canMoveChildrenOutOfDrive;
  }
  /**
   * @param bool
   */
  public function setCanMoveChildrenOutOfTeamDrive($canMoveChildrenOutOfTeamDrive)
  {
    $this->canMoveChildrenOutOfTeamDrive = $canMoveChildrenOutOfTeamDrive;
  }
  /**
   * @return bool
   */
  public function getCanMoveChildrenOutOfTeamDrive()
  {
    return $this->canMoveChildrenOutOfTeamDrive;
  }
  /**
   * @param bool
   */
  public function setCanMoveChildrenWithinDrive($canMoveChildrenWithinDrive)
  {
    $this->canMoveChildrenWithinDrive = $canMoveChildrenWithinDrive;
  }
  /**
   * @return bool
   */
  public function getCanMoveChildrenWithinDrive()
  {
    return $this->canMoveChildrenWithinDrive;
  }
  /**
   * @param bool
   */
  public function setCanMoveChildrenWithinTeamDrive($canMoveChildrenWithinTeamDrive)
  {
    $this->canMoveChildrenWithinTeamDrive = $canMoveChildrenWithinTeamDrive;
  }
  /**
   * @return bool
   */
  public function getCanMoveChildrenWithinTeamDrive()
  {
    return $this->canMoveChildrenWithinTeamDrive;
  }
  /**
   * @param bool
   */
  public function setCanMoveItemIntoTeamDrive($canMoveItemIntoTeamDrive)
  {
    $this->canMoveItemIntoTeamDrive = $canMoveItemIntoTeamDrive;
  }
  /**
   * @return bool
   */
  public function getCanMoveItemIntoTeamDrive()
  {
    return $this->canMoveItemIntoTeamDrive;
  }
  /**
   * @param bool
   */
  public function setCanMoveItemOutOfDrive($canMoveItemOutOfDrive)
  {
    $this->canMoveItemOutOfDrive = $canMoveItemOutOfDrive;
  }
  /**
   * @return bool
   */
  public function getCanMoveItemOutOfDrive()
  {
    return $this->canMoveItemOutOfDrive;
  }
  /**
   * @param bool
   */
  public function setCanMoveItemOutOfTeamDrive($canMoveItemOutOfTeamDrive)
  {
    $this->canMoveItemOutOfTeamDrive = $canMoveItemOutOfTeamDrive;
  }
  /**
   * @return bool
   */
  public function getCanMoveItemOutOfTeamDrive()
  {
    return $this->canMoveItemOutOfTeamDrive;
  }
  /**
   * @param bool
   */
  public function setCanMoveItemWithinDrive($canMoveItemWithinDrive)
  {
    $this->canMoveItemWithinDrive = $canMoveItemWithinDrive;
  }
  /**
   * @return bool
   */
  public function getCanMoveItemWithinDrive()
  {
    return $this->canMoveItemWithinDrive;
  }
  /**
   * @param bool
   */
  public function setCanMoveItemWithinTeamDrive($canMoveItemWithinTeamDrive)
  {
    $this->canMoveItemWithinTeamDrive = $canMoveItemWithinTeamDrive;
  }
  /**
   * @return bool
   */
  public function getCanMoveItemWithinTeamDrive()
  {
    return $this->canMoveItemWithinTeamDrive;
  }
  /**
   * @param bool
   */
  public function setCanMoveTeamDriveItem($canMoveTeamDriveItem)
  {
    $this->canMoveTeamDriveItem = $canMoveTeamDriveItem;
  }
  /**
   * @return bool
   */
  public function getCanMoveTeamDriveItem()
  {
    return $this->canMoveTeamDriveItem;
  }
  /**
   * @param bool
   */
  public function setCanReadDrive($canReadDrive)
  {
    $this->canReadDrive = $canReadDrive;
  }
  /**
   * @return bool
   */
  public function getCanReadDrive()
  {
    return $this->canReadDrive;
  }
  /**
   * @param bool
   */
  public function setCanReadLabels($canReadLabels)
  {
    $this->canReadLabels = $canReadLabels;
  }
  /**
   * @return bool
   */
  public function getCanReadLabels()
  {
    return $this->canReadLabels;
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
  public function setCanReadTeamDrive($canReadTeamDrive)
  {
    $this->canReadTeamDrive = $canReadTeamDrive;
  }
  /**
   * @return bool
   */
  public function getCanReadTeamDrive()
  {
    return $this->canReadTeamDrive;
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
  public function setCanRemoveMyDriveParent($canRemoveMyDriveParent)
  {
    $this->canRemoveMyDriveParent = $canRemoveMyDriveParent;
  }
  /**
   * @return bool
   */
  public function getCanRemoveMyDriveParent()
  {
    return $this->canRemoveMyDriveParent;
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
  public function setCanTrash($canTrash)
  {
    $this->canTrash = $canTrash;
  }
  /**
   * @return bool
   */
  public function getCanTrash()
  {
    return $this->canTrash;
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
  /**
   * @param bool
   */
  public function setCanUntrash($canUntrash)
  {
    $this->canUntrash = $canUntrash;
  }
  /**
   * @return bool
   */
  public function getCanUntrash()
  {
    return $this->canUntrash;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DriveFileCapabilities::class, 'Google_Service_Drive_DriveFileCapabilities');
