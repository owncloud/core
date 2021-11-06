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

class Borders extends \Google\Model
{
  protected $bottomType = Border::class;
  protected $bottomDataType = '';
  protected $leftType = Border::class;
  protected $leftDataType = '';
  protected $rightType = Border::class;
  protected $rightDataType = '';
  protected $topType = Border::class;
  protected $topDataType = '';

  /**
   * @param Border
   */
  public function setBottom(Border $bottom)
  {
    $this->bottom = $bottom;
  }
  /**
   * @return Border
   */
  public function getBottom()
  {
    return $this->bottom;
  }
  /**
   * @param Border
   */
  public function setLeft(Border $left)
  {
    $this->left = $left;
  }
  /**
   * @return Border
   */
  public function getLeft()
  {
    return $this->left;
  }
  /**
   * @param Border
   */
  public function setRight(Border $right)
  {
    $this->right = $right;
  }
  /**
   * @return Border
   */
  public function getRight()
  {
    return $this->right;
  }
  /**
   * @param Border
   */
  public function setTop(Border $top)
  {
    $this->top = $top;
  }
  /**
   * @return Border
   */
  public function getTop()
  {
    return $this->top;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Borders::class, 'Google_Service_Sheets_Borders');
