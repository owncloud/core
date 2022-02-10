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

namespace Google\Service\Testing;

class IosXcTest extends \Google\Model
{
  /**
   * @var string
   */
  public $appBundleId;
  /**
   * @var bool
   */
  public $testSpecialEntitlements;
  protected $testsZipType = FileReference::class;
  protected $testsZipDataType = '';
  /**
   * @var string
   */
  public $xcodeVersion;
  protected $xctestrunType = FileReference::class;
  protected $xctestrunDataType = '';

  /**
   * @param string
   */
  public function setAppBundleId($appBundleId)
  {
    $this->appBundleId = $appBundleId;
  }
  /**
   * @return string
   */
  public function getAppBundleId()
  {
    return $this->appBundleId;
  }
  /**
   * @param bool
   */
  public function setTestSpecialEntitlements($testSpecialEntitlements)
  {
    $this->testSpecialEntitlements = $testSpecialEntitlements;
  }
  /**
   * @return bool
   */
  public function getTestSpecialEntitlements()
  {
    return $this->testSpecialEntitlements;
  }
  /**
   * @param FileReference
   */
  public function setTestsZip(FileReference $testsZip)
  {
    $this->testsZip = $testsZip;
  }
  /**
   * @return FileReference
   */
  public function getTestsZip()
  {
    return $this->testsZip;
  }
  /**
   * @param string
   */
  public function setXcodeVersion($xcodeVersion)
  {
    $this->xcodeVersion = $xcodeVersion;
  }
  /**
   * @return string
   */
  public function getXcodeVersion()
  {
    return $this->xcodeVersion;
  }
  /**
   * @param FileReference
   */
  public function setXctestrun(FileReference $xctestrun)
  {
    $this->xctestrun = $xctestrun;
  }
  /**
   * @return FileReference
   */
  public function getXctestrun()
  {
    return $this->xctestrun;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IosXcTest::class, 'Google_Service_Testing_IosXcTest');
