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

namespace Google\Service\Analytics;

class EntityUserLinkEntity extends \Google\Model
{
  protected $accountRefType = AccountRef::class;
  protected $accountRefDataType = '';
  protected $profileRefType = ProfileRef::class;
  protected $profileRefDataType = '';
  protected $webPropertyRefType = WebPropertyRef::class;
  protected $webPropertyRefDataType = '';

  /**
   * @param AccountRef
   */
  public function setAccountRef(AccountRef $accountRef)
  {
    $this->accountRef = $accountRef;
  }
  /**
   * @return AccountRef
   */
  public function getAccountRef()
  {
    return $this->accountRef;
  }
  /**
   * @param ProfileRef
   */
  public function setProfileRef(ProfileRef $profileRef)
  {
    $this->profileRef = $profileRef;
  }
  /**
   * @return ProfileRef
   */
  public function getProfileRef()
  {
    return $this->profileRef;
  }
  /**
   * @param WebPropertyRef
   */
  public function setWebPropertyRef(WebPropertyRef $webPropertyRef)
  {
    $this->webPropertyRef = $webPropertyRef;
  }
  /**
   * @return WebPropertyRef
   */
  public function getWebPropertyRef()
  {
    return $this->webPropertyRef;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EntityUserLinkEntity::class, 'Google_Service_Analytics_EntityUserLinkEntity');
