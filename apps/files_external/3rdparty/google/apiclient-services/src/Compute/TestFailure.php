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
  public $actualOutputUrl;
  public $actualRedirectResponseCode;
  public $actualService;
  public $expectedOutputUrl;
  public $expectedRedirectResponseCode;
  public $expectedService;
  protected $headersType = UrlMapTestHeader::class;
  protected $headersDataType = 'array';
  public $host;
  public $path;

  public function setActualOutputUrl($actualOutputUrl)
  {
    $this->actualOutputUrl = $actualOutputUrl;
  }
  public function getActualOutputUrl()
  {
    return $this->actualOutputUrl;
  }
  public function setActualRedirectResponseCode($actualRedirectResponseCode)
  {
    $this->actualRedirectResponseCode = $actualRedirectResponseCode;
  }
  public function getActualRedirectResponseCode()
  {
    return $this->actualRedirectResponseCode;
  }
  public function setActualService($actualService)
  {
    $this->actualService = $actualService;
  }
  public function getActualService()
  {
    return $this->actualService;
  }
  public function setExpectedOutputUrl($expectedOutputUrl)
  {
    $this->expectedOutputUrl = $expectedOutputUrl;
  }
  public function getExpectedOutputUrl()
  {
    return $this->expectedOutputUrl;
  }
  public function setExpectedRedirectResponseCode($expectedRedirectResponseCode)
  {
    $this->expectedRedirectResponseCode = $expectedRedirectResponseCode;
  }
  public function getExpectedRedirectResponseCode()
  {
    return $this->expectedRedirectResponseCode;
  }
  public function setExpectedService($expectedService)
  {
    $this->expectedService = $expectedService;
  }
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
  public function setHost($host)
  {
    $this->host = $host;
  }
  public function getHost()
  {
    return $this->host;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestFailure::class, 'Google_Service_Compute_TestFailure');
