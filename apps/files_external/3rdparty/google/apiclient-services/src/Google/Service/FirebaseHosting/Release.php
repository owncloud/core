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

class Google_Service_FirebaseHosting_Release extends Google_Model
{
  public $message;
  public $name;
  public $releaseTime;
  protected $releaseUserType = 'Google_Service_FirebaseHosting_ActingUser';
  protected $releaseUserDataType = '';
  public $type;
  protected $versionType = 'Google_Service_FirebaseHosting_Version';
  protected $versionDataType = '';

  public function setMessage($message)
  {
    $this->message = $message;
  }
  public function getMessage()
  {
    return $this->message;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setReleaseTime($releaseTime)
  {
    $this->releaseTime = $releaseTime;
  }
  public function getReleaseTime()
  {
    return $this->releaseTime;
  }
  /**
   * @param Google_Service_FirebaseHosting_ActingUser
   */
  public function setReleaseUser(Google_Service_FirebaseHosting_ActingUser $releaseUser)
  {
    $this->releaseUser = $releaseUser;
  }
  /**
   * @return Google_Service_FirebaseHosting_ActingUser
   */
  public function getReleaseUser()
  {
    return $this->releaseUser;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param Google_Service_FirebaseHosting_Version
   */
  public function setVersion(Google_Service_FirebaseHosting_Version $version)
  {
    $this->version = $version;
  }
  /**
   * @return Google_Service_FirebaseHosting_Version
   */
  public function getVersion()
  {
    return $this->version;
  }
}
