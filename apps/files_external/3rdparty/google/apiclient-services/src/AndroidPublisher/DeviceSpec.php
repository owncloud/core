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

namespace Google\Service\AndroidPublisher;

class DeviceSpec extends \Google\Collection
{
  protected $collection_key = 'supportedLocales';
  /**
   * @var string
   */
  public $screenDensity;
  /**
   * @var string[]
   */
  public $supportedAbis;
  /**
   * @var string[]
   */
  public $supportedLocales;

  /**
   * @param string
   */
  public function setScreenDensity($screenDensity)
  {
    $this->screenDensity = $screenDensity;
  }
  /**
   * @return string
   */
  public function getScreenDensity()
  {
    return $this->screenDensity;
  }
  /**
   * @param string[]
   */
  public function setSupportedAbis($supportedAbis)
  {
    $this->supportedAbis = $supportedAbis;
  }
  /**
   * @return string[]
   */
  public function getSupportedAbis()
  {
    return $this->supportedAbis;
  }
  /**
   * @param string[]
   */
  public function setSupportedLocales($supportedLocales)
  {
    $this->supportedLocales = $supportedLocales;
  }
  /**
   * @return string[]
   */
  public function getSupportedLocales()
  {
    return $this->supportedLocales;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeviceSpec::class, 'Google_Service_AndroidPublisher_DeviceSpec');
