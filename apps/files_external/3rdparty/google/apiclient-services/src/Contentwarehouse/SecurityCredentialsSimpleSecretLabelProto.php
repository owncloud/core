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

namespace Google\Service\Contentwarehouse;

class SecurityCredentialsSimpleSecretLabelProto extends \Google\Model
{
  /**
   * @var int
   */
  public $capabilityId;
  /**
   * @var string
   */
  public $genericLabel;
  /**
   * @var string
   */
  public $inviteId;
  /**
   * @var string
   */
  public $type;

  /**
   * @param int
   */
  public function setCapabilityId($capabilityId)
  {
    $this->capabilityId = $capabilityId;
  }
  /**
   * @return int
   */
  public function getCapabilityId()
  {
    return $this->capabilityId;
  }
  /**
   * @param string
   */
  public function setGenericLabel($genericLabel)
  {
    $this->genericLabel = $genericLabel;
  }
  /**
   * @return string
   */
  public function getGenericLabel()
  {
    return $this->genericLabel;
  }
  /**
   * @param string
   */
  public function setInviteId($inviteId)
  {
    $this->inviteId = $inviteId;
  }
  /**
   * @return string
   */
  public function getInviteId()
  {
    return $this->inviteId;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SecurityCredentialsSimpleSecretLabelProto::class, 'Google_Service_Contentwarehouse_SecurityCredentialsSimpleSecretLabelProto');
