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

namespace Google\Service\ServiceControl;

class Request extends \Google\Model
{
  protected $authType = Auth::class;
  protected $authDataType = '';
  /**
   * @var string[]
   */
  public $headers;
  /**
   * @var string
   */
  public $host;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $method;
  /**
   * @var string
   */
  public $path;
  /**
   * @var string
   */
  public $protocol;
  /**
   * @var string
   */
  public $query;
  /**
   * @var string
   */
  public $reason;
  /**
   * @var string
   */
  public $scheme;
  /**
   * @var string
   */
  public $size;
  /**
   * @var string
   */
  public $time;

  /**
   * @param Auth
   */
  public function setAuth(Auth $auth)
  {
    $this->auth = $auth;
  }
  /**
   * @return Auth
   */
  public function getAuth()
  {
    return $this->auth;
  }
  /**
   * @param string[]
   */
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  /**
   * @return string[]
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
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setMethod($method)
  {
    $this->method = $method;
  }
  /**
   * @return string
   */
  public function getMethod()
  {
    return $this->method;
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
  /**
   * @param string
   */
  public function setProtocol($protocol)
  {
    $this->protocol = $protocol;
  }
  /**
   * @return string
   */
  public function getProtocol()
  {
    return $this->protocol;
  }
  /**
   * @param string
   */
  public function setQuery($query)
  {
    $this->query = $query;
  }
  /**
   * @return string
   */
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param string
   */
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  /**
   * @return string
   */
  public function getReason()
  {
    return $this->reason;
  }
  /**
   * @param string
   */
  public function setScheme($scheme)
  {
    $this->scheme = $scheme;
  }
  /**
   * @return string
   */
  public function getScheme()
  {
    return $this->scheme;
  }
  /**
   * @param string
   */
  public function setSize($size)
  {
    $this->size = $size;
  }
  /**
   * @return string
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param string
   */
  public function setTime($time)
  {
    $this->time = $time;
  }
  /**
   * @return string
   */
  public function getTime()
  {
    return $this->time;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Request::class, 'Google_Service_ServiceControl_Request');
