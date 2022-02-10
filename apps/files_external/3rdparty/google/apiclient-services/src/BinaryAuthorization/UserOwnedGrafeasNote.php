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

namespace Google\Service\BinaryAuthorization;

class UserOwnedGrafeasNote extends \Google\Collection
{
  protected $collection_key = 'publicKeys';
  /**
   * @var string
   */
  public $delegationServiceAccountEmail;
  /**
   * @var string
   */
  public $noteReference;
  protected $publicKeysType = AttestorPublicKey::class;
  protected $publicKeysDataType = 'array';

  /**
   * @param string
   */
  public function setDelegationServiceAccountEmail($delegationServiceAccountEmail)
  {
    $this->delegationServiceAccountEmail = $delegationServiceAccountEmail;
  }
  /**
   * @return string
   */
  public function getDelegationServiceAccountEmail()
  {
    return $this->delegationServiceAccountEmail;
  }
  /**
   * @param string
   */
  public function setNoteReference($noteReference)
  {
    $this->noteReference = $noteReference;
  }
  /**
   * @return string
   */
  public function getNoteReference()
  {
    return $this->noteReference;
  }
  /**
   * @param AttestorPublicKey[]
   */
  public function setPublicKeys($publicKeys)
  {
    $this->publicKeys = $publicKeys;
  }
  /**
   * @return AttestorPublicKey[]
   */
  public function getPublicKeys()
  {
    return $this->publicKeys;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserOwnedGrafeasNote::class, 'Google_Service_BinaryAuthorization_UserOwnedGrafeasNote');
