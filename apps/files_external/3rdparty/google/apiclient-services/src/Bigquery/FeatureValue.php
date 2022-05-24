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

namespace Google\Service\Bigquery;

class FeatureValue extends \Google\Model
{
  protected $categoricalValueType = CategoricalValue::class;
  protected $categoricalValueDataType = '';
  /**
   * @var string
   */
  public $featureColumn;
  public $numericalValue;

  /**
   * @param CategoricalValue
   */
  public function setCategoricalValue(CategoricalValue $categoricalValue)
  {
    $this->categoricalValue = $categoricalValue;
  }
  /**
   * @return CategoricalValue
   */
  public function getCategoricalValue()
  {
    return $this->categoricalValue;
  }
  /**
   * @param string
   */
  public function setFeatureColumn($featureColumn)
  {
    $this->featureColumn = $featureColumn;
  }
  /**
   * @return string
   */
  public function getFeatureColumn()
  {
    return $this->featureColumn;
  }
  public function setNumericalValue($numericalValue)
  {
    $this->numericalValue = $numericalValue;
  }
  public function getNumericalValue()
  {
    return $this->numericalValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FeatureValue::class, 'Google_Service_Bigquery_FeatureValue');
