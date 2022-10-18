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

class SecurityCredentialsSigningKeyPossessorProto extends \Google\Model
{
  /**
   * @var int
   */
  public $keymasterKeyType;
  /**
   * @var string
   */
  public $serializedVerificationKey;
  /**
   * @var string
   */
  public $serializedVerificationKeyset;

  /**
   * @param int
   */
  public function setKeymasterKeyType($keymasterKeyType)
  {
    $this->keymasterKeyType = $keymasterKeyType;
  }
  /**
   * @return int
   */
  public function getKeymasterKeyType()
  {
    return $this->keymasterKeyType;
  }
  /**
   * @param string
   */
  public function setSerializedVerificationKey($serializedVerificationKey)
  {
    $this->serializedVerificationKey = $serializedVerificationKey;
  }
  /**
   * @return string
   */
  public function getSerializedVerificationKey()
  {
    return $this->serializedVerificationKey;
  }
  /**
   * @param string
   */
  public function setSerializedVerificationKeyset($serializedVerificationKeyset)
  {
    $this->serializedVerificationKeyset = $serializedVerificationKeyset;
  }
  /**
   * @return string
   */
  public function getSerializedVerificationKeyset()
  {
    return $this->serializedVerificationKeyset;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SecurityCredentialsSigningKeyPossessorProto::class, 'Google_Service_Contentwarehouse_SecurityCredentialsSigningKeyPossessorProto');
