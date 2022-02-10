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

namespace Google\Service\Dfareporting;

class FsCommand extends \Google\Model
{
  /**
   * @var int
   */
  public $left;
  /**
   * @var string
   */
  public $positionOption;
  /**
   * @var int
   */
  public $top;
  /**
   * @var int
   */
  public $windowHeight;
  /**
   * @var int
   */
  public $windowWidth;

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
   * @param string
   */
  public function setPositionOption($positionOption)
  {
    $this->positionOption = $positionOption;
  }
  /**
   * @return string
   */
  public function getPositionOption()
  {
    return $this->positionOption;
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
  /**
   * @param int
   */
  public function setWindowHeight($windowHeight)
  {
    $this->windowHeight = $windowHeight;
  }
  /**
   * @return int
   */
  public function getWindowHeight()
  {
    return $this->windowHeight;
  }
  /**
   * @param int
   */
  public function setWindowWidth($windowWidth)
  {
    $this->windowWidth = $windowWidth;
  }
  /**
   * @return int
   */
  public function getWindowWidth()
  {
    return $this->windowWidth;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FsCommand::class, 'Google_Service_Dfareporting_FsCommand');
