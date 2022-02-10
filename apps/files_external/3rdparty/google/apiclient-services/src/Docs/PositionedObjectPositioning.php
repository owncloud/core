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

namespace Google\Service\Docs;

class PositionedObjectPositioning extends \Google\Model
{
  /**
   * @var string
   */
  public $layout;
  protected $leftOffsetType = Dimension::class;
  protected $leftOffsetDataType = '';
  protected $topOffsetType = Dimension::class;
  protected $topOffsetDataType = '';

  /**
   * @param string
   */
  public function setLayout($layout)
  {
    $this->layout = $layout;
  }
  /**
   * @return string
   */
  public function getLayout()
  {
    return $this->layout;
  }
  /**
   * @param Dimension
   */
  public function setLeftOffset(Dimension $leftOffset)
  {
    $this->leftOffset = $leftOffset;
  }
  /**
   * @return Dimension
   */
  public function getLeftOffset()
  {
    return $this->leftOffset;
  }
  /**
   * @param Dimension
   */
  public function setTopOffset(Dimension $topOffset)
  {
    $this->topOffset = $topOffset;
  }
  /**
   * @return Dimension
   */
  public function getTopOffset()
  {
    return $this->topOffset;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PositionedObjectPositioning::class, 'Google_Service_Docs_PositionedObjectPositioning');
