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

class PageElementProperties extends \Google\Model
{
  /**
   * @var string
   */
  public $pageObjectId;
  protected $sizeType = Size::class;
  protected $sizeDataType = '';
  protected $transformType = AffineTransform::class;
  protected $transformDataType = '';

  /**
   * @param string
   */
  public function setPageObjectId($pageObjectId)
  {
    $this->pageObjectId = $pageObjectId;
  }
  /**
   * @return string
   */
  public function getPageObjectId()
  {
    return $this->pageObjectId;
  }
  /**
   * @param Size
   */
  public function setSize(Size $size)
  {
    $this->size = $size;
  }
  /**
   * @return Size
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param AffineTransform
   */
  public function setTransform(AffineTransform $transform)
  {
    $this->transform = $transform;
  }
  /**
   * @return AffineTransform
   */
  public function getTransform()
  {
    return $this->transform;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PageElementProperties::class, 'Google_Service_Slides_PageElementProperties');
