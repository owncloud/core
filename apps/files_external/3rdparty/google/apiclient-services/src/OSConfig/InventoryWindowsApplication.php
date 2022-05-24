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

namespace Google\Service\OSConfig;

class InventoryWindowsApplication extends \Google\Model
{
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $displayVersion;
  /**
   * @var string
   */
  public $helpLink;
  protected $installDateType = Date::class;
  protected $installDateDataType = '';
  /**
   * @var string
   */
  public $publisher;

  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setDisplayVersion($displayVersion)
  {
    $this->displayVersion = $displayVersion;
  }
  /**
   * @return string
   */
  public function getDisplayVersion()
  {
    return $this->displayVersion;
  }
  /**
   * @param string
   */
  public function setHelpLink($helpLink)
  {
    $this->helpLink = $helpLink;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setPublisher($publisher)
  {
    $this->publisher = $publisher;
  }
  /**
   * @return string
   */
  public function getPublisher()
  {
    return $this->publisher;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InventoryWindowsApplication::class, 'Google_Service_OSConfig_InventoryWindowsApplication');
