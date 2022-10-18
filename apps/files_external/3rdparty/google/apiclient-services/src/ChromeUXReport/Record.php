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

namespace Google\Service\ChromeUXReport;

class Record extends \Google\Model
{
  protected $collectionPeriodType = CollectionPeriod::class;
  protected $collectionPeriodDataType = '';
  protected $keyType = Key::class;
  protected $keyDataType = '';
  protected $metricsType = Metric::class;
  protected $metricsDataType = 'map';

  /**
   * @param CollectionPeriod
   */
  public function setCollectionPeriod(CollectionPeriod $collectionPeriod)
  {
    $this->collectionPeriod = $collectionPeriod;
  }
  /**
   * @return CollectionPeriod
   */
  public function getCollectionPeriod()
  {
    return $this->collectionPeriod;
  }
  /**
   * @param Key
   */
  public function setKey(Key $key)
  {
    $this->key = $key;
  }
  /**
   * @return Key
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param Metric[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Metric[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Record::class, 'Google_Service_ChromeUXReport_Record');
