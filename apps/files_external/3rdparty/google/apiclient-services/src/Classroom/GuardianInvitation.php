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

namespace Google\Service\Classroom;

class GuardianInvitation extends \Google\Model
{
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var string
   */
  public $invitationId;
  /**
   * @var string
   */
  public $invitedEmailAddress;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $studentId;

  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param string
   */
  public function setInvitationId($invitationId)
  {
    $this->invitationId = $invitationId;
  }
  /**
   * @return string
   */
  public function getInvitationId()
  {
    return $this->invitationId;
  }
  /**
   * @param string
   */
  public function setInvitedEmailAddress($invitedEmailAddress)
  {
    $this->invitedEmailAddress = $invitedEmailAddress;
  }
  /**
   * @return string
   */
  public function getInvitedEmailAddress()
  {
    return $this->invitedEmailAddress;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setStudentId($studentId)
  {
    $this->studentId = $studentId;
  }
  /**
   * @return string
   */
  public function getStudentId()
  {
    return $this->studentId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GuardianInvitation::class, 'Google_Service_Classroom_GuardianInvitation');
