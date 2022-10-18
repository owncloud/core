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

class ScienceCitationAccessURL extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "accessDay" => "AccessDay",
        "accessMonth" => "AccessMonth",
        "accessYear" => "AccessYear",
        "urlStr" => "UrlStr",
  ];
  /**
   * @var int
   */
  public $accessDay;
  /**
   * @var int
   */
  public $accessMonth;
  /**
   * @var int
   */
  public $accessYear;
  /**
   * @var string
   */
  public $urlStr;

  /**
   * @param int
   */
  public function setAccessDay($accessDay)
  {
    $this->accessDay = $accessDay;
  }
  /**
   * @return int
   */
  public function getAccessDay()
  {
    return $this->accessDay;
  }
  /**
   * @param int
   */
  public function setAccessMonth($accessMonth)
  {
    $this->accessMonth = $accessMonth;
  }
  /**
   * @return int
   */
  public function getAccessMonth()
  {
    return $this->accessMonth;
  }
  /**
   * @param int
   */
  public function setAccessYear($accessYear)
  {
    $this->accessYear = $accessYear;
  }
  /**
   * @return int
   */
  public function getAccessYear()
  {
    return $this->accessYear;
  }
  /**
   * @param string
   */
  public function setUrlStr($urlStr)
  {
    $this->urlStr = $urlStr;
  }
  /**
   * @return string
   */
  public function getUrlStr()
  {
    return $this->urlStr;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ScienceCitationAccessURL::class, 'Google_Service_Contentwarehouse_ScienceCitationAccessURL');
