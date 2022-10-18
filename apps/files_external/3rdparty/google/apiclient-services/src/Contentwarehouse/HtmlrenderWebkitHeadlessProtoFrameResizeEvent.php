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

class HtmlrenderWebkitHeadlessProtoFrameResizeEvent extends \Google\Model
{
  /**
   * @var string
   */
  public $resizeType;
  protected $visibleRectAfterResizeType = HtmlrenderWebkitHeadlessProtoBox::class;
  protected $visibleRectAfterResizeDataType = '';
  protected $visibleRectBeforeResizeType = HtmlrenderWebkitHeadlessProtoBox::class;
  protected $visibleRectBeforeResizeDataType = '';

  /**
   * @param string
   */
  public function setResizeType($resizeType)
  {
    $this->resizeType = $resizeType;
  }
  /**
   * @return string
   */
  public function getResizeType()
  {
    return $this->resizeType;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoBox
   */
  public function setVisibleRectAfterResize(HtmlrenderWebkitHeadlessProtoBox $visibleRectAfterResize)
  {
    $this->visibleRectAfterResize = $visibleRectAfterResize;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoBox
   */
  public function getVisibleRectAfterResize()
  {
    return $this->visibleRectAfterResize;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoBox
   */
  public function setVisibleRectBeforeResize(HtmlrenderWebkitHeadlessProtoBox $visibleRectBeforeResize)
  {
    $this->visibleRectBeforeResize = $visibleRectBeforeResize;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoBox
   */
  public function getVisibleRectBeforeResize()
  {
    return $this->visibleRectBeforeResize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HtmlrenderWebkitHeadlessProtoFrameResizeEvent::class, 'Google_Service_Contentwarehouse_HtmlrenderWebkitHeadlessProtoFrameResizeEvent');
