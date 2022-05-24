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

namespace Google\Service\PagespeedInsights;

class ConfigSettings extends \Google\Model
{
  /**
   * @var string
   */
  public $channel;
  /**
   * @var string
   */
  public $emulatedFormFactor;
  /**
   * @var string
   */
  public $formFactor;
  /**
   * @var string
   */
  public $locale;
  /**
   * @var array
   */
  public $onlyCategories;

  /**
   * @param string
   */
  public function setChannel($channel)
  {
    $this->channel = $channel;
  }
  /**
   * @return string
   */
  public function getChannel()
  {
    return $this->channel;
  }
  /**
   * @param string
   */
  public function setEmulatedFormFactor($emulatedFormFactor)
  {
    $this->emulatedFormFactor = $emulatedFormFactor;
  }
  /**
   * @return string
   */
  public function getEmulatedFormFactor()
  {
    return $this->emulatedFormFactor;
  }
  /**
   * @param string
   */
  public function setFormFactor($formFactor)
  {
    $this->formFactor = $formFactor;
  }
  /**
   * @return string
   */
  public function getFormFactor()
  {
    return $this->formFactor;
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
   * @param array
   */
  public function setOnlyCategories($onlyCategories)
  {
    $this->onlyCategories = $onlyCategories;
  }
  /**
   * @return array
   */
  public function getOnlyCategories()
  {
    return $this->onlyCategories;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConfigSettings::class, 'Google_Service_PagespeedInsights_ConfigSettings');
