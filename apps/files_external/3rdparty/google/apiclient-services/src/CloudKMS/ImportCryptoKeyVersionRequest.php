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

namespace Google\Service\CloudKMS;

class ImportCryptoKeyVersionRequest extends \Google\Model
{
  public $algorithm;
  public $cryptoKeyVersion;
  public $importJob;
  public $rsaAesWrappedKey;

  public function setAlgorithm($algorithm)
  {
    $this->algorithm = $algorithm;
  }
  public function getAlgorithm()
  {
    return $this->algorithm;
  }
  public function setCryptoKeyVersion($cryptoKeyVersion)
  {
    $this->cryptoKeyVersion = $cryptoKeyVersion;
  }
  public function getCryptoKeyVersion()
  {
    return $this->cryptoKeyVersion;
  }
  public function setImportJob($importJob)
  {
    $this->importJob = $importJob;
  }
  public function getImportJob()
  {
    return $this->importJob;
  }
  public function setRsaAesWrappedKey($rsaAesWrappedKey)
  {
    $this->rsaAesWrappedKey = $rsaAesWrappedKey;
  }
  public function getRsaAesWrappedKey()
  {
    return $this->rsaAesWrappedKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImportCryptoKeyVersionRequest::class, 'Google_Service_CloudKMS_ImportCryptoKeyVersionRequest');
