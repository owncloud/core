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

class DocumentStyleSuggestionState extends \Google\Model
{
  protected $backgroundSuggestionStateType = BackgroundSuggestionState::class;
  protected $backgroundSuggestionStateDataType = '';
  /**
   * @var bool
   */
  public $defaultFooterIdSuggested;
  /**
   * @var bool
   */
  public $defaultHeaderIdSuggested;
  /**
   * @var bool
   */
  public $evenPageFooterIdSuggested;
  /**
   * @var bool
   */
  public $evenPageHeaderIdSuggested;
  /**
   * @var bool
   */
  public $firstPageFooterIdSuggested;
  /**
   * @var bool
   */
  public $firstPageHeaderIdSuggested;
  /**
   * @var bool
   */
  public $marginBottomSuggested;
  /**
   * @var bool
   */
  public $marginFooterSuggested;
  /**
   * @var bool
   */
  public $marginHeaderSuggested;
  /**
   * @var bool
   */
  public $marginLeftSuggested;
  /**
   * @var bool
   */
  public $marginRightSuggested;
  /**
   * @var bool
   */
  public $marginTopSuggested;
  /**
   * @var bool
   */
  public $pageNumberStartSuggested;
  protected $pageSizeSuggestionStateType = SizeSuggestionState::class;
  protected $pageSizeSuggestionStateDataType = '';
  /**
   * @var bool
   */
  public $useCustomHeaderFooterMarginsSuggested;
  /**
   * @var bool
   */
  public $useEvenPageHeaderFooterSuggested;
  /**
   * @var bool
   */
  public $useFirstPageHeaderFooterSuggested;

  /**
   * @param BackgroundSuggestionState
   */
  public function setBackgroundSuggestionState(BackgroundSuggestionState $backgroundSuggestionState)
  {
    $this->backgroundSuggestionState = $backgroundSuggestionState;
  }
  /**
   * @return BackgroundSuggestionState
   */
  public function getBackgroundSuggestionState()
  {
    return $this->backgroundSuggestionState;
  }
  /**
   * @param bool
   */
  public function setDefaultFooterIdSuggested($defaultFooterIdSuggested)
  {
    $this->defaultFooterIdSuggested = $defaultFooterIdSuggested;
  }
  /**
   * @return bool
   */
  public function getDefaultFooterIdSuggested()
  {
    return $this->defaultFooterIdSuggested;
  }
  /**
   * @param bool
   */
  public function setDefaultHeaderIdSuggested($defaultHeaderIdSuggested)
  {
    $this->defaultHeaderIdSuggested = $defaultHeaderIdSuggested;
  }
  /**
   * @return bool
   */
  public function getDefaultHeaderIdSuggested()
  {
    return $this->defaultHeaderIdSuggested;
  }
  /**
   * @param bool
   */
  public function setEvenPageFooterIdSuggested($evenPageFooterIdSuggested)
  {
    $this->evenPageFooterIdSuggested = $evenPageFooterIdSuggested;
  }
  /**
   * @return bool
   */
  public function getEvenPageFooterIdSuggested()
  {
    return $this->evenPageFooterIdSuggested;
  }
  /**
   * @param bool
   */
  public function setEvenPageHeaderIdSuggested($evenPageHeaderIdSuggested)
  {
    $this->evenPageHeaderIdSuggested = $evenPageHeaderIdSuggested;
  }
  /**
   * @return bool
   */
  public function getEvenPageHeaderIdSuggested()
  {
    return $this->evenPageHeaderIdSuggested;
  }
  /**
   * @param bool
   */
  public function setFirstPageFooterIdSuggested($firstPageFooterIdSuggested)
  {
    $this->firstPageFooterIdSuggested = $firstPageFooterIdSuggested;
  }
  /**
   * @return bool
   */
  public function getFirstPageFooterIdSuggested()
  {
    return $this->firstPageFooterIdSuggested;
  }
  /**
   * @param bool
   */
  public function setFirstPageHeaderIdSuggested($firstPageHeaderIdSuggested)
  {
    $this->firstPageHeaderIdSuggested = $firstPageHeaderIdSuggested;
  }
  /**
   * @return bool
   */
  public function getFirstPageHeaderIdSuggested()
  {
    return $this->firstPageHeaderIdSuggested;
  }
  /**
   * @param bool
   */
  public function setMarginBottomSuggested($marginBottomSuggested)
  {
    $this->marginBottomSuggested = $marginBottomSuggested;
  }
  /**
   * @return bool
   */
  public function getMarginBottomSuggested()
  {
    return $this->marginBottomSuggested;
  }
  /**
   * @param bool
   */
  public function setMarginFooterSuggested($marginFooterSuggested)
  {
    $this->marginFooterSuggested = $marginFooterSuggested;
  }
  /**
   * @return bool
   */
  public function getMarginFooterSuggested()
  {
    return $this->marginFooterSuggested;
  }
  /**
   * @param bool
   */
  public function setMarginHeaderSuggested($marginHeaderSuggested)
  {
    $this->marginHeaderSuggested = $marginHeaderSuggested;
  }
  /**
   * @return bool
   */
  public function getMarginHeaderSuggested()
  {
    return $this->marginHeaderSuggested;
  }
  /**
   * @param bool
   */
  public function setMarginLeftSuggested($marginLeftSuggested)
  {
    $this->marginLeftSuggested = $marginLeftSuggested;
  }
  /**
   * @return bool
   */
  public function getMarginLeftSuggested()
  {
    return $this->marginLeftSuggested;
  }
  /**
   * @param bool
   */
  public function setMarginRightSuggested($marginRightSuggested)
  {
    $this->marginRightSuggested = $marginRightSuggested;
  }
  /**
   * @return bool
   */
  public function getMarginRightSuggested()
  {
    return $this->marginRightSuggested;
  }
  /**
   * @param bool
   */
  public function setMarginTopSuggested($marginTopSuggested)
  {
    $this->marginTopSuggested = $marginTopSuggested;
  }
  /**
   * @return bool
   */
  public function getMarginTopSuggested()
  {
    return $this->marginTopSuggested;
  }
  /**
   * @param bool
   */
  public function setPageNumberStartSuggested($pageNumberStartSuggested)
  {
    $this->pageNumberStartSuggested = $pageNumberStartSuggested;
  }
  /**
   * @return bool
   */
  public function getPageNumberStartSuggested()
  {
    return $this->pageNumberStartSuggested;
  }
  /**
   * @param SizeSuggestionState
   */
  public function setPageSizeSuggestionState(SizeSuggestionState $pageSizeSuggestionState)
  {
    $this->pageSizeSuggestionState = $pageSizeSuggestionState;
  }
  /**
   * @return SizeSuggestionState
   */
  public function getPageSizeSuggestionState()
  {
    return $this->pageSizeSuggestionState;
  }
  /**
   * @param bool
   */
  public function setUseCustomHeaderFooterMarginsSuggested($useCustomHeaderFooterMarginsSuggested)
  {
    $this->useCustomHeaderFooterMarginsSuggested = $useCustomHeaderFooterMarginsSuggested;
  }
  /**
   * @return bool
   */
  public function getUseCustomHeaderFooterMarginsSuggested()
  {
    return $this->useCustomHeaderFooterMarginsSuggested;
  }
  /**
   * @param bool
   */
  public function setUseEvenPageHeaderFooterSuggested($useEvenPageHeaderFooterSuggested)
  {
    $this->useEvenPageHeaderFooterSuggested = $useEvenPageHeaderFooterSuggested;
  }
  /**
   * @return bool
   */
  public function getUseEvenPageHeaderFooterSuggested()
  {
    return $this->useEvenPageHeaderFooterSuggested;
  }
  /**
   * @param bool
   */
  public function setUseFirstPageHeaderFooterSuggested($useFirstPageHeaderFooterSuggested)
  {
    $this->useFirstPageHeaderFooterSuggested = $useFirstPageHeaderFooterSuggested;
  }
  /**
   * @return bool
   */
  public function getUseFirstPageHeaderFooterSuggested()
  {
    return $this->useFirstPageHeaderFooterSuggested;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DocumentStyleSuggestionState::class, 'Google_Service_Docs_DocumentStyleSuggestionState');
