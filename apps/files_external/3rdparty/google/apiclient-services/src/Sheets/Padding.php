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

namespace Google\Service\Sheets;

class Padding extends \Google\Model
{
  /**
   * @var int
   */
  public $bottom;
  /**
   * @var int
   */
  public $left;
  /**
   * @var int
   */
  public $right;
  /**
   * @var int
   */
  public $top;

  /**
   * @param int
   */
  public function setBottom($bottom)
  {
    $this->bottom = $bottom;
  }
  /**
   * @return int
   */
  public function getBottom()
  {
    return $this->bottom;
  }
  /**
   * @param int
   */
  public function setLeft($left)
  {
    $this->left = $left;
  }
  /**
   * @return int
   */
  public function getLeft()
  {
    return $this->left;
  }
  /**
   * @param int
   */
  public function setRight($right)
  {
    $this->right = $right;
  }
  /**
   * @return int
   */
  public function getRight()
  {
    return $this->right;
  }
  /**
   * @param int
   */
  public function setTop($top)
  {
    $this->top = $top;
  }
  /**
   * @return int
   */
  public function getTop()
  {
    return $this->top;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Padding::class, 'Google_Service_Sheets_Padding');
