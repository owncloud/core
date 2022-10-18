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

class DrishtiLabelSetData extends \Google\Collection
{
  protected $collection_key = 'targetWeight';
  protected $extraType = DrishtiFeatureExtra::class;
  protected $extraDataType = 'array';
  protected $generalExtraType = DrishtiFeatureExtra::class;
  protected $generalExtraDataType = '';
  /**
   * @var string[]
   */
  public $targetClass;
  /**
   * @var string[]
   */
  public $targetClassName;
  /**
   * @var float[]
   */
  public $targetValue;
  /**
   * @var float[]
   */
  public $targetWeight;
  /**
   * @var float
   */
  public $weight;

  /**
   * @param DrishtiFeatureExtra[]
   */
  public function setExtra($extra)
  {
    $this->extra = $extra;
  }
  /**
   * @return DrishtiFeatureExtra[]
   */
  public function getExtra()
  {
    return $this->extra;
  }
  /**
   * @param DrishtiFeatureExtra
   */
  public function setGeneralExtra(DrishtiFeatureExtra $generalExtra)
  {
    $this->generalExtra = $generalExtra;
  }
  /**
   * @return DrishtiFeatureExtra
   */
  public function getGeneralExtra()
  {
    return $this->generalExtra;
  }
  /**
   * @param string[]
   */
  public function setTargetClass($targetClass)
  {
    $this->targetClass = $targetClass;
  }
  /**
   * @return string[]
   */
  public function getTargetClass()
  {
    return $this->targetClass;
  }
  /**
   * @param string[]
   */
  public function setTargetClassName($targetClassName)
  {
    $this->targetClassName = $targetClassName;
  }
  /**
   * @return string[]
   */
  public function getTargetClassName()
  {
    return $this->targetClassName;
  }
  /**
   * @param float[]
   */
  public function setTargetValue($targetValue)
  {
    $this->targetValue = $targetValue;
  }
  /**
   * @return float[]
   */
  public function getTargetValue()
  {
    return $this->targetValue;
  }
  /**
   * @param float[]
   */
  public function setTargetWeight($targetWeight)
  {
    $this->targetWeight = $targetWeight;
  }
  /**
   * @return float[]
   */
  public function getTargetWeight()
  {
    return $this->targetWeight;
  }
  /**
   * @param float
   */
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }
  /**
   * @return float
   */
  public function getWeight()
  {
    return $this->weight;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DrishtiLabelSetData::class, 'Google_Service_Contentwarehouse_DrishtiLabelSetData');
