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

namespace Google\Service\CloudAsset;

class WindowsApplication extends \Google\Model
{
  public $displayName;
  public $displayVersion;
  public $helpLink;
  protected $installDateType = Date::class;
  protected $installDateDataType = '';
  public $publisher;

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setDisplayVersion($displayVersion)
  {
    $this->displayVersion = $displayVersion;
  }
  public function getDisplayVersion()
  {
    return $this->displayVersion;
  }
  public function setHelpLink($helpLink)
  {
    $this->helpLink = $helpLink;
  }
  public function getHelpLink()
  {
    return $this->helpLink;
  }
  /**
   * @param Date
   */
  public function setInstallDate(Date $installDate)
  {
    $this->installDate = $installDate;
  }
  /**
   * @return Date
   */
  public function getInstallDate()
  {
    return $this->installDate;
  }
  public function setPublisher($publisher)
  {
    $this->publisher = $publisher;
  }
  public function getPublisher()
  {
    return $this->publisher;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WindowsApplication::class, 'Google_Service_CloudAsset_WindowsApplication');
