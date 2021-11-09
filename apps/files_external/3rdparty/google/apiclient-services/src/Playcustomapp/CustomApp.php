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

namespace Google\Service\Playcustomapp;

class CustomApp extends \Google\Collection
{
  protected $collection_key = 'organizations';
  public $languageCode;
  protected $organizationsType = Organization::class;
  protected $organizationsDataType = 'array';
  public $packageName;
  public $title;

  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param Organization[]
   */
  public function setOrganizations($organizations)
  {
    $this->organizations = $organizations;
  }
  /**
   * @return Organization[]
   */
  public function getOrganizations()
  {
    return $this->organizations;
  }
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  public function getPackageName()
  {
    return $this->packageName;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomApp::class, 'Google_Service_Playcustomapp_CustomApp');
