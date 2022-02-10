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

namespace Google\Service\Compute;

class TestFailure extends \Google\Collection
{
  protected $collection_key = 'headers';
  /**
   * @var string
   */
  public $actualOutputUrl;
  /**
   * @var int
   */
  public $actualRedirectResponseCode;
  /**
   * @var string
   */
  public $actualService;
  /**
   * @var string
   */
  public $expectedOutputUrl;
  /**
   * @var int
   */
  public $expectedRedirectResponseCode;
  /**
   * @var string
   */
  public $expectedService;
  protected $headersType = UrlMapTestHeader::class;
  protected $headersDataType = 'array';
  /**
   * @var string
   */
  public $host;
  /**
   * @var string
   */
  public $path;

  /**
   * @param string
   */
  public function setActualOutputUrl($actualOutputUrl)
  {
    $this->actualOutputUrl = $actualOutputUrl;
  }
  /**
   * @return string
   */
  public function getActualOutputUrl()
  {
    return $this->actualOutputUrl;
  }
  /**
   * @param int
   */
  public function setActualRedirectResponseCode($actualRedirectResponseCode)
  {
    $this->actualRedirectResponseCode = $actualRedirectResponseCode;
  }
  /**
   * @return int
   */
  public function getActualRedirectResponseCode()
  {
    return $this->actualRedirectResponseCode;
  }
  /**
   * @param string
   */
  public function setActualService($actualService)
  {
    $this->actualService = $actualService;
  }
  /**
   * @return string
   */
  public function getActualService()
  {
    return $this->actualService;
  }
  /**
   * @param string
   */
  public function setExpectedOutputUrl($expectedOutputUrl)
  {
    $this->expectedOutputUrl = $expectedOutputUrl;
  }
  /**
   * @return string
   */
  public function getExpectedOutputUrl()
  {
    return $this->expectedOutputUrl;
  }
  /**
   * @param int
   */
  public function setExpectedRedirectResponseCode($expectedRedirectResponseCode)
  {
    $this->expectedRedirectResponseCode = $expectedRedirectResponseCode;
  }
  /**
   * @return int
   */
  public function getExpectedRedirectResponseCode()
  {
    return $this->expectedRedirectResponseCode;
  }
  /**
   * @param string
   */
  public function setExpectedService($expectedService)
  {
    $this->expectedService = $expectedService;
  }
  /**
   * @return string
   */
  public function getExpectedService()
  {
    return $this->expectedService;
  }
  /**
   * @param UrlMapTestHeader[]
   */
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  /**
   * @return UrlMapTestHeader[]
   */
  public function getHeaders()
  {
    return $this->headers;
  }
  /**
   * @param string
   */
  public function setHost($host)
  {
    $this->host = $host;
  }
  /**
   * @return string
   */
  public function getHost()
  {
    return $this->host;
  }
  /**
   * @param string
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestFailure::class, 'Google_Service_Compute_TestFailure');
