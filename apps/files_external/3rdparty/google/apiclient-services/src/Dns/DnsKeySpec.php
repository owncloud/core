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

namespace Google\Service\Dns;

class DnsKeySpec extends \Google\Model
{
  /**
   * @var string
   */
  public $algorithm;
  /**
   * @var string
   */
  public $keyLength;
  /**
   * @var string
   */
  public $keyType;
  /**
   * @var string
   */
  public $kind;

  /**
   * @param string
   */
  public function setAlgorithm($algorithm)
  {
    $this->algorithm = $algorithm;
  }
  /**
   * @return string
   */
  public function getAlgorithm()
  {
    return $this->algorithm;
  }
  /**
   * @param string
   */
  public function setKeyLength($keyLength)
  {
    $this->keyLength = $keyLength;
  }
  /**
   * @return string
   */
  public function getKeyLength()
  {
    return $this->keyLength;
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
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DnsKeySpec::class, 'Google_Service_Dns_DnsKeySpec');
