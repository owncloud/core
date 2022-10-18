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

class HtmlrenderWebkitHeadlessProtoRectangle extends \Google\Model
{
  protected $bottomType = HtmlrenderWebkitHeadlessProtoOffset::class;
  protected $bottomDataType = '';
  protected $leftType = HtmlrenderWebkitHeadlessProtoOffset::class;
  protected $leftDataType = '';
  protected $rightType = HtmlrenderWebkitHeadlessProtoOffset::class;
  protected $rightDataType = '';
  protected $topType = HtmlrenderWebkitHeadlessProtoOffset::class;
  protected $topDataType = '';

  /**
   * @param HtmlrenderWebkitHeadlessProtoOffset
   */
  public function setBottom(HtmlrenderWebkitHeadlessProtoOffset $bottom)
  {
    $this->bottom = $bottom;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoOffset
   */
  public function getBottom()
  {
    return $this->bottom;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoOffset
   */
  public function setLeft(HtmlrenderWebkitHeadlessProtoOffset $left)
  {
    $this->left = $left;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoOffset
   */
  public function getLeft()
  {
    return $this->left;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoOffset
   */
  public function setRight(HtmlrenderWebkitHeadlessProtoOffset $right)
  {
    $this->right = $right;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoOffset
   */
  public function getRight()
  {
    return $this->right;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoOffset
   */
  public function setTop(HtmlrenderWebkitHeadlessProtoOffset $top)
  {
    $this->top = $top;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoOffset
   */
  public function getTop()
  {
    return $this->top;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HtmlrenderWebkitHeadlessProtoRectangle::class, 'Google_Service_Contentwarehouse_HtmlrenderWebkitHeadlessProtoRectangle');
