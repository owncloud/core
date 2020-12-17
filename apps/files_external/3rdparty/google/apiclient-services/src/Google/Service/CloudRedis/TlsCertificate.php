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

class Google_Service_CloudRedis_TlsCertificate extends Google_Model
{
  public $cert;
  public $createTime;
  public $expireTime;
  public $serialNumber;
  public $sha1Fingerprint;

  public function setCert($cert)
  {
    $this->cert = $cert;
  }
  public function getCert()
  {
    return $this->cert;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  public function setSerialNumber($serialNumber)
  {
    $this->serialNumber = $serialNumber;
  }
  public function getSerialNumber()
  {
    return $this->serialNumber;
  }
  public function setSha1Fingerprint($sha1Fingerprint)
  {
    $this->sha1Fingerprint = $sha1Fingerprint;
  }
  public function getSha1Fingerprint()
  {
    return $this->sha1Fingerprint;
  }
}
