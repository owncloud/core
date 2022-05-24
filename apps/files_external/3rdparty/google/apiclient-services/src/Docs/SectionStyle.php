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

class SectionStyle extends \Google\Collection
{
  protected $collection_key = 'columnProperties';
  protected $columnPropertiesType = SectionColumnProperties::class;
  protected $columnPropertiesDataType = 'array';
  /**
   * @var string
   */
  public $columnSeparatorStyle;
  /**
   * @var string
   */
  public $contentDirection;
  /**
   * @var string
   */
  public $defaultFooterId;
  /**
   * @var string
   */
  public $defaultHeaderId;
  /**
   * @var string
   */
  public $evenPageFooterId;
  /**
   * @var string
   */
  public $evenPageHeaderId;
  /**
   * @var string
   */
  public $firstPageFooterId;
  /**
   * @var string
   */
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
  /**
   * @var int
   */
  public $pageNumberStart;
  /**
   * @var string
   */
  public $sectionType;
  /**
   * @var bool
   */
  public $useFirstPageHeaderFooter;

  /**
   * @param SectionColumnProperties[]
   */
  public function setColumnProperties($columnProperties)
  {
    $this->columnProperties = $columnProperties;
  }
  /**
   * @return SectionColumnProperties[]
   */
  public function getColumnProperties()
  {
    return $this->columnProperties;
  }
  /**
   * @param string
   */
  public function setColumnSeparatorStyle($columnSeparatorStyle)
  {
    $this->columnSeparatorStyle = $columnSeparatorStyle;
  }
  /**
   * @return string
   */
  public function getColumnSeparatorStyle()
  {
    return $this->columnSeparatorStyle;
  }
  /**
   * @param string
   */
  public function setContentDirection($contentDirection)
  {
    $this->contentDirection = $contentDirection;
  }
  /**
   * @return string
   */
  public function getContentDirection()
  {
    return $this->contentDirection;
  }
  /**
   * @param string
   */
  public function setDefaultFooterId($defaultFooterId)
  {
    $this->defaultFooterId = $defaultFooterId;
  }
  /**
   * @return string
   */
  public function getDefaultFooterId()
  {
    return $this->defaultFooterId;
  }
  /**
   * @param string
   */
  public function setDefaultHeaderId($defaultHeaderId)
  {
    $this->defaultHeaderId = $defaultHeaderId;
  }
  /**
   * @return string
   */
  public function getDefaultHeaderId()
  {
    return $this->defaultHeaderId;
  }
  /**
   * @param string
   */
  public function setEvenPageFooterId($evenPageFooterId)
  {
    $this->evenPageFooterId = $evenPageFooterId;
  }
  /**
   * @return string
   */
  public function getEvenPageFooterId()
  {
    return $this->evenPageFooterId;
  }
  /**
   * @param string
   */
  public function setEvenPageHeaderId($evenPageHeaderId)
  {
    $this->evenPageHeaderId = $evenPageHeaderId;
  }
  /**
   * @return string
   */
  public function getEvenPageHeaderId()
  {
    return $this->evenPageHeaderId;
  }
  /**
   * @param string
   */
  public function setFirstPageFooterId($firstPageFooterId)
  {
    $this->firstPageFooterId = $firstPageFooterId;
  }
  /**
   * @return string
   */
  public function getFirstPageFooterId()
  {
    return $this->firstPageFooterId;
  }
  /**
   * @param string
   */
  public function setFirstPageHeaderId($firstPageHeaderId)
  {
    $this->firstPageHeaderId = $firstPageHeaderId;
  }
  /**
   * @return string
   */
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
  /**
   * @param int
   */
  public function setPageNumberStart($pageNumberStart)
  {
    $this->pageNumberStart = $pageNumberStart;
  }
  /**
   * @return int
   */
  public function getPageNumberStart()
  {
    return $this->pageNumberStart;
  }
  /**
   * @param string
   */
  public function setSectionType($sectionType)
  {
    $this->sectionType = $sectionType;
  }
  /**
   * @return string
   */
  public function getSectionType()
  {
    return $this->sectionType;
  }
  /**
   * @param bool
   */
  public function setUseFirstPageHeaderFooter($useFirstPageHeaderFooter)
  {
    $this->useFirstPageHeaderFooter = $useFirstPageHeaderFooter;
  }
  /**
   * @return bool
   */
  public function getUseFirstPageHeaderFooter()
  {
    return $this->useFirstPageHeaderFooter;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SectionStyle::class, 'Google_Service_Docs_SectionStyle');
