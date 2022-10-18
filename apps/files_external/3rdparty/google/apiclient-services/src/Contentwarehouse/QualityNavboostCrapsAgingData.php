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

class QualityNavboostCrapsAgingData extends \Google\Model
{
  protected $lastMonthBucketType = QualityNavboostCrapsAgingDataAgingAgeBucket::class;
  protected $lastMonthBucketDataType = '';
  protected $lastWeekBucketType = QualityNavboostCrapsAgingDataAgingAgeBucket::class;
  protected $lastWeekBucketDataType = '';
  protected $lastYearBucketType = QualityNavboostCrapsAgingDataAgingAgeBucket::class;
  protected $lastYearBucketDataType = '';
  protected $yearPlusBucketType = QualityNavboostCrapsAgingDataAgingAgeBucket::class;
  protected $yearPlusBucketDataType = '';

  /**
   * @param QualityNavboostCrapsAgingDataAgingAgeBucket
   */
  public function setLastMonthBucket(QualityNavboostCrapsAgingDataAgingAgeBucket $lastMonthBucket)
  {
    $this->lastMonthBucket = $lastMonthBucket;
  }
  /**
   * @return QualityNavboostCrapsAgingDataAgingAgeBucket
   */
  public function getLastMonthBucket()
  {
    return $this->lastMonthBucket;
  }
  /**
   * @param QualityNavboostCrapsAgingDataAgingAgeBucket
   */
  public function setLastWeekBucket(QualityNavboostCrapsAgingDataAgingAgeBucket $lastWeekBucket)
  {
    $this->lastWeekBucket = $lastWeekBucket;
  }
  /**
   * @return QualityNavboostCrapsAgingDataAgingAgeBucket
   */
  public function getLastWeekBucket()
  {
    return $this->lastWeekBucket;
  }
  /**
   * @param QualityNavboostCrapsAgingDataAgingAgeBucket
   */
  public function setLastYearBucket(QualityNavboostCrapsAgingDataAgingAgeBucket $lastYearBucket)
  {
    $this->lastYearBucket = $lastYearBucket;
  }
  /**
   * @return QualityNavboostCrapsAgingDataAgingAgeBucket
   */
  public function getLastYearBucket()
  {
    return $this->lastYearBucket;
  }
  /**
   * @param QualityNavboostCrapsAgingDataAgingAgeBucket
   */
  public function setYearPlusBucket(QualityNavboostCrapsAgingDataAgingAgeBucket $yearPlusBucket)
  {
    $this->yearPlusBucket = $yearPlusBucket;
  }
  /**
   * @return QualityNavboostCrapsAgingDataAgingAgeBucket
   */
  public function getYearPlusBucket()
  {
    return $this->yearPlusBucket;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityNavboostCrapsAgingData::class, 'Google_Service_Contentwarehouse_QualityNavboostCrapsAgingData');
