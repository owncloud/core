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

class TrawlerFetchReplyDataCrawlDates extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "notChangedDate" => "NotChangedDate",
        "originalCrawlDate" => "OriginalCrawlDate",
        "reuseDate" => "ReuseDate",
  ];
  /**
   * @var int
   */
  public $notChangedDate;
  /**
   * @var int
   */
  public $originalCrawlDate;
  /**
   * @var int
   */
  public $reuseDate;

  /**
   * @param int
   */
  public function setNotChangedDate($notChangedDate)
  {
    $this->notChangedDate = $notChangedDate;
  }
  /**
   * @return int
   */
  public function getNotChangedDate()
  {
    return $this->notChangedDate;
  }
  /**
   * @param int
   */
  public function setOriginalCrawlDate($originalCrawlDate)
  {
    $this->originalCrawlDate = $originalCrawlDate;
  }
  /**
   * @return int
   */
  public function getOriginalCrawlDate()
  {
    return $this->originalCrawlDate;
  }
  /**
   * @param int
   */
  public function setReuseDate($reuseDate)
  {
    $this->reuseDate = $reuseDate;
  }
  /**
   * @return int
   */
  public function getReuseDate()
  {
    return $this->reuseDate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerFetchReplyDataCrawlDates::class, 'Google_Service_Contentwarehouse_TrawlerFetchReplyDataCrawlDates');
