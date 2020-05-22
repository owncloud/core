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

class Google_Service_Script_Project extends Google_Model
{
  public $createTime;
  protected $creatorType = 'Google_Service_Script_GoogleAppsScriptTypeUser';
  protected $creatorDataType = '';
  protected $lastModifyUserType = 'Google_Service_Script_GoogleAppsScriptTypeUser';
  protected $lastModifyUserDataType = '';
  public $parentId;
  public $scriptId;
  public $title;
  public $updateTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param Google_Service_Script_GoogleAppsScriptTypeUser
   */
  public function setCreator(Google_Service_Script_GoogleAppsScriptTypeUser $creator)
  {
    $this->creator = $creator;
  }
  /**
   * @return Google_Service_Script_GoogleAppsScriptTypeUser
   */
  public function getCreator()
  {
    return $this->creator;
  }
  /**
   * @param Google_Service_Script_GoogleAppsScriptTypeUser
   */
  public function setLastModifyUser(Google_Service_Script_GoogleAppsScriptTypeUser $lastModifyUser)
  {
    $this->lastModifyUser = $lastModifyUser;
  }
  /**
   * @return Google_Service_Script_GoogleAppsScriptTypeUser
   */
  public function getLastModifyUser()
  {
    return $this->lastModifyUser;
  }
  public function setParentId($parentId)
  {
    $this->parentId = $parentId;
  }
  public function getParentId()
  {
    return $this->parentId;
  }
  public function setScriptId($scriptId)
  {
    $this->scriptId = $scriptId;
  }
  public function getScriptId()
  {
    return $this->scriptId;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
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
