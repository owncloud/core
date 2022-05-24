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

namespace Google\Service\Books;

class VolumeUserInfoFamilySharing extends \Google\Model
{
  /**
   * @var string
   */
  public $familyRole;
  /**
   * @var bool
   */
  public $isSharingAllowed;
  /**
   * @var bool
   */
  public $isSharingDisabledByFop;

  /**
   * @param string
   */
  public function setFamilyRole($familyRole)
  {
    $this->familyRole = $familyRole;
  }
  /**
   * @return string
   */
  public function getFamilyRole()
  {
    return $this->familyRole;
  }
  /**
   * @param bool
   */
  public function setIsSharingAllowed($isSharingAllowed)
  {
    $this->isSharingAllowed = $isSharingAllowed;
  }
  /**
   * @return bool
   */
  public function getIsSharingAllowed()
  {
    return $this->isSharingAllowed;
  }
  /**
   * @param bool
   */
  public function setIsSharingDisabledByFop($isSharingDisabledByFop)
  {
    $this->isSharingDisabledByFop = $isSharingDisabledByFop;
  }
  /**
   * @return bool
   */
  public function getIsSharingDisabledByFop()
  {
    return $this->isSharingDisabledByFop;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumeUserInfoFamilySharing::class, 'Google_Service_Books_VolumeUserInfoFamilySharing');
