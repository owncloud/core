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

namespace Google\Service\CloudAsset;

class GoogleIdentityAccesscontextmanagerV1OsConstraint extends \Google\Model
{
  /**
   * @var string
   */
  public $minimumVersion;
  /**
   * @var string
   */
  public $osType;
  /**
   * @var bool
   */
  public $requireVerifiedChromeOs;

  /**
   * @param string
   */
  public function setMinimumVersion($minimumVersion)
  {
    $this->minimumVersion = $minimumVersion;
  }
  /**
   * @return string
   */
  public function getMinimumVersion()
  {
    return $this->minimumVersion;
  }
  /**
   * @param string
   */
  public function setOsType($osType)
  {
    $this->osType = $osType;
  }
  /**
   * @return string
   */
  public function getOsType()
  {
    return $this->osType;
  }
  /**
   * @param bool
   */
  public function setRequireVerifiedChromeOs($requireVerifiedChromeOs)
  {
    $this->requireVerifiedChromeOs = $requireVerifiedChromeOs;
  }
  /**
   * @return bool
   */
  public function getRequireVerifiedChromeOs()
  {
    return $this->requireVerifiedChromeOs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleIdentityAccesscontextmanagerV1OsConstraint::class, 'Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1OsConstraint');
