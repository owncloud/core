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

namespace Google\Service\CloudDomains;

class DsRecord extends \Google\Model
{
  /**
   * @var string
   */
  public $algorithm;
  /**
   * @var string
   */
  public $digest;
  /**
   * @var string
   */
  public $digestType;
  /**
   * @var int
   */
  public $keyTag;

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
  public function setDigest($digest)
  {
    $this->digest = $digest;
  }
  /**
   * @return string
   */
  public function getDigest()
  {
    return $this->digest;
  }
  /**
   * @param string
   */
  public function setDigestType($digestType)
  {
    $this->digestType = $digestType;
  }
  /**
   * @return string
   */
  public function getDigestType()
  {
    return $this->digestType;
  }
  /**
   * @param int
   */
  public function setKeyTag($keyTag)
  {
    $this->keyTag = $keyTag;
  }
  /**
   * @return int
   */
  public function getKeyTag()
  {
    return $this->keyTag;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DsRecord::class, 'Google_Service_CloudDomains_DsRecord');
