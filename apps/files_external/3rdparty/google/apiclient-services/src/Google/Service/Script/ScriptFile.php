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

class Google_Service_Script_ScriptFile extends Google_Model
{
  public $createTime;
  protected $functionSetType = 'Google_Service_Script_GoogleAppsScriptTypeFunctionSet';
  protected $functionSetDataType = '';
  protected $lastModifyUserType = 'Google_Service_Script_GoogleAppsScriptTypeUser';
  protected $lastModifyUserDataType = '';
  public $name;
  public $source;
  public $type;
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
   * @param Google_Service_Script_GoogleAppsScriptTypeFunctionSet
   */
  public function setFunctionSet(Google_Service_Script_GoogleAppsScriptTypeFunctionSet $functionSet)
  {
    $this->functionSet = $functionSet;
  }
  /**
   * @return Google_Service_Script_GoogleAppsScriptTypeFunctionSet
   */
  public function getFunctionSet()
  {
    return $this->functionSet;
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSource($source)
  {
    $this->source = $source;
  }
  public function getSource()
  {
    return $this->source;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
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
