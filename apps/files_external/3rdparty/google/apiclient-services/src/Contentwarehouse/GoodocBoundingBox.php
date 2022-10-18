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

class GoodocBoundingBox extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "height" => "Height",
        "label" => "Label",
        "left" => "Left",
        "top" => "Top",
        "width" => "Width",
  ];
  /**
   * @var int
   */
  public $height;
  /**
   * @var int
   */
  public $label;
  /**
   * @var int
   */
  public $left;
  /**
   * @var int
   */
  public $top;
  /**
   * @var int
   */
  public $width;

  /**
   * @param int
   */
  public function setHeight($height)
  {
    $this->height = $height;
  }
  /**
   * @return int
   */
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param int
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return int
   */
  public function getLabel()
  {
    return $this->label;
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
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return int
   */
  public function getWidth()
  {
    return $this->width;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocBoundingBox::class, 'Google_Service_Contentwarehouse_GoodocBoundingBox');
