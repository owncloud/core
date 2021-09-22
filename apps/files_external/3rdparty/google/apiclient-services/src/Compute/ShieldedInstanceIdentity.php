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

class ShieldedInstanceIdentity extends \Google\Model
{
  protected $encryptionKeyType = ShieldedInstanceIdentityEntry::class;
  protected $encryptionKeyDataType = '';
  public $kind;
  protected $signingKeyType = ShieldedInstanceIdentityEntry::class;
  protected $signingKeyDataType = '';

  /**
   * @param ShieldedInstanceIdentityEntry
   */
  public function setEncryptionKey(ShieldedInstanceIdentityEntry $encryptionKey)
  {
    $this->encryptionKey = $encryptionKey;
  }
  /**
   * @return ShieldedInstanceIdentityEntry
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
   * @param ShieldedInstanceIdentityEntry
   */
  public function setSigningKey(ShieldedInstanceIdentityEntry $signingKey)
  {
    $this->signingKey = $signingKey;
  }
  /**
   * @return ShieldedInstanceIdentityEntry
   */
  public function getSigningKey()
  {
    return $this->signingKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ShieldedInstanceIdentity::class, 'Google_Service_Compute_ShieldedInstanceIdentity');
