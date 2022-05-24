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

class PkixPublicKey extends \Google\Model
{
  /**
   * @var string
   */
  public $publicKeyPem;
  /**
   * @var string
   */
  public $signatureAlgorithm;

  /**
   * @param string
   */
  public function setPublicKeyPem($publicKeyPem)
  {
    $this->publicKeyPem = $publicKeyPem;
  }
  /**
   * @return string
   */
  public function getPublicKeyPem()
  {
    return $this->publicKeyPem;
  }
  /**
   * @param string
   */
  public function setSignatureAlgorithm($signatureAlgorithm)
  {
    $this->signatureAlgorithm = $signatureAlgorithm;
  }
  /**
   * @return string
   */
  public function getSignatureAlgorithm()
  {
    return $this->signatureAlgorithm;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PkixPublicKey::class, 'Google_Service_BinaryAuthorization_PkixPublicKey');
