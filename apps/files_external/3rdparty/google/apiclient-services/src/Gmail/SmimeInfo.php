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

namespace Google\Service\Gmail;

class SmimeInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $encryptedKeyPassword;
  /**
   * @var string
   */
  public $expiration;
  /**
   * @var string
   */
  public $id;
  /**
   * @var bool
   */
  public $isDefault;
  /**
   * @var string
   */
  public $issuerCn;
  /**
   * @var string
   */
  public $pem;
  /**
   * @var string
   */
  public $pkcs12;

  /**
   * @param string
   */
  public function setEncryptedKeyPassword($encryptedKeyPassword)
  {
    $this->encryptedKeyPassword = $encryptedKeyPassword;
  }
  /**
   * @return string
   */
  public function getEncryptedKeyPassword()
  {
    return $this->encryptedKeyPassword;
  }
  /**
   * @param string
   */
  public function setExpiration($expiration)
  {
    $this->expiration = $expiration;
  }
  /**
   * @return string
   */
  public function getExpiration()
  {
    return $this->expiration;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param bool
   */
  public function setIsDefault($isDefault)
  {
    $this->isDefault = $isDefault;
  }
  /**
   * @return bool
   */
  public function getIsDefault()
  {
    return $this->isDefault;
  }
  /**
   * @param string
   */
  public function setIssuerCn($issuerCn)
  {
    $this->issuerCn = $issuerCn;
  }
  /**
   * @return string
   */
  public function getIssuerCn()
  {
    return $this->issuerCn;
  }
  /**
   * @param string
   */
  public function setPem($pem)
  {
    $this->pem = $pem;
  }
  /**
   * @return string
   */
  public function getPem()
  {
    return $this->pem;
  }
  /**
   * @param string
   */
  public function setPkcs12($pkcs12)
  {
    $this->pkcs12 = $pkcs12;
  }
  /**
   * @return string
   */
  public function getPkcs12()
  {
    return $this->pkcs12;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SmimeInfo::class, 'Google_Service_Gmail_SmimeInfo');
