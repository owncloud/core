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

namespace Google\Service\Sheets;

class PivotGroupSortValueBucket extends \Google\Collection
{
  protected $collection_key = 'buckets';
  protected $bucketsType = ExtendedValue::class;
  protected $bucketsDataType = 'array';
  /**
   * @var int
   */
  public $valuesIndex;

  /**
   * @param ExtendedValue[]
   */
  public function setBuckets($buckets)
  {
    $this->buckets = $buckets;
  }
  /**
   * @return ExtendedValue[]
   */
  public function getBuckets()
  {
    return $this->buckets;
  }
  /**
   * @param int
   */
  public function setValuesIndex($valuesIndex)
  {
    $this->valuesIndex = $valuesIndex;
  }
  /**
   * @return int
   */
  public function getValuesIndex()
  {
    return $this->valuesIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PivotGroupSortValueBucket::class, 'Google_Service_Sheets_PivotGroupSortValueBucket');
