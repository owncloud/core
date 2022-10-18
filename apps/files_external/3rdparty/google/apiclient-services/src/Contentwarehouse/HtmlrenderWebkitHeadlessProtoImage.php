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

class HtmlrenderWebkitHeadlessProtoImage extends \Google\Model
{
  /**
   * @var string
   */
  public $data;
  /**
   * @var int
   */
  public $height;
  /**
   * @var int
   */
  public $pageNumber;
  protected $viewportType = HtmlrenderWebkitHeadlessProtoBox::class;
  protected $viewportDataType = '';
  /**
   * @var int
   */
  public $width;

  /**
   * @param string
   */
  public function setData($data)
  {
    $this->data = $data;
  }
  /**
   * @return string
   */
  public function getData()
  {
    return $this->data;
  }
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
  public function setPageNumber($pageNumber)
  {
    $this->pageNumber = $pageNumber;
  }
  /**
   * @return int
   */
  public function getPageNumber()
  {
    return $this->pageNumber;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoBox
   */
  public function setViewport(HtmlrenderWebkitHeadlessProtoBox $viewport)
  {
    $this->viewport = $viewport;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoBox
   */
  public function getViewport()
  {
    return $this->viewport;
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
class_alias(HtmlrenderWebkitHeadlessProtoImage::class, 'Google_Service_Contentwarehouse_HtmlrenderWebkitHeadlessProtoImage');
