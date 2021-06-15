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

class Google_Service_Spanner_Metric extends Google_Model
{
  public $aggregation;
  protected $categoryType = 'Google_Service_Spanner_LocalizedString';
  protected $categoryDataType = '';
  protected $derivedType = 'Google_Service_Spanner_DerivedMetric';
  protected $derivedDataType = '';
  protected $displayLabelType = 'Google_Service_Spanner_LocalizedString';
  protected $displayLabelDataType = '';
  public $hasNonzeroData;
  public $hotValue;
  protected $indexedHotKeysType = 'Google_Service_Spanner_IndexedHotKey';
  protected $indexedHotKeysDataType = 'map';
  protected $indexedKeyRangeInfosType = 'Google_Service_Spanner_IndexedKeyRangeInfos';
  protected $indexedKeyRangeInfosDataType = 'map';
  protected $infoType = 'Google_Service_Spanner_LocalizedString';
  protected $infoDataType = '';
  protected $matrixType = 'Google_Service_Spanner_MetricMatrix';
  protected $matrixDataType = '';
  protected $unitType = 'Google_Service_Spanner_LocalizedString';
  protected $unitDataType = '';
  public $visible;

  public function setAggregation($aggregation)
  {
    $this->aggregation = $aggregation;
  }
  public function getAggregation()
  {
    return $this->aggregation;
  }
  /**
   * @param Google_Service_Spanner_LocalizedString
   */
  public function setCategory(Google_Service_Spanner_LocalizedString $category)
  {
    $this->category = $category;
  }
  /**
   * @return Google_Service_Spanner_LocalizedString
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param Google_Service_Spanner_DerivedMetric
   */
  public function setDerived(Google_Service_Spanner_DerivedMetric $derived)
  {
    $this->derived = $derived;
  }
  /**
   * @return Google_Service_Spanner_DerivedMetric
   */
  public function getDerived()
  {
    return $this->derived;
  }
  /**
   * @param Google_Service_Spanner_LocalizedString
   */
  public function setDisplayLabel(Google_Service_Spanner_LocalizedString $displayLabel)
  {
    $this->displayLabel = $displayLabel;
  }
  /**
   * @return Google_Service_Spanner_LocalizedString
   */
  public function getDisplayLabel()
  {
    return $this->displayLabel;
  }
  public function setHasNonzeroData($hasNonzeroData)
  {
    $this->hasNonzeroData = $hasNonzeroData;
  }
  public function getHasNonzeroData()
  {
    return $this->hasNonzeroData;
  }
  public function setHotValue($hotValue)
  {
    $this->hotValue = $hotValue;
  }
  public function getHotValue()
  {
    return $this->hotValue;
  }
  /**
   * @param Google_Service_Spanner_IndexedHotKey[]
   */
  public function setIndexedHotKeys($indexedHotKeys)
  {
    $this->indexedHotKeys = $indexedHotKeys;
  }
  /**
   * @return Google_Service_Spanner_IndexedHotKey[]
   */
  public function getIndexedHotKeys()
  {
    return $this->indexedHotKeys;
  }
  /**
   * @param Google_Service_Spanner_IndexedKeyRangeInfos[]
   */
  public function setIndexedKeyRangeInfos($indexedKeyRangeInfos)
  {
    $this->indexedKeyRangeInfos = $indexedKeyRangeInfos;
  }
  /**
   * @return Google_Service_Spanner_IndexedKeyRangeInfos[]
   */
  public function getIndexedKeyRangeInfos()
  {
    return $this->indexedKeyRangeInfos;
  }
  /**
   * @param Google_Service_Spanner_LocalizedString
   */
  public function setInfo(Google_Service_Spanner_LocalizedString $info)
  {
    $this->info = $info;
  }
  /**
   * @return Google_Service_Spanner_LocalizedString
   */
  public function getInfo()
  {
    return $this->info;
  }
  /**
   * @param Google_Service_Spanner_MetricMatrix
   */
  public function setMatrix(Google_Service_Spanner_MetricMatrix $matrix)
  {
    $this->matrix = $matrix;
  }
  /**
   * @return Google_Service_Spanner_MetricMatrix
   */
  public function getMatrix()
  {
    return $this->matrix;
  }
  /**
   * @param Google_Service_Spanner_LocalizedString
   */
  public function setUnit(Google_Service_Spanner_LocalizedString $unit)
  {
    $this->unit = $unit;
  }
  /**
   * @return Google_Service_Spanner_LocalizedString
   */
  public function getUnit()
  {
    return $this->unit;
  }
  public function setVisible($visible)
  {
    $this->visible = $visible;
  }
  public function getVisible()
  {
    return $this->visible;
  }
}
