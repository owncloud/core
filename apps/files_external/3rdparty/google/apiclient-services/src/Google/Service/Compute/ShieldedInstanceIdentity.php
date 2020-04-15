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

class Google_Service_Compute_ShieldedInstanceIdentity extends Google_Model
{
  protected $encryptionKeyType = 'Google_Service_Compute_ShieldedInstanceIdentityEntry';
  protected $encryptionKeyDataType = '';
  public $kind;
  protected $signingKeyType = 'Google_Service_Compute_ShieldedInstanceIdentityEntry';
  protected $signingKeyDataType = '';

  /**
   * @param Google_Service_Compute_ShieldedInstanceIdentityEntry
   */
  public function setEncryptionKey(Google_Service_Compute_ShieldedInstanceIdentityEntry $encryptionKey)
  {
    $this->encryptionKey = $encryptionKey;
  }
  /**
   * @return Google_Service_Compute_ShieldedInstanceIdentityEntry
   */
  public function getEncryptionKey()
  {
    return $this->encryptionKey;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Compute_ShieldedInstanceIdentityEntry
   */
  public function setSigningKey(Google_Service_Compute_ShieldedInstanceIdentityEntry $signingKey)
  {
    $this->signingKey = $signingKey;
  }
  /**
   * @return Google_Service_Compute_ShieldedInstanceIdentityEntry
   */
  public function getSigningKey()
  {
    return $this->signingKey;
  }
}
