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

namespace Google\Service\Vault;

class AddMatterPermissionsRequest extends \Google\Model
{
  /**
   * @var bool
   */
  public $ccMe;
  protected $matterPermissionType = MatterPermission::class;
  protected $matterPermissionDataType = '';
  /**
   * @var bool
   */
  public $sendEmails;

  /**
   * @param bool
   */
  public function setCcMe($ccMe)
  {
    $this->ccMe = $ccMe;
  }
  /**
   * @return bool
   */
  public function getCcMe()
  {
    return $this->ccMe;
  }
  /**
   * @param MatterPermission
   */
  public function setMatterPermission(MatterPermission $matterPermission)
  {
    $this->matterPermission = $matterPermission;
  }
  /**
   * @return MatterPermission
   */
  public function getMatterPermission()
  {
    return $this->matterPermission;
  }
  /**
   * @param bool
   */
  public function setSendEmails($sendEmails)
  {
    $this->sendEmails = $sendEmails;
  }
  /**
   * @return bool
   */
  public function getSendEmails()
  {
    return $this->sendEmails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AddMatterPermissionsRequest::class, 'Google_Service_Vault_AddMatterPermissionsRequest');
