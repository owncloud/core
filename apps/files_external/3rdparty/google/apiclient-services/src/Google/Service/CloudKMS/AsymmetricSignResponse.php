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

class Google_Service_CloudKMS_AsymmetricSignResponse extends Google_Model
{
  public $name;
  public $protectionLevel;
  public $signature;
  public $signatureCrc32c;
  public $verifiedDigestCrc32c;

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProtectionLevel($protectionLevel)
  {
    $this->protectionLevel = $protectionLevel;
  }
  public function getProtectionLevel()
  {
    return $this->protectionLevel;
  }
  public function setSignature($signature)
  {
    $this->signature = $signature;
  }
  public function getSignature()
  {
    return $this->signature;
  }
  public function setSignatureCrc32c($signatureCrc32c)
  {
    $this->signatureCrc32c = $signatureCrc32c;
  }
  public function getSignatureCrc32c()
  {
    return $this->signatureCrc32c;
  }
  public function setVerifiedDigestCrc32c($verifiedDigestCrc32c)
  {
    $this->verifiedDigestCrc32c = $verifiedDigestCrc32c;
  }
  public function getVerifiedDigestCrc32c()
  {
    return $this->verifiedDigestCrc32c;
  }
}
