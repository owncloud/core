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

namespace Google\Service\DriveActivity;

class ActionDetail extends \Google\Model
{
  protected $commentType = Comment::class;
  protected $commentDataType = '';
  protected $createType = Create::class;
  protected $createDataType = '';
  protected $deleteType = Delete::class;
  protected $deleteDataType = '';
  protected $dlpChangeType = DataLeakPreventionChange::class;
  protected $dlpChangeDataType = '';
  protected $editType = Edit::class;
  protected $editDataType = '';
  protected $moveType = Move::class;
  protected $moveDataType = '';
  protected $permissionChangeType = PermissionChange::class;
  protected $permissionChangeDataType = '';
  protected $referenceType = ApplicationReference::class;
  protected $referenceDataType = '';
  protected $renameType = Rename::class;
  protected $renameDataType = '';
  protected $restoreType = Restore::class;
  protected $restoreDataType = '';
  protected $settingsChangeType = SettingsChange::class;
  protected $settingsChangeDataType = '';

  /**
   * @param Comment
   */
  public function setComment(Comment $comment)
  {
    $this->comment = $comment;
  }
  /**
   * @return Comment
   */
  public function getComment()
  {
    return $this->comment;
  }
  /**
   * @param Create
   */
  public function setCreate(Create $create)
  {
    $this->create = $create;
  }
  /**
   * @return Create
   */
  public function getCreate()
  {
    return $this->create;
  }
  /**
   * @param Delete
   */
  public function setDelete(Delete $delete)
  {
    $this->delete = $delete;
  }
  /**
   * @return Delete
   */
  public function getDelete()
  {
    return $this->delete;
  }
  /**
   * @param DataLeakPreventionChange
   */
  public function setDlpChange(DataLeakPreventionChange $dlpChange)
  {
    $this->dlpChange = $dlpChange;
  }
  /**
   * @return DataLeakPreventionChange
   */
  public function getDlpChange()
  {
    return $this->dlpChange;
  }
  /**
   * @param Edit
   */
  public function setEdit(Edit $edit)
  {
    $this->edit = $edit;
  }
  /**
   * @return Edit
   */
  public function getEdit()
  {
    return $this->edit;
  }
  /**
   * @param Move
   */
  public function setMove(Move $move)
  {
    $this->move = $move;
  }
  /**
   * @return Move
   */
  public function getMove()
  {
    return $this->move;
  }
  /**
   * @param PermissionChange
   */
  public function setPermissionChange(PermissionChange $permissionChange)
  {
    $this->permissionChange = $permissionChange;
  }
  /**
   * @return PermissionChange
   */
  public function getPermissionChange()
  {
    return $this->permissionChange;
  }
  /**
   * @param ApplicationReference
   */
  public function setReference(ApplicationReference $reference)
  {
    $this->reference = $reference;
  }
  /**
   * @return ApplicationReference
   */
  public function getReference()
  {
    return $this->reference;
  }
  /**
   * @param Rename
   */
  public function setRename(Rename $rename)
  {
    $this->rename = $rename;
  }
  /**
   * @return Rename
   */
  public function getRename()
  {
    return $this->rename;
  }
  /**
   * @param Restore
   */
  public function setRestore(Restore $restore)
  {
    $this->restore = $restore;
  }
  /**
   * @return Restore
   */
  public function getRestore()
  {
    return $this->restore;
  }
  /**
   * @param SettingsChange
   */
  public function setSettingsChange(SettingsChange $settingsChange)
  {
    $this->settingsChange = $settingsChange;
  }
  /**
   * @return SettingsChange
   */
  public function getSettingsChange()
  {
    return $this->settingsChange;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ActionDetail::class, 'Google_Service_DriveActivity_ActionDetail');
