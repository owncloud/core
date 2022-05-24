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

class Actor extends \Google\Model
{
  protected $administratorType = Administrator::class;
  protected $administratorDataType = '';
  protected $anonymousType = AnonymousUser::class;
  protected $anonymousDataType = '';
  protected $impersonationType = Impersonation::class;
  protected $impersonationDataType = '';
  protected $systemType = SystemEvent::class;
  protected $systemDataType = '';
  protected $userType = User::class;
  protected $userDataType = '';

  /**
   * @param Administrator
   */
  public function setAdministrator(Administrator $administrator)
  {
    $this->administrator = $administrator;
  }
  /**
   * @return Administrator
   */
  public function getAdministrator()
  {
    return $this->administrator;
  }
  /**
   * @param AnonymousUser
   */
  public function setAnonymous(AnonymousUser $anonymous)
  {
    $this->anonymous = $anonymous;
  }
  /**
   * @return AnonymousUser
   */
  public function getAnonymous()
  {
    return $this->anonymous;
  }
  /**
   * @param Impersonation
   */
  public function setImpersonation(Impersonation $impersonation)
  {
    $this->impersonation = $impersonation;
  }
  /**
   * @return Impersonation
   */
  public function getImpersonation()
  {
    return $this->impersonation;
  }
  /**
   * @param SystemEvent
   */
  public function setSystem(SystemEvent $system)
  {
    $this->system = $system;
  }
  /**
   * @return SystemEvent
   */
  public function getSystem()
  {
    return $this->system;
  }
  /**
   * @param User
   */
  public function setUser(User $user)
  {
    $this->user = $user;
  }
  /**
   * @return User
   */
  public function getUser()
  {
    return $this->user;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Actor::class, 'Google_Service_DriveActivity_Actor');
