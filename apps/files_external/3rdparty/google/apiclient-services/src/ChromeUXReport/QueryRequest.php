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

namespace Google\Service\ChromeUXReport;

class QueryRequest extends \Google\Collection
{
  protected $collection_key = 'metrics';
  /**
   * @var string
   */
  public $effectiveConnectionType;
  /**
   * @var string
   */
  public $formFactor;
  /**
   * @var string[]
   */
  public $metrics;
  /**
   * @var string
   */
  public $origin;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setEffectiveConnectionType($effectiveConnectionType)
  {
    $this->effectiveConnectionType = $effectiveConnectionType;
  }
  /**
   * @return string
   */
  public function getEffectiveConnectionType()
  {
    return $this->effectiveConnectionType;
  }
  /**
   * @param string
   */
  public function setFormFactor($formFactor)
  {
    $this->formFactor = $formFactor;
  }
  /**
   * @return string
   */
  public function getFormFactor()
  {
    return $this->formFactor;
  }
  /**
   * @param string[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return string[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param string
   */
  public function setOrigin($origin)
  {
    $this->origin = $origin;
  }
  /**
   * @return string
   */
  public function getOrigin()
  {
    return $this->origin;
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
class_alias(QueryRequest::class, 'Google_Service_ChromeUXReport_QueryRequest');
