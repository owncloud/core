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

class Google_Service_DriveActivity_Actor extends Google_Model
{
  protected $administratorType = 'Google_Service_DriveActivity_Administrator';
  protected $administratorDataType = '';
  protected $anonymousType = 'Google_Service_DriveActivity_AnonymousUser';
  protected $anonymousDataType = '';
  protected $impersonationType = 'Google_Service_DriveActivity_Impersonation';
  protected $impersonationDataType = '';
  protected $systemType = 'Google_Service_DriveActivity_SystemEvent';
  protected $systemDataType = '';
  protected $userType = 'Google_Service_DriveActivity_User';
  protected $userDataType = '';

  /**
   * @param Google_Service_DriveActivity_Administrator
   */
  public function setAdministrator(Google_Service_DriveActivity_Administrator $administrator)
  {
    $this->administrator = $administrator;
  }
  /**
   * @return Google_Service_DriveActivity_Administrator
   */
  public function getAdministrator()
  {
    return $this->administrator;
  }
  /**
   * @param Google_Service_DriveActivity_AnonymousUser
   */
  public function setAnonymous(Google_Service_DriveActivity_AnonymousUser $anonymous)
  {
    $this->anonymous = $anonymous;
  }
  /**
   * @return Google_Service_DriveActivity_AnonymousUser
   */
  public function getAnonymous()
  {
    return $this->anonymous;
  }
  /**
   * @param Google_Service_DriveActivity_Impersonation
   */
  public function setImpersonation(Google_Service_DriveActivity_Impersonation $impersonation)
  {
    $this->impersonation = $impersonation;
  }
  /**
   * @return Google_Service_DriveActivity_Impersonation
   */
  public function getImpersonation()
  {
    return $this->impersonation;
  }
  /**
   * @param Google_Service_DriveActivity_SystemEvent
   */
  public function setSystem(Google_Service_DriveActivity_SystemEvent $system)
  {
    $this->system = $system;
  }
  /**
   * @return Google_Service_DriveActivity_SystemEvent
   */
  public function getSystem()
  {
    return $this->system;
  }
  /**
   * @param Google_Service_DriveActivity_User
   */
  public function setUser(Google_Service_DriveActivity_User $user)
  {
    $this->user = $user;
  }
  /**
   * @return Google_Service_DriveActivity_User
   */
  public function getUser()
  {
    return $this->user;
  }
}
