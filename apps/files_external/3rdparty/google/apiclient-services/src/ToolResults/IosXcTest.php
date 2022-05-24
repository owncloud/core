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

namespace Google\Service\ToolResults;

class IosXcTest extends \Google\Model
{
  /**
   * @var string
   */
  public $bundleId;
  /**
   * @var string
   */
  public $xcodeVersion;

  /**
   * @param string
   */
  public function setBundleId($bundleId)
  {
    $this->bundleId = $bundleId;
  }
  /**
   * @return string
   */
  public function getBundleId()
  {
    return $this->bundleId;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IosXcTest::class, 'Google_Service_ToolResults_IosXcTest');
