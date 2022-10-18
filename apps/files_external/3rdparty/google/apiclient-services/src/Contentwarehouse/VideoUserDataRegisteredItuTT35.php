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

namespace Google\Service\Contentwarehouse;

class VideoUserDataRegisteredItuTT35 extends \Google\Model
{
  /**
   * @var int
   */
  public $count;
  /**
   * @var int
   */
  public $countryCode;
  /**
   * @var int
   */
  public $providerCode;

  /**
   * @param int
   */
  public function setCount($count)
  {
    $this->count = $count;
  }
  /**
   * @return int
   */
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param int
   */
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  /**
   * @return int
   */
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  /**
   * @param int
   */
  public function setProviderCode($providerCode)
  {
    $this->providerCode = $providerCode;
  }
  /**
   * @return int
   */
  public function getProviderCode()
  {
    return $this->providerCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoUserDataRegisteredItuTT35::class, 'Google_Service_Contentwarehouse_VideoUserDataRegisteredItuTT35');
