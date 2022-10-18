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

class GeostorePoliticalProto extends \Google\Model
{
  protected $capitalType = GeostoreFeatureIdProto::class;
  protected $capitalDataType = '';
  public $grossDomesticProductUsdMillions;
  /**
   * @var float
   */
  public $literacyPercent;
  /**
   * @var string
   */
  public $population;

  /**
   * @param GeostoreFeatureIdProto
   */
  public function setCapital(GeostoreFeatureIdProto $capital)
  {
    $this->capital = $capital;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getCapital()
  {
    return $this->capital;
  }
  public function setGrossDomesticProductUsdMillions($grossDomesticProductUsdMillions)
  {
    $this->grossDomesticProductUsdMillions = $grossDomesticProductUsdMillions;
  }
  public function getGrossDomesticProductUsdMillions()
  {
    return $this->grossDomesticProductUsdMillions;
  }
  /**
   * @param float
   */
  public function setLiteracyPercent($literacyPercent)
  {
    $this->literacyPercent = $literacyPercent;
  }
  /**
   * @return float
   */
  public function getLiteracyPercent()
  {
    return $this->literacyPercent;
  }
  /**
   * @param string
   */
  public function setPopulation($population)
  {
    $this->population = $population;
  }
  /**
   * @return string
   */
  public function getPopulation()
  {
    return $this->population;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostorePoliticalProto::class, 'Google_Service_Contentwarehouse_GeostorePoliticalProto');
