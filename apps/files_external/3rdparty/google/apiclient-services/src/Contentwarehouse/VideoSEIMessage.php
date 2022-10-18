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

class VideoSEIMessage extends \Google\Model
{
  /**
   * @var int
   */
  public $count;
  /**
   * @var string
   */
  public $cumulativeSize;
  /**
   * @var int
   */
  public $payloadtype;

  /**
   * @param int
   */
  public function setCount($count)
  {
    $this->count = $count;
  }
  /**
   * @return int
   */
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param string
   */
  public function setCumulativeSize($cumulativeSize)
  {
    $this->cumulativeSize = $cumulativeSize;
  }
  /**
   * @return string
   */
  public function getCumulativeSize()
  {
    return $this->cumulativeSize;
  }
  /**
   * @param int
   */
  public function setPayloadtype($payloadtype)
  {
    $this->payloadtype = $payloadtype;
  }
  /**
   * @return int
   */
  public function getPayloadtype()
  {
    return $this->payloadtype;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoSEIMessage::class, 'Google_Service_Contentwarehouse_VideoSEIMessage');
