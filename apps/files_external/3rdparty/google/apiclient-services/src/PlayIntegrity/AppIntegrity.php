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

namespace Google\Service\PlayIntegrity;

class AppIntegrity extends \Google\Collection
{
  protected $collection_key = 'certificateSha256Digest';
  /**
   * @var string
   */
  public $appRecognitionVerdict;
  /**
   * @var string[]
   */
  public $certificateSha256Digest;
  /**
   * @var string
   */
  public $packageName;
  /**
   * @var string
   */
  public $versionCode;

  /**
   * @param string
   */
  public function setAppRecognitionVerdict($appRecognitionVerdict)
  {
    $this->appRecognitionVerdict = $appRecognitionVerdict;
  }
  /**
   * @return string
   */
  public function getAppRecognitionVerdict()
  {
    return $this->appRecognitionVerdict;
  }
  /**
   * @param string[]
   */
  public function setCertificateSha256Digest($certificateSha256Digest)
  {
    $this->certificateSha256Digest = $certificateSha256Digest;
  }
  /**
   * @return string[]
   */
  public function getCertificateSha256Digest()
  {
    return $this->certificateSha256Digest;
  }
  /**
   * @param string
   */
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  /**
   * @return string
   */
  public function getPackageName()
  {
    return $this->packageName;
  }
  /**
   * @param string
   */
  public function setVersionCode($versionCode)
  {
    $this->versionCode = $versionCode;
  }
  /**
   * @return string
   */
  public function getVersionCode()
  {
    return $this->versionCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppIntegrity::class, 'Google_Service_PlayIntegrity_AppIntegrity');
