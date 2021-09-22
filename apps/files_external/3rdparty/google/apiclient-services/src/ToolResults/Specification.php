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

class Specification extends \Google\Model
{
  protected $androidTestType = AndroidTest::class;
  protected $androidTestDataType = '';
  protected $iosTestType = IosTest::class;
  protected $iosTestDataType = '';

  /**
   * @param AndroidTest
   */
  public function setAndroidTest(AndroidTest $androidTest)
  {
    $this->androidTest = $androidTest;
  }
  /**
   * @return AndroidTest
   */
  public function getAndroidTest()
  {
    return $this->androidTest;
  }
  /**
   * @param IosTest
   */
  public function setIosTest(IosTest $iosTest)
  {
    $this->iosTest = $iosTest;
  }
  /**
   * @return IosTest
   */
  public function getIosTest()
  {
    return $this->iosTest;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Specification::class, 'Google_Service_ToolResults_Specification');
