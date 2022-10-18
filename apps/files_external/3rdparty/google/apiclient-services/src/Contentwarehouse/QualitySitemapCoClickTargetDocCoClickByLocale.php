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

class QualitySitemapCoClickTargetDocCoClickByLocale extends \Google\Model
{
  /**
   * @var float
   */
  public $coClicks;
  /**
   * @var float
   */
  public $coClicksCapped;
  /**
   * @var float
   */
  public $coClicksParent;
  /**
   * @var string
   */
  public $locale;

  /**
   * @param float
   */
  public function setCoClicks($coClicks)
  {
    $this->coClicks = $coClicks;
  }
  /**
   * @return float
   */
  public function getCoClicks()
  {
    return $this->coClicks;
  }
  /**
   * @param float
   */
  public function setCoClicksCapped($coClicksCapped)
  {
    $this->coClicksCapped = $coClicksCapped;
  }
  /**
   * @return float
   */
  public function getCoClicksCapped()
  {
    return $this->coClicksCapped;
  }
  /**
   * @param float
   */
  public function setCoClicksParent($coClicksParent)
  {
    $this->coClicksParent = $coClicksParent;
  }
  /**
   * @return float
   */
  public function getCoClicksParent()
  {
    return $this->coClicksParent;
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
class_alias(QualitySitemapCoClickTargetDocCoClickByLocale::class, 'Google_Service_Contentwarehouse_QualitySitemapCoClickTargetDocCoClickByLocale');
