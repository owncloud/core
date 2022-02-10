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

namespace Google\Service\ServiceUsage;

class Method extends \Google\Collection
{
  protected $collection_key = 'options';
  /**
   * @var string
   */
  public $name;
  protected $optionsType = Option::class;
  protected $optionsDataType = 'array';
  /**
   * @var bool
   */
  public $requestStreaming;
  /**
   * @var string
   */
  public $requestTypeUrl;
  /**
   * @var bool
   */
  public $responseStreaming;
  /**
   * @var string
   */
  public $responseTypeUrl;
  /**
   * @var string
   */
  public $syntax;

  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Option[]
   */
  public function setOptions($options)
  {
    $this->options = $options;
  }
  /**
   * @return Option[]
   */
  public function getOptions()
  {
    return $this->options;
  }
  /**
   * @param bool
   */
  public function setRequestStreaming($requestStreaming)
  {
    $this->requestStreaming = $requestStreaming;
  }
  /**
   * @return bool
   */
  public function getRequestStreaming()
  {
    return $this->requestStreaming;
  }
  /**
   * @param string
   */
  public function setRequestTypeUrl($requestTypeUrl)
  {
    $this->requestTypeUrl = $requestTypeUrl;
  }
  /**
   * @return string
   */
  public function getRequestTypeUrl()
  {
    return $this->requestTypeUrl;
  }
  /**
   * @param bool
   */
  public function setResponseStreaming($responseStreaming)
  {
    $this->responseStreaming = $responseStreaming;
  }
  /**
   * @return bool
   */
  public function getResponseStreaming()
  {
    return $this->responseStreaming;
  }
  /**
   * @param string
   */
  public function setResponseTypeUrl($responseTypeUrl)
  {
    $this->responseTypeUrl = $responseTypeUrl;
  }
  /**
   * @return string
   */
  public function getResponseTypeUrl()
  {
    return $this->responseTypeUrl;
  }
  /**
   * @param string
   */
  public function setSyntax($syntax)
  {
    $this->syntax = $syntax;
  }
  /**
   * @return string
   */
  public function getSyntax()
  {
    return $this->syntax;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Method::class, 'Google_Service_ServiceUsage_Method');
