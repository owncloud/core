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

class Google_Service_DriveActivity_ActionDetail extends Google_Model
{
  protected $commentType = 'Google_Service_DriveActivity_Comment';
  protected $commentDataType = '';
  protected $createType = 'Google_Service_DriveActivity_Create';
  protected $createDataType = '';
  protected $deleteType = 'Google_Service_DriveActivity_Delete';
  protected $deleteDataType = '';
  protected $dlpChangeType = 'Google_Service_DriveActivity_DataLeakPreventionChange';
  protected $dlpChangeDataType = '';
  protected $editType = 'Google_Service_DriveActivity_Edit';
  protected $editDataType = '';
  protected $moveType = 'Google_Service_DriveActivity_Move';
  protected $moveDataType = '';
  protected $permissionChangeType = 'Google_Service_DriveActivity_PermissionChange';
  protected $permissionChangeDataType = '';
  protected $referenceType = 'Google_Service_DriveActivity_ApplicationReference';
  protected $referenceDataType = '';
  protected $renameType = 'Google_Service_DriveActivity_Rename';
  protected $renameDataType = '';
  protected $restoreType = 'Google_Service_DriveActivity_Restore';
  protected $restoreDataType = '';
  protected $settingsChangeType = 'Google_Service_DriveActivity_SettingsChange';
  protected $settingsChangeDataType = '';

  /**
   * @param Google_Service_DriveActivity_Comment
   */
  public function setComment(Google_Service_DriveActivity_Comment $comment)
  {
    $this->comment = $comment;
  }
  /**
   * @return Google_Service_DriveActivity_Comment
   */
  public function getComment()
  {
    return $this->comment;
  }
  /**
   * @param Google_Service_DriveActivity_Create
   */
  public function setCreate(Google_Service_DriveActivity_Create $create)
  {
    $this->create = $create;
  }
  /**
   * @return Google_Service_DriveActivity_Create
   */
  public function getCreate()
  {
    return $this->create;
  }
  /**
   * @param Google_Service_DriveActivity_Delete
   */
  public function setDelete(Google_Service_DriveActivity_Delete $delete)
  {
    $this->delete = $delete;
  }
  /**
   * @return Google_Service_DriveActivity_Delete
   */
  public function getDelete()
  {
    return $this->delete;
  }
  /**
   * @param Google_Service_DriveActivity_DataLeakPreventionChange
   */
  public function setDlpChange(Google_Service_DriveActivity_DataLeakPreventionChange $dlpChange)
  {
    $this->dlpChange = $dlpChange;
  }
  /**
   * @return Google_Service_DriveActivity_DataLeakPreventionChange
   */
  public function getDlpChange()
  {
    return $this->dlpChange;
  }
  /**
   * @param Google_Service_DriveActivity_Edit
   */
  public function setEdit(Google_Service_DriveActivity_Edit $edit)
  {
    $this->edit = $edit;
  }
  /**
   * @return Google_Service_DriveActivity_Edit
   */
  public function getEdit()
  {
    return $this->edit;
  }
  /**
   * @param Google_Service_DriveActivity_Move
   */
  public function setMove(Google_Service_DriveActivity_Move $move)
  {
    $this->move = $move;
  }
  /**
   * @return Google_Service_DriveActivity_Move
   */
  public function getMove()
  {
    return $this->move;
  }
  /**
   * @param Google_Service_DriveActivity_PermissionChange
   */
  public function setPermissionChange(Google_Service_DriveActivity_PermissionChange $permissionChange)
  {
    $this->permissionChange = $permissionChange;
  }
  /**
   * @return Google_Service_DriveActivity_PermissionChange
   */
  public function getPermissionChange()
  {
    return $this->permissionChange;
  }
  /**
   * @param Google_Service_DriveActivity_ApplicationReference
   */
  public function setReference(Google_Service_DriveActivity_ApplicationReference $reference)
  {
    $this->reference = $reference;
  }
  /**
   * @return Google_Service_DriveActivity_ApplicationReference
   */
  public function getReference()
  {
    return $this->reference;
  }
  /**
   * @param Google_Service_DriveActivity_Rename
   */
  public function setRename(Google_Service_DriveActivity_Rename $rename)
  {
    $this->rename = $rename;
  }
  /**
   * @return Google_Service_DriveActivity_Rename
   */
  public function getRename()
  {
    return $this->rename;
  }
  /**
   * @param Google_Service_DriveActivity_Restore
   */
  public function setRestore(Google_Service_DriveActivity_Restore $restore)
  {
    $this->restore = $restore;
  }
  /**
   * @return Google_Service_DriveActivity_Restore
   */
  public function getRestore()
  {
    return $this->restore;
  }
  /**
   * @param Google_Service_DriveActivity_SettingsChange
   */
  public function setSettingsChange(Google_Service_DriveActivity_SettingsChange $settingsChange)
  {
    $this->settingsChange = $settingsChange;
  }
  /**
   * @return Google_Service_DriveActivity_SettingsChange
   */
  public function getSettingsChange()
  {
    return $this->settingsChange;
  }
}
