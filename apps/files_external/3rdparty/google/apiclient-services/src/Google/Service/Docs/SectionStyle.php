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

class Google_Service_Docs_SectionStyle extends Google_Collection
{
  protected $collection_key = 'columnProperties';
  protected $columnPropertiesType = 'Google_Service_Docs_SectionColumnProperties';
  protected $columnPropertiesDataType = 'array';
  public $columnSeparatorStyle;
  public $contentDirection;
  public $defaultFooterId;
  public $defaultHeaderId;
  public $evenPageFooterId;
  public $evenPageHeaderId;
  public $firstPageFooterId;
  public $firstPageHeaderId;
  protected $marginBottomType = 'Google_Service_Docs_Dimension';
  protected $marginBottomDataType = '';
  protected $marginFooterType = 'Google_Service_Docs_Dimension';
  protected $marginFooterDataType = '';
  protected $marginHeaderType = 'Google_Service_Docs_Dimension';
  protected $marginHeaderDataType = '';
  protected $marginLeftType = 'Google_Service_Docs_Dimension';
  protected $marginLeftDataType = '';
  protected $marginRightType = 'Google_Service_Docs_Dimension';
  protected $marginRightDataType = '';
  protected $marginTopType = 'Google_Service_Docs_Dimension';
  protected $marginTopDataType = '';
  public $pageNumberStart;
  public $sectionType;
  public $useFirstPageHeaderFooter;

  /**
   * @param Google_Service_Docs_SectionColumnProperties[]
   */
  public function setColumnProperties($columnProperties)
  {
    $this->columnProperties = $columnProperties;
  }
  /**
   * @return Google_Service_Docs_SectionColumnProperties[]
   */
  public function getColumnProperties()
  {
    return $this->columnProperties;
  }
  public function setColumnSeparatorStyle($columnSeparatorStyle)
  {
    $this->columnSeparatorStyle = $columnSeparatorStyle;
  }
  public function getColumnSeparatorStyle()
  {
    return $this->columnSeparatorStyle;
  }
  public function setContentDirection($contentDirection)
  {
    $this->contentDirection = $contentDirection;
  }
  public function getContentDirection()
  {
    return $this->contentDirection;
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
   * @param Google_Service_Docs_Dimension
   */
  public function setMarginBottom(Google_Service_Docs_Dimension $marginBottom)
  {
    $this->marginBottom = $marginBottom;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getMarginBottom()
  {
    return $this->marginBottom;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setMarginFooter(Google_Service_Docs_Dimension $marginFooter)
  {
    $this->marginFooter = $marginFooter;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getMarginFooter()
  {
    return $this->marginFooter;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setMarginHeader(Google_Service_Docs_Dimension $marginHeader)
  {
    $this->marginHeader = $marginHeader;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getMarginHeader()
  {
    return $this->marginHeader;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setMarginLeft(Google_Service_Docs_Dimension $marginLeft)
  {
    $this->marginLeft = $marginLeft;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getMarginLeft()
  {
    return $this->marginLeft;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setMarginRight(Google_Service_Docs_Dimension $marginRight)
  {
    $this->marginRight = $marginRight;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getMarginRight()
  {
    return $this->marginRight;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setMarginTop(Google_Service_Docs_Dimension $marginTop)
  {
    $this->marginTop = $marginTop;
  }
  /**
   * @return Google_Service_Docs_Dimension
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
  public function setSectionType($sectionType)
  {
    $this->sectionType = $sectionType;
  }
  public function getSectionType()
  {
    return $this->sectionType;
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
