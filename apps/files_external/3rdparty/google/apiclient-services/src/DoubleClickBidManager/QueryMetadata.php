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

namespace Google\Service\DoubleClickBidManager;

class QueryMetadata extends \Google\Collection
{
  protected $collection_key = 'shareEmailAddress';
  protected $dataRangeType = DataRange::class;
  protected $dataRangeDataType = '';
  /**
   * @var string
   */
  public $format;
  /**
   * @var bool
   */
  public $sendNotification;
  /**
   * @var string[]
   */
  public $shareEmailAddress;
  /**
   * @var string
   */
  public $title;

  /**
   * @param DataRange
   */
  public function setDataRange(DataRange $dataRange)
  {
    $this->dataRange = $dataRange;
  }
  /**
   * @return DataRange
   */
  public function getDataRange()
  {
    return $this->dataRange;
  }
  /**
   * @param string
   */
  public function setFormat($format)
  {
    $this->format = $format;
  }
  /**
   * @return string
   */
  public function getFormat()
  {
    return $this->format;
  }
  /**
   * @param bool
   */
  public function setSendNotification($sendNotification)
  {
    $this->sendNotification = $sendNotification;
  }
  /**
   * @return bool
   */
  public function getSendNotification()
  {
    return $this->sendNotification;
  }
  /**
   * @param string[]
   */
  public function setShareEmailAddress($shareEmailAddress)
  {
    $this->shareEmailAddress = $shareEmailAddress;
  }
  /**
   * @return string[]
   */
  public function getShareEmailAddress()
  {
    return $this->shareEmailAddress;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QueryMetadata::class, 'Google_Service_DoubleClickBidManager_QueryMetadata');
