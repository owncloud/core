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

namespace Google\Service\FirebaseDynamicLinks;

class AndroidInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $androidFallbackLink;
  /**
   * @var string
   */
  public $androidLink;
  /**
   * @var string
   */
  public $androidMinPackageVersionCode;
  /**
   * @var string
   */
  public $androidPackageName;

  /**
   * @param string
   */
  public function setAndroidFallbackLink($androidFallbackLink)
  {
    $this->androidFallbackLink = $androidFallbackLink;
  }
  /**
   * @return string
   */
  public function getAndroidFallbackLink()
  {
    return $this->androidFallbackLink;
  }
  /**
   * @param string
   */
  public function setAndroidLink($androidLink)
  {
    $this->androidLink = $androidLink;
  }
  /**
   * @return string
   */
  public function getAndroidLink()
  {
    return $this->androidLink;
  }
  /**
   * @param string
   */
  public function setAndroidMinPackageVersionCode($androidMinPackageVersionCode)
  {
    $this->androidMinPackageVersionCode = $androidMinPackageVersionCode;
  }
  /**
   * @return string
   */
  public function getAndroidMinPackageVersionCode()
  {
    return $this->androidMinPackageVersionCode;
  }
  /**
   * @param string
   */
  public function setAndroidPackageName($androidPackageName)
  {
    $this->androidPackageName = $androidPackageName;
  }
  /**
   * @return string
   */
  public function getAndroidPackageName()
  {
    return $this->androidPackageName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AndroidInfo::class, 'Google_Service_FirebaseDynamicLinks_AndroidInfo');
