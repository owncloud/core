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

namespace Google\Service\CloudSearch;

class AffectedMembership extends \Google\Model
{
  protected $affectedMemberType = MemberId::class;
  protected $affectedMemberDataType = '';
  /**
   * @var string
   */
  public $priorMembershipRole;
  /**
   * @var string
   */
  public $priorMembershipState;
  /**
   * @var string
   */
  public $targetMembershipRole;

  /**
   * @param MemberId
   */
  public function setAffectedMember(MemberId $affectedMember)
  {
    $this->affectedMember = $affectedMember;
  }
  /**
   * @return MemberId
   */
  public function getAffectedMember()
  {
    return $this->affectedMember;
  }
  /**
   * @param string
   */
  public function setPriorMembershipRole($priorMembershipRole)
  {
    $this->priorMembershipRole = $priorMembershipRole;
  }
  /**
   * @return string
   */
  public function getPriorMembershipRole()
  {
    return $this->priorMembershipRole;
  }
  /**
   * @param string
   */
  public function setPriorMembershipState($priorMembershipState)
  {
    $this->priorMembershipState = $priorMembershipState;
  }
  /**
   * @return string
   */
  public function getPriorMembershipState()
  {
    return $this->priorMembershipState;
  }
  /**
   * @param string
   */
  public function setTargetMembershipRole($targetMembershipRole)
  {
    $this->targetMembershipRole = $targetMembershipRole;
  }
  /**
   * @return string
   */
  public function getTargetMembershipRole()
  {
    return $this->targetMembershipRole;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AffectedMembership::class, 'Google_Service_CloudSearch_AffectedMembership');
