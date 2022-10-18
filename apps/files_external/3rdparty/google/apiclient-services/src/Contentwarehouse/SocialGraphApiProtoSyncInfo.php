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

class SocialGraphApiProtoSyncInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $sourceId;
  /**
   * @var string
   */
  public $sync1;
  /**
   * @var string
   */
  public $sync2;
  /**
   * @var string
   */
  public $sync3;
  /**
   * @var string
   */
  public $sync4;

  /**
   * @param string
   */
  public function setSourceId($sourceId)
  {
    $this->sourceId = $sourceId;
  }
  /**
   * @return string
   */
  public function getSourceId()
  {
    return $this->sourceId;
  }
  /**
   * @param string
   */
  public function setSync1($sync1)
  {
    $this->sync1 = $sync1;
  }
  /**
   * @return string
   */
  public function getSync1()
  {
    return $this->sync1;
  }
  /**
   * @param string
   */
  public function setSync2($sync2)
  {
    $this->sync2 = $sync2;
  }
  /**
   * @return string
   */
  public function getSync2()
  {
    return $this->sync2;
  }
  /**
   * @param string
   */
  public function setSync3($sync3)
  {
    $this->sync3 = $sync3;
  }
  /**
   * @return string
   */
  public function getSync3()
  {
    return $this->sync3;
  }
  /**
   * @param string
   */
  public function setSync4($sync4)
  {
    $this->sync4 = $sync4;
  }
  /**
   * @return string
   */
  public function getSync4()
  {
    return $this->sync4;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SocialGraphApiProtoSyncInfo::class, 'Google_Service_Contentwarehouse_SocialGraphApiProtoSyncInfo');
