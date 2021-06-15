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

class Google_Service_Keep_Note extends Google_Collection
{
  protected $collection_key = 'permissions';
  protected $attachmentsType = 'Google_Service_Keep_Attachment';
  protected $attachmentsDataType = 'array';
  protected $bodyType = 'Google_Service_Keep_Section';
  protected $bodyDataType = '';
  public $createTime;
  public $name;
  protected $permissionsType = 'Google_Service_Keep_Permission';
  protected $permissionsDataType = 'array';
  public $title;
  public $trashTime;
  public $trashed;
  public $updateTime;

  /**
   * @param Google_Service_Keep_Attachment[]
   */
  public function setAttachments($attachments)
  {
    $this->attachments = $attachments;
  }
  /**
   * @return Google_Service_Keep_Attachment[]
   */
  public function getAttachments()
  {
    return $this->attachments;
  }
  /**
   * @param Google_Service_Keep_Section
   */
  public function setBody(Google_Service_Keep_Section $body)
  {
    $this->body = $body;
  }
  /**
   * @return Google_Service_Keep_Section
   */
  public function getBody()
  {
    return $this->body;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Keep_Permission[]
   */
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  /**
   * @return Google_Service_Keep_Permission[]
   */
  public function getPermissions()
  {
    return $this->permissions;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setTrashTime($trashTime)
  {
    $this->trashTime = $trashTime;
  }
  public function getTrashTime()
  {
    return $this->trashTime;
  }
  public function setTrashed($trashed)
  {
    $this->trashed = $trashed;
  }
  public function getTrashed()
  {
    return $this->trashed;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
