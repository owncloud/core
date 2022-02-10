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

class AndroidDevice extends \Google\Model
{
  /**
   * @var string
   */
  public $androidModelId;
  /**
   * @var string
   */
  public $androidVersionId;
  /**
   * @var string
   */
  public $locale;
  /**
   * @var string
   */
  public $orientation;

  /**
   * @param string
   */
  public function setAndroidModelId($androidModelId)
  {
    $this->androidModelId = $androidModelId;
  }
  /**
   * @return string
   */
  public function getAndroidModelId()
  {
    return $this->androidModelId;
  }
  /**
   * @param string
   */
  public function setAndroidVersionId($androidVersionId)
  {
    $this->androidVersionId = $androidVersionId;
  }
  /**
   * @return string
   */
  public function getAndroidVersionId()
  {
    return $this->androidVersionId;
  }
  /**
   * @param string
   */
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  /**
   * @return string
   */
  public function getLocale()
  {
    return $this->locale;
  }
  /**
   * @param string
   */
  public function setOrientation($orientation)
  {
    $this->orientation = $orientation;
  }
  /**
   * @return string
   */
  public function getOrientation()
  {
    return $this->orientation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AndroidDevice::class, 'Google_Service_Testing_AndroidDevice');
