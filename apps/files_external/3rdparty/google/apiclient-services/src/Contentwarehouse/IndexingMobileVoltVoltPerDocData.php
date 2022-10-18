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

class IndexingMobileVoltVoltPerDocData extends \Google\Model
{
  protected $desktopCwvType = IndexingMobileVoltCoreWebVitals::class;
  protected $desktopCwvDataType = '';
  /**
   * @var bool
   */
  public $desktopDisplayUrlIsHttps;
  /**
   * @var bool
   */
  public $displayUrlIsHttps;
  protected $mobileCwvType = IndexingMobileVoltCoreWebVitals::class;
  protected $mobileCwvDataType = '';

  /**
   * @param IndexingMobileVoltCoreWebVitals
   */
  public function setDesktopCwv(IndexingMobileVoltCoreWebVitals $desktopCwv)
  {
    $this->desktopCwv = $desktopCwv;
  }
  /**
   * @return IndexingMobileVoltCoreWebVitals
   */
  public function getDesktopCwv()
  {
    return $this->desktopCwv;
  }
  /**
   * @param bool
   */
  public function setDesktopDisplayUrlIsHttps($desktopDisplayUrlIsHttps)
  {
    $this->desktopDisplayUrlIsHttps = $desktopDisplayUrlIsHttps;
  }
  /**
   * @return bool
   */
  public function getDesktopDisplayUrlIsHttps()
  {
    return $this->desktopDisplayUrlIsHttps;
  }
  /**
   * @param bool
   */
  public function setDisplayUrlIsHttps($displayUrlIsHttps)
  {
    $this->displayUrlIsHttps = $displayUrlIsHttps;
  }
  /**
   * @return bool
   */
  public function getDisplayUrlIsHttps()
  {
    return $this->displayUrlIsHttps;
  }
  /**
   * @param IndexingMobileVoltCoreWebVitals
   */
  public function setMobileCwv(IndexingMobileVoltCoreWebVitals $mobileCwv)
  {
    $this->mobileCwv = $mobileCwv;
  }
  /**
   * @return IndexingMobileVoltCoreWebVitals
   */
  public function getMobileCwv()
  {
    return $this->mobileCwv;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingMobileVoltVoltPerDocData::class, 'Google_Service_Contentwarehouse_IndexingMobileVoltVoltPerDocData');
