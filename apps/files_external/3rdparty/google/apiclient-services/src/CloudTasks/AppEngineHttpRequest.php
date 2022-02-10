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

namespace Google\Service\CloudTasks;

class AppEngineHttpRequest extends \Google\Model
{
  protected $appEngineRoutingType = AppEngineRouting::class;
  protected $appEngineRoutingDataType = '';
  /**
   * @var string
   */
  public $body;
  /**
   * @var string[]
   */
  public $headers;
  /**
   * @var string
   */
  public $httpMethod;
  /**
   * @var string
   */
  public $relativeUri;

  /**
   * @param AppEngineRouting
   */
  public function setAppEngineRouting(AppEngineRouting $appEngineRouting)
  {
    $this->appEngineRouting = $appEngineRouting;
  }
  /**
   * @return AppEngineRouting
   */
  public function getAppEngineRouting()
  {
    return $this->appEngineRouting;
  }
  /**
   * @param string
   */
  public function setBody($body)
  {
    $this->body = $body;
  }
  /**
   * @return string
   */
  public function getBody()
  {
    return $this->body;
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
  public function setHttpMethod($httpMethod)
  {
    $this->httpMethod = $httpMethod;
  }
  /**
   * @return string
   */
  public function getHttpMethod()
  {
    return $this->httpMethod;
  }
  /**
   * @param string
   */
  public function setRelativeUri($relativeUri)
  {
    $this->relativeUri = $relativeUri;
  }
  /**
   * @return string
   */
  public function getRelativeUri()
  {
    return $this->relativeUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppEngineHttpRequest::class, 'Google_Service_CloudTasks_AppEngineHttpRequest');
