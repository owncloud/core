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

class DocumentStyle extends \Google\Model
{
  protected $backgroundType = Background::class;
  protected $backgroundDataType = '';
  public $defaultFooterId;
  public $defaultHeaderId;
  public $evenPageFooterId;
  public $evenPageHeaderId;
  public $firstPageFooterId;
  public $firstPageHeaderId;
  protected $marginBottomType = Dimension::class;
  protected $marginBottomDataType = '';
  protected $marginFooterType = Dimension::class;
  protected $marginFooterDataType = '';
  protected $marginHeaderType = Dimension::class;
  protected $marginHeaderDataType = '';
  protected $marginLeftType = Dimension::class;
  protected $marginLeftDataType = '';
  protected $marginRightType = Dimension::class;
  protected $marginRightDataType = '';
  protected $marginTopType = Dimension::class;
  protected $marginTopDataType = '';
  public $pageNumberStart;
  protected $pageSizeType = Size::class;
  protected $pageSizeDataType = '';
  public $useCustomHeaderFooterMargins;
  public $useEvenPageHeaderFooter;
  public $useFirstPageHeaderFooter;

  /**
   * @param Background
   */
  public function setBackground(Background $background)
  {
    $this->background = $background;
  }
  /**
   * @return Background
   */
  public function getBackground()
  {
    return $this->background;
  }
  public function setDefaultFooterId($defaultFooterId)
  {
    $this->defaultFooterId = $defaultFooterId;
  }
  public function getDefaultFooterId()
  {
    return $this->defaultFooterId;
  }
  public function setDefaultHeaderId($defaultHeaderId)
  {
    $this->defaultHeaderId = $defaultHeaderId;
  }
  public function getDefaultHeaderId()
  {
    return $this->defaultHeaderId;
  }
  public function setEvenPageFooterId($evenPageFooterId)
  {
    $this->evenPageFooterId = $evenPageFooterId;
  }
  public function getEvenPageFooterId()
  {
    return $this->evenPageFooterId;
  }
  public function setEvenPageHeaderId($evenPageHeaderId)
  {
    $this->evenPageHeaderId = $evenPageHeaderId;
  }
  public function getEvenPageHeaderId()
  {
    return $this->evenPageHeaderId;
  }
  public function setFirstPageFooterId($firstPageFooterId)
  {
    $this->firstPageFooterId = $firstPageFooterId;
  }
  public function getFirstPageFooterId()
  {
    return $this->firstPageFooterId;
  }
  public function setFirstPageHeaderId($firstPageHeaderId)
  {
    $this->firstPageHeaderId = $firstPageHeaderId;
  }
  public function getFirstPageHeaderId()
  {
    return $this->firstPageHeaderId;
  }
  /**
   * @param Dimension
   */
  public function setMarginBottom(Dimension $marginBottom)
  {
    $this->marginBottom = $marginBottom;
  }
  /**
   * @return Dimension
   */
  public function getMarginBottom()
  {
    return $this->marginBottom;
  }
  /**
   * @param Dimension
   */
  public function setMarginFooter(Dimension $marginFooter)
  {
    $this->marginFooter = $marginFooter;
  }
  /**
   * @return Dimension
   */
  public function getMarginFooter()
  {
    return $this->marginFooter;
  }
  /**
   * @param Dimension
   */
  public function setMarginHeader(Dimension $marginHeader)
  {
    $this->marginHeader = $marginHeader;
  }
  /**
   * @return Dimension
   */
  public function getMarginHeader()
  {
    return $this->marginHeader;
  }
  /**
   * @param Dimension
   */
  public function setMarginLeft(Dimension $marginLeft)
  {
    $this->marginLeft = $marginLeft;
  }
  /**
   * @return Dimension
   */
  public function getMarginLeft()
  {
    return $this->marginLeft;
  }
  /**
   * @param Dimension
   */
  public function setMarginRight(Dimension $marginRight)
  {
    $this->marginRight = $marginRight;
  }
  /**
   * @return Dimension
   */
  public function getMarginRight()
  {
    return $this->marginRight;
  }
  /**
   * @param Dimension
   */
  public function setMarginTop(Dimension $marginTop)
  {
    $this->marginTop = $marginTop;
  }
  /**
   * @return Dimension
   */
  public function getMarginTop()
  {
    return $this->marginTop;
  }
  public function setPageNumberStart($pageNumberStart)
  {
    $this->pageNumberStart = $pageNumberStart;
  }
  public function getPageNumberStart()
  {
    return $this->pageNumberStart;
  }
  /**
   * @param Size
   */
  public function setPageSize(Size $pageSize)
  {
    $this->pageSize = $pageSize;
  }
  /**
   * @return Size
   */
  public function getPageSize()
  {
    return $this->pageSize;
  }
  public function setUseCustomHeaderFooterMargins($useCustomHeaderFooterMargins)
  {
    $this->useCustomHeaderFooterMargins = $useCustomHeaderFooterMargins;
  }
  public function getUseCustomHeaderFooterMargins()
  {
    return $this->useCustomHeaderFooterMargins;
  }
  public function setUseEvenPageHeaderFooter($useEvenPageHeaderFooter)
  {
    $this->useEvenPageHeaderFooter = $useEvenPageHeaderFooter;
  }
  public function getUseEvenPageHeaderFooter()
  {
    return $this->useEvenPageHeaderFooter;
  }
  public function setUseFirstPageHeaderFooter($useFirstPageHeaderFooter)
  {
    $this->useFirstPageHeaderFooter = $useFirstPageHeaderFooter;
  }
  public function getUseFirstPageHeaderFooter()
  {
    return $this->useFirstPageHeaderFooter;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DocumentStyle::class, 'Google_Service_Docs_DocumentStyle');
