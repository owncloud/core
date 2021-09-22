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

namespace Google\Service\Fitness;

class AggregateRequest extends \Google\Collection
{
  protected $collection_key = 'filteredDataQualityStandard';
  protected $aggregateByType = AggregateBy::class;
  protected $aggregateByDataType = 'array';
  protected $bucketByActivitySegmentType = BucketByActivity::class;
  protected $bucketByActivitySegmentDataType = '';
  protected $bucketByActivityTypeType = BucketByActivity::class;
  protected $bucketByActivityTypeDataType = '';
  protected $bucketBySessionType = BucketBySession::class;
  protected $bucketBySessionDataType = '';
  protected $bucketByTimeType = BucketByTime::class;
  protected $bucketByTimeDataType = '';
  public $endTimeMillis;
  public $filteredDataQualityStandard;
  public $startTimeMillis;

  /**
   * @param AggregateBy[]
   */
  public function setAggregateBy($aggregateBy)
  {
    $this->aggregateBy = $aggregateBy;
  }
  /**
   * @return AggregateBy[]
   */
  public function getAggregateBy()
  {
    return $this->aggregateBy;
  }
  /**
   * @param BucketByActivity
   */
  public function setBucketByActivitySegment(BucketByActivity $bucketByActivitySegment)
  {
    $this->bucketByActivitySegment = $bucketByActivitySegment;
  }
  /**
   * @return BucketByActivity
   */
  public function getBucketByActivitySegment()
  {
    return $this->bucketByActivitySegment;
  }
  /**
   * @param BucketByActivity
   */
  public function setBucketByActivityType(BucketByActivity $bucketByActivityType)
  {
    $this->bucketByActivityType = $bucketByActivityType;
  }
  /**
   * @return BucketByActivity
   */
  public function getBucketByActivityType()
  {
    return $this->bucketByActivityType;
  }
  /**
   * @param BucketBySession
   */
  public function setBucketBySession(BucketBySession $bucketBySession)
  {
    $this->bucketBySession = $bucketBySession;
  }
  /**
   * @return BucketBySession
   */
  public function getBucketBySession()
  {
    return $this->bucketBySession;
  }
  /**
   * @param BucketByTime
   */
  public function setBucketByTime(BucketByTime $bucketByTime)
  {
    $this->bucketByTime = $bucketByTime;
  }
  /**
   * @return BucketByTime
   */
  public function getBucketByTime()
  {
    return $this->bucketByTime;
  }
  public function setEndTimeMillis($endTimeMillis)
  {
    $this->endTimeMillis = $endTimeMillis;
  }
  public function getEndTimeMillis()
  {
    return $this->endTimeMillis;
  }
  public function setFilteredDataQualityStandard($filteredDataQualityStandard)
  {
    $this->filteredDataQualityStandard = $filteredDataQualityStandard;
  }
  public function getFilteredDataQualityStandard()
  {
    return $this->filteredDataQualityStandard;
  }
  public function setStartTimeMillis($startTimeMillis)
  {
    $this->startTimeMillis = $startTimeMillis;
  }
  public function getStartTimeMillis()
  {
    return $this->startTimeMillis;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AggregateRequest::class, 'Google_Service_Fitness_AggregateRequest');
