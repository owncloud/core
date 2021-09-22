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

namespace Google\Service\ShoppingContent;

class RateGroup extends \Google\Collection
{
  protected $collection_key = 'subtables';
  public $applicableShippingLabels;
  protected $carrierRatesType = CarrierRate::class;
  protected $carrierRatesDataType = 'array';
  protected $mainTableType = Table::class;
  protected $mainTableDataType = '';
  public $name;
  protected $singleValueType = Value::class;
  protected $singleValueDataType = '';
  protected $subtablesType = Table::class;
  protected $subtablesDataType = 'array';

  public function setApplicableShippingLabels($applicableShippingLabels)
  {
    $this->applicableShippingLabels = $applicableShippingLabels;
  }
  public function getApplicableShippingLabels()
  {
    return $this->applicableShippingLabels;
  }
  /**
   * @param CarrierRate[]
   */
  public function setCarrierRates($carrierRates)
  {
    $this->carrierRates = $carrierRates;
  }
  /**
   * @return CarrierRate[]
   */
  public function getCarrierRates()
  {
    return $this->carrierRates;
  }
  /**
   * @param Table
   */
  public function setMainTable(Table $mainTable)
  {
    $this->mainTable = $mainTable;
  }
  /**
   * @return Table
   */
  public function getMainTable()
  {
    return $this->mainTable;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Value
   */
  public function setSingleValue(Value $singleValue)
  {
    $this->singleValue = $singleValue;
  }
  /**
   * @return Value
   */
  public function getSingleValue()
  {
    return $this->singleValue;
  }
  /**
   * @param Table[]
   */
  public function setSubtables($subtables)
  {
    $this->subtables = $subtables;
  }
  /**
   * @return Table[]
   */
  public function getSubtables()
  {
    return $this->subtables;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RateGroup::class, 'Google_Service_ShoppingContent_RateGroup');
