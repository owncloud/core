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

class Google_Service_PagespeedInsights_ConfigSettings extends Google_Model
{
  public $channel;
  public $emulatedFormFactor;
  public $formFactor;
  public $locale;
  public $onlyCategories;

  public function setChannel($channel)
  {
    $this->channel = $channel;
  }
  public function getChannel()
  {
    return $this->channel;
  }
  public function setEmulatedFormFactor($emulatedFormFactor)
  {
    $this->emulatedFormFactor = $emulatedFormFactor;
  }
  public function getEmulatedFormFactor()
  {
    return $this->emulatedFormFactor;
  }
  public function setFormFactor($formFactor)
  {
    $this->formFactor = $formFactor;
  }
  public function getFormFactor()
  {
    return $this->formFactor;
  }
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  public function getLocale()
  {
    return $this->locale;
  }
  public function setOnlyCategories($onlyCategories)
  {
    $this->onlyCategories = $onlyCategories;
  }
  public function getOnlyCategories()
  {
    return $this->onlyCategories;
  }
}
