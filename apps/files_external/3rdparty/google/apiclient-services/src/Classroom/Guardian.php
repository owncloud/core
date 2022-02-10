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

class Guardian extends \Google\Model
{
  /**
   * @var string
   */
  public $guardianId;
  protected $guardianProfileType = UserProfile::class;
  protected $guardianProfileDataType = '';
  /**
   * @var string
   */
  public $invitedEmailAddress;
  /**
   * @var string
   */
  public $studentId;

  /**
   * @param string
   */
  public function setGuardianId($guardianId)
  {
    $this->guardianId = $guardianId;
  }
  /**
   * @return string
   */
  public function getGuardianId()
  {
    return $this->guardianId;
  }
  /**
   * @param UserProfile
   */
  public function setGuardianProfile(UserProfile $guardianProfile)
  {
    $this->guardianProfile = $guardianProfile;
  }
  /**
   * @return UserProfile
   */
  public function getGuardianProfile()
  {
    return $this->guardianProfile;
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
class_alias(Guardian::class, 'Google_Service_Classroom_Guardian');
