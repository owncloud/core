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

namespace Google\Service\CloudVideoIntelligence;

class GoogleCloudVideointelligenceV1p3beta1NormalizedBoundingBox extends \Google\Model
{
  /**
   * @var float
   */
  public $bottom;
  /**
   * @var float
   */
  public $left;
  /**
   * @var float
   */
  public $right;
  /**
   * @var float
   */
  public $top;

  /**
   * @param float
   */
  public function setBottom($bottom)
  {
    $this->bottom = $bottom;
  }
  /**
   * @return float
   */
  public function getBottom()
  {
    return $this->bottom;
  }
  /**
   * @param float
   */
  public function setLeft($left)
  {
    $this->left = $left;
  }
  /**
   * @return float
   */
  public function getLeft()
  {
    return $this->left;
  }
  /**
   * @param float
   */
  public function setRight($right)
  {
    $this->right = $right;
  }
  /**
   * @return float
   */
  public function getRight()
  {
    return $this->right;
  }
  /**
   * @param float
   */
  public function setTop($top)
  {
    $this->top = $top;
  }
  /**
   * @return float
   */
  public function getTop()
  {
    return $this->top;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVideointelligenceV1p3beta1NormalizedBoundingBox::class, 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1NormalizedBoundingBox');
