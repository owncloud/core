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

class Google_Service_CloudRun_HTTPGetAction extends Google_Collection
{
  protected $collection_key = 'httpHeaders';
  public $host;
  protected $httpHeadersType = 'Google_Service_CloudRun_HTTPHeader';
  protected $httpHeadersDataType = 'array';
  public $path;
  public $scheme;

  public function setHost($host)
  {
    $this->host = $host;
  }
  public function getHost()
  {
    return $this->host;
  }
  /**
   * @param Google_Service_CloudRun_HTTPHeader[]
   */
  public function setHttpHeaders($httpHeaders)
  {
    $this->httpHeaders = $httpHeaders;
  }
  /**
   * @return Google_Service_CloudRun_HTTPHeader[]
   */
  public function getHttpHeaders()
  {
    return $this->httpHeaders;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
  public function setScheme($scheme)
  {
    $this->scheme = $scheme;
  }
  public function getScheme()
  {
    return $this->scheme;
  }
}
