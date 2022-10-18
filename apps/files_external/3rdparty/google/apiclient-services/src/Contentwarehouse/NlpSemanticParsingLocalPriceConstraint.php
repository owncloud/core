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

class NlpSemanticParsingLocalPriceConstraint extends \Google\Model
{
  /**
   * @var bool
   */
  public $cheap;
  /**
   * @var string
   */
  public $currencyCode;
  /**
   * @var bool
   */
  public $expensive;
  public $maxPrice;
  public $minPrice;
  /**
   * @var bool
   */
  public $moderatelyPriced;
  /**
   * @var bool
   */
  public $unspecified;

  /**
   * @param bool
   */
  public function setCheap($cheap)
  {
    $this->cheap = $cheap;
  }
  /**
   * @return bool
   */
  public function getCheap()
  {
    return $this->cheap;
  }
  /**
   * @param string
   */
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  /**
   * @return string
   */
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  /**
   * @param bool
   */
  public function setExpensive($expensive)
  {
    $this->expensive = $expensive;
  }
  /**
   * @return bool
   */
  public function getExpensive()
  {
    return $this->expensive;
  }
  public function setMaxPrice($maxPrice)
  {
    $this->maxPrice = $maxPrice;
  }
  public function getMaxPrice()
  {
    return $this->maxPrice;
  }
  public function setMinPrice($minPrice)
  {
    $this->minPrice = $minPrice;
  }
  public function getMinPrice()
  {
    return $this->minPrice;
  }
  /**
   * @param bool
   */
  public function setModeratelyPriced($moderatelyPriced)
  {
    $this->moderatelyPriced = $moderatelyPriced;
  }
  /**
   * @return bool
   */
  public function getModeratelyPriced()
  {
    return $this->moderatelyPriced;
  }
  /**
   * @param bool
   */
  public function setUnspecified($unspecified)
  {
    $this->unspecified = $unspecified;
  }
  /**
   * @return bool
   */
  public function getUnspecified()
  {
    return $this->unspecified;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingLocalPriceConstraint::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingLocalPriceConstraint');
