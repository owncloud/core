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

class MacVerifyResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $protectionLevel;
  /**
   * @var bool
   */
  public $success;
  /**
   * @var bool
   */
  public $verifiedDataCrc32c;
  /**
   * @var bool
   */
  public $verifiedMacCrc32c;
  /**
   * @var bool
   */
  public $verifiedSuccessIntegrity;

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
  public function setProtectionLevel($protectionLevel)
  {
    $this->protectionLevel = $protectionLevel;
  }
  /**
   * @return string
   */
  public function getProtectionLevel()
  {
    return $this->protectionLevel;
  }
  /**
   * @param bool
   */
  public function setSuccess($success)
  {
    $this->success = $success;
  }
  /**
   * @return bool
   */
  public function getSuccess()
  {
    return $this->success;
  }
  /**
   * @param bool
   */
  public function setVerifiedDataCrc32c($verifiedDataCrc32c)
  {
    $this->verifiedDataCrc32c = $verifiedDataCrc32c;
  }
  /**
   * @return bool
   */
  public function getVerifiedDataCrc32c()
  {
    return $this->verifiedDataCrc32c;
  }
  /**
   * @param bool
   */
  public function setVerifiedMacCrc32c($verifiedMacCrc32c)
  {
    $this->verifiedMacCrc32c = $verifiedMacCrc32c;
  }
  /**
   * @return bool
   */
  public function getVerifiedMacCrc32c()
  {
    return $this->verifiedMacCrc32c;
  }
  /**
   * @param bool
   */
  public function setVerifiedSuccessIntegrity($verifiedSuccessIntegrity)
  {
    $this->verifiedSuccessIntegrity = $verifiedSuccessIntegrity;
  }
  /**
   * @return bool
   */
  public function getVerifiedSuccessIntegrity()
  {
    return $this->verifiedSuccessIntegrity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MacVerifyResponse::class, 'Google_Service_CloudKMS_MacVerifyResponse');
