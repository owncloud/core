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

class UrlPoisoningData extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "notChangedTimeMs" => "NotChangedTimeMs",
        "originalCrawlTimeMs" => "OriginalCrawlTimeMs",
        "reuseTimeMs" => "ReuseTimeMs",
  ];
  /**
   * @var string
   */
  public $notChangedTimeMs;
  /**
   * @var string
   */
  public $originalCrawlTimeMs;
  /**
   * @var string
   */
  public $reuseTimeMs;
  /**
   * @var int
   */
  public $numSpamSiblings;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setNotChangedTimeMs($notChangedTimeMs)
  {
    $this->notChangedTimeMs = $notChangedTimeMs;
  }
  /**
   * @return string
   */
  public function getNotChangedTimeMs()
  {
    return $this->notChangedTimeMs;
  }
  /**
   * @param string
   */
  public function setOriginalCrawlTimeMs($originalCrawlTimeMs)
  {
    $this->originalCrawlTimeMs = $originalCrawlTimeMs;
  }
  /**
   * @return string
   */
  public function getOriginalCrawlTimeMs()
  {
    return $this->originalCrawlTimeMs;
  }
  /**
   * @param string
   */
  public function setReuseTimeMs($reuseTimeMs)
  {
    $this->reuseTimeMs = $reuseTimeMs;
  }
  /**
   * @return string
   */
  public function getReuseTimeMs()
  {
    return $this->reuseTimeMs;
  }
  /**
   * @param int
   */
  public function setNumSpamSiblings($numSpamSiblings)
  {
    $this->numSpamSiblings = $numSpamSiblings;
  }
  /**
   * @return int
   */
  public function getNumSpamSiblings()
  {
    return $this->numSpamSiblings;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UrlPoisoningData::class, 'Google_Service_Contentwarehouse_UrlPoisoningData');
