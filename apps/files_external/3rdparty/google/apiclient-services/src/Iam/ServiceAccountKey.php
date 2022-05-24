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

namespace Google\Service\Iam;

class ServiceAccountKey extends \Google\Model
{
  /**
   * @var bool
   */
  public $disabled;
  /**
   * @var string
   */
  public $keyAlgorithm;
  /**
   * @var string
   */
  public $keyOrigin;
  /**
   * @var string
   */
  public $keyType;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $privateKeyData;
  /**
   * @var string
   */
  public $privateKeyType;
  /**
   * @var string
   */
  public $publicKeyData;
  /**
   * @var string
   */
  public $validAfterTime;
  /**
   * @var string
   */
  public $validBeforeTime;

  /**
   * @param bool
   */
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  /**
   * @return bool
   */
  public function getDisabled()
  {
    return $this->disabled;
  }
  /**
   * @param string
   */
  public function setKeyAlgorithm($keyAlgorithm)
  {
    $this->keyAlgorithm = $keyAlgorithm;
  }
  /**
   * @return string
   */
  public function getKeyAlgorithm()
  {
    return $this->keyAlgorithm;
  }
  /**
   * @param string
   */
  public function setKeyOrigin($keyOrigin)
  {
    $this->keyOrigin = $keyOrigin;
  }
  /**
   * @return string
   */
  public function getKeyOrigin()
  {
    return $this->keyOrigin;
  }
  /**
   * @param string
   */
  public function setKeyType($keyType)
  {
    $this->keyType = $keyType;
  }
  /**
   * @return string
   */
  public function getKeyType()
  {
    return $this->keyType;
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
  public function setPrivateKeyData($privateKeyData)
  {
    $this->privateKeyData = $privateKeyData;
  }
  /**
   * @return string
   */
  public function getPrivateKeyData()
  {
    return $this->privateKeyData;
  }
  /**
   * @param string
   */
  public function setPrivateKeyType($privateKeyType)
  {
    $this->privateKeyType = $privateKeyType;
  }
  /**
   * @return string
   */
  public function getPrivateKeyType()
  {
    return $this->privateKeyType;
  }
  /**
   * @param string
   */
  public function setPublicKeyData($publicKeyData)
  {
    $this->publicKeyData = $publicKeyData;
  }
  /**
   * @return string
   */
  public function getPublicKeyData()
  {
    return $this->publicKeyData;
  }
  /**
   * @param string
   */
  public function setValidAfterTime($validAfterTime)
  {
    $this->validAfterTime = $validAfterTime;
  }
  /**
   * @return string
   */
  public function getValidAfterTime()
  {
    return $this->validAfterTime;
  }
  /**
   * @param string
   */
  public function setValidBeforeTime($validBeforeTime)
  {
    $this->validBeforeTime = $validBeforeTime;
  }
  /**
   * @return string
   */
  public function getValidBeforeTime()
  {
    return $this->validBeforeTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServiceAccountKey::class, 'Google_Service_Iam_ServiceAccountKey');
