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

class Google_Service_CloudSearch_Principal extends Google_Model
{
  public $groupResourceName;
  protected $gsuitePrincipalType = 'Google_Service_CloudSearch_GSuitePrincipal';
  protected $gsuitePrincipalDataType = '';
  public $userResourceName;

  public function setGroupResourceName($groupResourceName)
  {
    $this->groupResourceName = $groupResourceName;
  }
  public function getGroupResourceName()
  {
    return $this->groupResourceName;
  }
  /**
   * @param Google_Service_CloudSearch_GSuitePrincipal
   */
  public function setGsuitePrincipal(Google_Service_CloudSearch_GSuitePrincipal $gsuitePrincipal)
  {
    $this->gsuitePrincipal = $gsuitePrincipal;
  }
  /**
   * @return Google_Service_CloudSearch_GSuitePrincipal
   */
  public function getGsuitePrincipal()
  {
    return $this->gsuitePrincipal;
  }
  public function setUserResourceName($userResourceName)
  {
    $this->userResourceName = $userResourceName;
  }
  public function getUserResourceName()
  {
    return $this->userResourceName;
  }
}
