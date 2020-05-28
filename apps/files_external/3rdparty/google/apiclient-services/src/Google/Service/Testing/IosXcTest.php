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

class Google_Service_Testing_IosXcTest extends Google_Model
{
  public $appBundleId;
  public $testSpecialEntitlements;
  protected $testsZipType = 'Google_Service_Testing_FileReference';
  protected $testsZipDataType = '';
  public $xcodeVersion;
  protected $xctestrunType = 'Google_Service_Testing_FileReference';
  protected $xctestrunDataType = '';

  public function setAppBundleId($appBundleId)
  {
    $this->appBundleId = $appBundleId;
  }
  public function getAppBundleId()
  {
    return $this->appBundleId;
  }
  public function setTestSpecialEntitlements($testSpecialEntitlements)
  {
    $this->testSpecialEntitlements = $testSpecialEntitlements;
  }
  public function getTestSpecialEntitlements()
  {
    return $this->testSpecialEntitlements;
  }
  /**
   * @param Google_Service_Testing_FileReference
   */
  public function setTestsZip(Google_Service_Testing_FileReference $testsZip)
  {
    $this->testsZip = $testsZip;
  }
  /**
   * @return Google_Service_Testing_FileReference
   */
  public function getTestsZip()
  {
    return $this->testsZip;
  }
  public function setXcodeVersion($xcodeVersion)
  {
    $this->xcodeVersion = $xcodeVersion;
  }
  public function getXcodeVersion()
  {
    return $this->xcodeVersion;
  }
  /**
   * @param Google_Service_Testing_FileReference
   */
  public function setXctestrun(Google_Service_Testing_FileReference $xctestrun)
  {
    $this->xctestrun = $xctestrun;
  }
  /**
   * @return Google_Service_Testing_FileReference
   */
  public function getXctestrun()
  {
    return $this->xctestrun;
  }
}
