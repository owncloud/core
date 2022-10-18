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

class VideoContentSearchVisualFeatures extends \Google\Collection
{
  protected $collection_key = 'tokens';
  /**
   * @var float[]
   */
  public $features;
  /**
   * @var string
   */
  public $starbustVersion;
  /**
   * @var int[]
   */
  public $tokens;

  /**
   * @param float[]
   */
  public function setFeatures($features)
  {
    $this->features = $features;
  }
  /**
   * @return float[]
   */
  public function getFeatures()
  {
    return $this->features;
  }
  /**
   * @param string
   */
  public function setStarbustVersion($starbustVersion)
  {
    $this->starbustVersion = $starbustVersion;
  }
  /**
   * @return string
   */
  public function getStarbustVersion()
  {
    return $this->starbustVersion;
  }
  /**
   * @param int[]
   */
  public function setTokens($tokens)
  {
    $this->tokens = $tokens;
  }
  /**
   * @return int[]
   */
  public function getTokens()
  {
    return $this->tokens;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchVisualFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchVisualFeatures');
