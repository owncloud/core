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

class Google_Service_CloudDomains_DsRecord extends Google_Model
{
  public $algorithm;
  public $digest;
  public $digestType;
  public $keyTag;

  public function setAlgorithm($algorithm)
  {
    $this->algorithm = $algorithm;
  }
  public function getAlgorithm()
  {
    return $this->algorithm;
  }
  public function setDigest($digest)
  {
    $this->digest = $digest;
  }
  public function getDigest()
  {
    return $this->digest;
  }
  public function setDigestType($digestType)
  {
    $this->digestType = $digestType;
  }
  public function getDigestType()
  {
    return $this->digestType;
  }
  public function setKeyTag($keyTag)
  {
    $this->keyTag = $keyTag;
  }
  public function getKeyTag()
  {
    return $this->keyTag;
  }
}
