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

class NlpSciencelitPubDate extends \Google\Model
{
  /**
   * @var string
   */
  public $dateStr;
  /**
   * @var string
   */
  public $pubType;

  /**
   * @param string
   */
  public function setDateStr($dateStr)
  {
    $this->dateStr = $dateStr;
  }
  /**
   * @return string
   */
  public function getDateStr()
  {
    return $this->dateStr;
  }
  /**
   * @param string
   */
  public function setPubType($pubType)
  {
    $this->pubType = $pubType;
  }
  /**
   * @return string
   */
  public function getPubType()
  {
    return $this->pubType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSciencelitPubDate::class, 'Google_Service_Contentwarehouse_NlpSciencelitPubDate');
