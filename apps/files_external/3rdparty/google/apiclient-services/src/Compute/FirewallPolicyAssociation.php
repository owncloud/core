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

namespace Google\Service\Compute;

class FirewallPolicyAssociation extends \Google\Model
{
  /**
   * @var string
   */
  public $attachmentTarget;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $firewallPolicyId;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $shortName;

  /**
   * @param string
   */
  public function setAttachmentTarget($attachmentTarget)
  {
    $this->attachmentTarget = $attachmentTarget;
  }
  /**
   * @return string
   */
  public function getAttachmentTarget()
  {
    return $this->attachmentTarget;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setFirewallPolicyId($firewallPolicyId)
  {
    $this->firewallPolicyId = $firewallPolicyId;
  }
  /**
   * @return string
   */
  public function getFirewallPolicyId()
  {
    return $this->firewallPolicyId;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setShortName($shortName)
  {
    $this->shortName = $shortName;
  }
  /**
   * @return string
   */
  public function getShortName()
  {
    return $this->shortName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FirewallPolicyAssociation::class, 'Google_Service_Compute_FirewallPolicyAssociation');
