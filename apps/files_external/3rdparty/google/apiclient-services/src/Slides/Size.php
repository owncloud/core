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

namespace Google\Service\Slides;

class Size extends \Google\Model
{
  protected $heightType = Dimension::class;
  protected $heightDataType = '';
  protected $widthType = Dimension::class;
  protected $widthDataType = '';

  /**
   * @param Dimension
   */
  public function setHeight(Dimension $height)
  {
    $this->height = $height;
  }
  /**
   * @return Dimension
   */
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param Dimension
   */
  public function setWidth(Dimension $width)
  {
    $this->width = $width;
  }
  /**
   * @return Dimension
   */
  public function getWidth()
  {
    return $this->width;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Size::class, 'Google_Service_Slides_Size');
