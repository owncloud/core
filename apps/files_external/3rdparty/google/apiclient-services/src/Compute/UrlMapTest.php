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

class UrlMapTest extends \Google\Collection
{
  protected $collection_key = 'headers';
  public $description;
  public $expectedOutputUrl;
  public $expectedRedirectResponseCode;
  protected $headersType = UrlMapTestHeader::class;
  protected $headersDataType = 'array';
  public $host;
  public $path;
  public $service;

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
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
  public function setService($service)
  {
    $this->service = $service;
  }
  public function getService()
  {
    return $this->service;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UrlMapTest::class, 'Google_Service_Compute_UrlMapTest');
