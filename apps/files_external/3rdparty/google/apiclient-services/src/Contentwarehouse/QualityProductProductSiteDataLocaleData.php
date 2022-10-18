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

class QualityProductProductSiteDataLocaleData extends \Google\Model
{
  /**
   * @var float
   */
  public $boostFactor;
  /**
   * @var bool
   */
  public $gobiSite;
  /**
   * @var string
   */
  public $locale;

  /**
   * @param float
   */
  public function setBoostFactor($boostFactor)
  {
    $this->boostFactor = $boostFactor;
  }
  /**
   * @return float
   */
  public function getBoostFactor()
  {
    return $this->boostFactor;
  }
  /**
   * @param bool
   */
  public function setGobiSite($gobiSite)
  {
    $this->gobiSite = $gobiSite;
  }
  /**
   * @return bool
   */
  public function getGobiSite()
  {
    return $this->gobiSite;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityProductProductSiteDataLocaleData::class, 'Google_Service_Contentwarehouse_QualityProductProductSiteDataLocaleData');
