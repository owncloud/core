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

namespace Google\Service\Spanner;

class Metric extends \Google\Model
{
  /**
   * @var string
   */
  public $aggregation;
  protected $categoryType = LocalizedString::class;
  protected $categoryDataType = '';
  protected $derivedType = DerivedMetric::class;
  protected $derivedDataType = '';
  protected $displayLabelType = LocalizedString::class;
  protected $displayLabelDataType = '';
  /**
   * @var bool
   */
  public $hasNonzeroData;
  /**
   * @var float
   */
  public $hotValue;
  protected $indexedHotKeysType = IndexedHotKey::class;
  protected $indexedHotKeysDataType = 'map';
  protected $indexedKeyRangeInfosType = IndexedKeyRangeInfos::class;
  protected $indexedKeyRangeInfosDataType = 'map';
  protected $infoType = LocalizedString::class;
  protected $infoDataType = '';
  protected $matrixType = MetricMatrix::class;
  protected $matrixDataType = '';
  protected $unitType = LocalizedString::class;
  protected $unitDataType = '';
  /**
   * @var bool
   */
  public $visible;

  /**
   * @param string
   */
  public function setAggregation($aggregation)
  {
    $this->aggregation = $aggregation;
  }
  /**
   * @return string
   */
  public function getAggregation()
  {
    return $this->aggregation;
  }
  /**
   * @param LocalizedString
   */
  public function setCategory(LocalizedString $category)
  {
    $this->category = $category;
  }
  /**
   * @return LocalizedString
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param DerivedMetric
   */
  public function setDerived(DerivedMetric $derived)
  {
    $this->derived = $derived;
  }
  /**
   * @return DerivedMetric
   */
  public function getDerived()
  {
    return $this->derived;
  }
  /**
   * @param LocalizedString
   */
  public function setDisplayLabel(LocalizedString $displayLabel)
  {
    $this->displayLabel = $displayLabel;
  }
  /**
   * @return LocalizedString
   */
  public function getDisplayLabel()
  {
    return $this->displayLabel;
  }
  /**
   * @param bool
   */
  public function setHasNonzeroData($hasNonzeroData)
  {
    $this->hasNonzeroData = $hasNonzeroData;
  }
  /**
   * @return bool
   */
  public function getHasNonzeroData()
  {
    return $this->hasNonzeroData;
  }
  /**
   * @param float
   */
  public function setHotValue($hotValue)
  {
    $this->hotValue = $hotValue;
  }
  /**
   * @return float
   */
  public function getHotValue()
  {
    return $this->hotValue;
  }
  /**
   * @param IndexedHotKey[]
   */
  public function setIndexedHotKeys($indexedHotKeys)
  {
    $this->indexedHotKeys = $indexedHotKeys;
  }
  /**
   * @return IndexedHotKey[]
   */
  public function getIndexedHotKeys()
  {
    return $this->indexedHotKeys;
  }
  /**
   * @param IndexedKeyRangeInfos[]
   */
  public function setIndexedKeyRangeInfos($indexedKeyRangeInfos)
  {
    $this->indexedKeyRangeInfos = $indexedKeyRangeInfos;
  }
  /**
   * @return IndexedKeyRangeInfos[]
   */
  public function getIndexedKeyRangeInfos()
  {
    return $this->indexedKeyRangeInfos;
  }
  /**
   * @param LocalizedString
   */
  public function setInfo(LocalizedString $info)
  {
    $this->info = $info;
  }
  /**
   * @return LocalizedString
   */
  public function getInfo()
  {
    return $this->info;
  }
  /**
   * @param MetricMatrix
   */
  public function setMatrix(MetricMatrix $matrix)
  {
    $this->matrix = $matrix;
  }
  /**
   * @return MetricMatrix
   */
  public function getMatrix()
  {
    return $this->matrix;
  }
  /**
   * @param LocalizedString
   */
  public function setUnit(LocalizedString $unit)
  {
    $this->unit = $unit;
  }
  /**
   * @return LocalizedString
   */
  public function getUnit()
  {
    return $this->unit;
  }
  /**
   * @param bool
   */
  public function setVisible($visible)
  {
    $this->visible = $visible;
  }
  /**
   * @return bool
   */
  public function getVisible()
  {
    return $this->visible;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Metric::class, 'Google_Service_Spanner_Metric');
