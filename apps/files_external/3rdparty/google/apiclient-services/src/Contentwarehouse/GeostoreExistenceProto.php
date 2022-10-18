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

class GeostoreExistenceProto extends \Google\Model
{
  /**
   * @var string
   */
  public $closeReason;
  /**
   * @var bool
   */
  public $closed;
  protected $endAsOfDateType = GeostoreDateTimeProto::class;
  protected $endAsOfDateDataType = '';
  protected $endDateType = GeostoreDateTimeProto::class;
  protected $endDateDataType = '';
  /**
   * @var string
   */
  public $featureBirthTimestampSeconds;
  /**
   * @var bool
   */
  public $removed;
  /**
   * @var string
   */
  public $removedReason;
  protected $startDateType = GeostoreDateTimeProto::class;
  protected $startDateDataType = '';

  /**
   * @param string
   */
  public function setCloseReason($closeReason)
  {
    $this->closeReason = $closeReason;
  }
  /**
   * @return string
   */
  public function getCloseReason()
  {
    return $this->closeReason;
  }
  /**
   * @param bool
   */
  public function setClosed($closed)
  {
    $this->closed = $closed;
  }
  /**
   * @return bool
   */
  public function getClosed()
  {
    return $this->closed;
  }
  /**
   * @param GeostoreDateTimeProto
   */
  public function setEndAsOfDate(GeostoreDateTimeProto $endAsOfDate)
  {
    $this->endAsOfDate = $endAsOfDate;
  }
  /**
   * @return GeostoreDateTimeProto
   */
  public function getEndAsOfDate()
  {
    return $this->endAsOfDate;
  }
  /**
   * @param GeostoreDateTimeProto
   */
  public function setEndDate(GeostoreDateTimeProto $endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return GeostoreDateTimeProto
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  /**
   * @param string
   */
  public function setFeatureBirthTimestampSeconds($featureBirthTimestampSeconds)
  {
    $this->featureBirthTimestampSeconds = $featureBirthTimestampSeconds;
  }
  /**
   * @return string
   */
  public function getFeatureBirthTimestampSeconds()
  {
    return $this->featureBirthTimestampSeconds;
  }
  /**
   * @param bool
   */
  public function setRemoved($removed)
  {
    $this->removed = $removed;
  }
  /**
   * @return bool
   */
  public function getRemoved()
  {
    return $this->removed;
  }
  /**
   * @param string
   */
  public function setRemovedReason($removedReason)
  {
    $this->removedReason = $removedReason;
  }
  /**
   * @return string
   */
  public function getRemovedReason()
  {
    return $this->removedReason;
  }
  /**
   * @param GeostoreDateTimeProto
   */
  public function setStartDate(GeostoreDateTimeProto $startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return GeostoreDateTimeProto
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreExistenceProto::class, 'Google_Service_Contentwarehouse_GeostoreExistenceProto');
