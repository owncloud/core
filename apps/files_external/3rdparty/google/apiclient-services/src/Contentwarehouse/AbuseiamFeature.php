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

class AbuseiamFeature extends \Google\Collection
{
  protected $collection_key = 'timestampSequence';
  /**
   * @var bool
   */
  public $booleanValue;
  public $doubleValue;
  /**
   * @var string
   */
  public $featureCount;
  /**
   * @var string
   */
  public $int64Value;
  /**
   * @var int
   */
  public $integerValue;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $stringValue;
  /**
   * @var string[]
   */
  public $timestampSequence;

  /**
   * @param bool
   */
  public function setBooleanValue($booleanValue)
  {
    $this->booleanValue = $booleanValue;
  }
  /**
   * @return bool
   */
  public function getBooleanValue()
  {
    return $this->booleanValue;
  }
  public function setDoubleValue($doubleValue)
  {
    $this->doubleValue = $doubleValue;
  }
  public function getDoubleValue()
  {
    return $this->doubleValue;
  }
  /**
   * @param string
   */
  public function setFeatureCount($featureCount)
  {
    $this->featureCount = $featureCount;
  }
  /**
   * @return string
   */
  public function getFeatureCount()
  {
    return $this->featureCount;
  }
  /**
   * @param string
   */
  public function setInt64Value($int64Value)
  {
    $this->int64Value = $int64Value;
  }
  /**
   * @return string
   */
  public function getInt64Value()
  {
    return $this->int64Value;
  }
  /**
   * @param int
   */
  public function setIntegerValue($integerValue)
  {
    $this->integerValue = $integerValue;
  }
  /**
   * @return int
   */
  public function getIntegerValue()
  {
    return $this->integerValue;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  /**
   * @return string[]
   */
  public function getStringValue()
  {
    return $this->stringValue;
  }
  /**
   * @param string[]
   */
  public function setTimestampSequence($timestampSequence)
  {
    $this->timestampSequence = $timestampSequence;
  }
  /**
   * @return string[]
   */
  public function getTimestampSequence()
  {
    return $this->timestampSequence;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AbuseiamFeature::class, 'Google_Service_Contentwarehouse_AbuseiamFeature');
