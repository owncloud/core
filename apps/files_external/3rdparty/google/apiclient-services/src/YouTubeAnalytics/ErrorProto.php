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

namespace Google\Service\YouTubeAnalytics;

class ErrorProto extends \Google\Collection
{
  protected $collection_key = 'argument';
  /**
   * @var string[]
   */
  public $argument;
  /**
   * @var string
   */
  public $code;
  /**
   * @var string
   */
  public $debugInfo;
  /**
   * @var string
   */
  public $domain;
  /**
   * @var string
   */
  public $externalErrorMessage;
  /**
   * @var string
   */
  public $location;
  /**
   * @var string
   */
  public $locationType;

  /**
   * @param string[]
   */
  public function setArgument($argument)
  {
    $this->argument = $argument;
  }
  /**
   * @return string[]
   */
  public function getArgument()
  {
    return $this->argument;
  }
  /**
   * @param string
   */
  public function setCode($code)
  {
    $this->code = $code;
  }
  /**
   * @return string
   */
  public function getCode()
  {
    return $this->code;
  }
  /**
   * @param string
   */
  public function setDebugInfo($debugInfo)
  {
    $this->debugInfo = $debugInfo;
  }
  /**
   * @return string
   */
  public function getDebugInfo()
  {
    return $this->debugInfo;
  }
  /**
   * @param string
   */
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return string
   */
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param string
   */
  public function setExternalErrorMessage($externalErrorMessage)
  {
    $this->externalErrorMessage = $externalErrorMessage;
  }
  /**
   * @return string
   */
  public function getExternalErrorMessage()
  {
    return $this->externalErrorMessage;
  }
  /**
   * @param string
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param string
   */
  public function setLocationType($locationType)
  {
    $this->locationType = $locationType;
  }
  /**
   * @return string
   */
  public function getLocationType()
  {
    return $this->locationType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ErrorProto::class, 'Google_Service_YouTubeAnalytics_ErrorProto');
