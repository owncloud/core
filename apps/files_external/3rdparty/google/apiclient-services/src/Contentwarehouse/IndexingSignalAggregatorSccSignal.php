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

class IndexingSignalAggregatorSccSignal extends \Google\Collection
{
  protected $collection_key = 'debugInfo';
  public $clicksBad;
  public $clicksImage;
  public $clicksTotal;
  /**
   * @var string[]
   */
  public $debugInfo;
  public $numImageUrls;
  /**
   * @var string
   */
  public $numUrls;
  /**
   * @var string
   */
  public $pattern;

  public function setClicksBad($clicksBad)
  {
    $this->clicksBad = $clicksBad;
  }
  public function getClicksBad()
  {
    return $this->clicksBad;
  }
  public function setClicksImage($clicksImage)
  {
    $this->clicksImage = $clicksImage;
  }
  public function getClicksImage()
  {
    return $this->clicksImage;
  }
  public function setClicksTotal($clicksTotal)
  {
    $this->clicksTotal = $clicksTotal;
  }
  public function getClicksTotal()
  {
    return $this->clicksTotal;
  }
  /**
   * @param string[]
   */
  public function setDebugInfo($debugInfo)
  {
    $this->debugInfo = $debugInfo;
  }
  /**
   * @return string[]
   */
  public function getDebugInfo()
  {
    return $this->debugInfo;
  }
  public function setNumImageUrls($numImageUrls)
  {
    $this->numImageUrls = $numImageUrls;
  }
  public function getNumImageUrls()
  {
    return $this->numImageUrls;
  }
  /**
   * @param string
   */
  public function setNumUrls($numUrls)
  {
    $this->numUrls = $numUrls;
  }
  /**
   * @return string
   */
  public function getNumUrls()
  {
    return $this->numUrls;
  }
  /**
   * @param string
   */
  public function setPattern($pattern)
  {
    $this->pattern = $pattern;
  }
  /**
   * @return string
   */
  public function getPattern()
  {
    return $this->pattern;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingSignalAggregatorSccSignal::class, 'Google_Service_Contentwarehouse_IndexingSignalAggregatorSccSignal');
