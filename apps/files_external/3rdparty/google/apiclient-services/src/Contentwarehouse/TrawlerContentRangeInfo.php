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

class TrawlerContentRangeInfo extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "endPos" => "EndPos",
        "startPos" => "StartPos",
        "totalLength" => "TotalLength",
  ];
  /**
   * @var string
   */
  public $endPos;
  /**
   * @var string
   */
  public $startPos;
  /**
   * @var string
   */
  public $totalLength;

  /**
   * @param string
   */
  public function setEndPos($endPos)
  {
    $this->endPos = $endPos;
  }
  /**
   * @return string
   */
  public function getEndPos()
  {
    return $this->endPos;
  }
  /**
   * @param string
   */
  public function setStartPos($startPos)
  {
    $this->startPos = $startPos;
  }
  /**
   * @return string
   */
  public function getStartPos()
  {
    return $this->startPos;
  }
  /**
   * @param string
   */
  public function setTotalLength($totalLength)
  {
    $this->totalLength = $totalLength;
  }
  /**
   * @return string
   */
  public function getTotalLength()
  {
    return $this->totalLength;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerContentRangeInfo::class, 'Google_Service_Contentwarehouse_TrawlerContentRangeInfo');
