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

class Google_Service_Docs_DocumentStyleSuggestionState extends Google_Model
{
  protected $backgroundSuggestionStateType = 'Google_Service_Docs_BackgroundSuggestionState';
  protected $backgroundSuggestionStateDataType = '';
  public $defaultFooterIdSuggested;
  public $defaultHeaderIdSuggested;
  public $evenPageFooterIdSuggested;
  public $evenPageHeaderIdSuggested;
  public $firstPageFooterIdSuggested;
  public $firstPageHeaderIdSuggested;
  public $marginBottomSuggested;
  public $marginFooterSuggested;
  public $marginHeaderSuggested;
  public $marginLeftSuggested;
  public $marginRightSuggested;
  public $marginTopSuggested;
  public $pageNumberStartSuggested;
  protected $pageSizeSuggestionStateType = 'Google_Service_Docs_SizeSuggestionState';
  protected $pageSizeSuggestionStateDataType = '';
  public $useCustomHeaderFooterMarginsSuggested;
  public $useEvenPageHeaderFooterSuggested;
  public $useFirstPageHeaderFooterSuggested;

  /**
   * @param Google_Service_Docs_BackgroundSuggestionState
   */
  public function setBackgroundSuggestionState(Google_Service_Docs_BackgroundSuggestionState $backgroundSuggestionState)
  {
    $this->backgroundSuggestionState = $backgroundSuggestionState;
  }
  /**
   * @return Google_Service_Docs_BackgroundSuggestionState
   */
  public function getBackgroundSuggestionState()
  {
    return $this->backgroundSuggestionState;
  }
  public function setDefaultFooterIdSuggested($defaultFooterIdSuggested)
  {
    $this->defaultFooterIdSuggested = $defaultFooterIdSuggested;
  }
  public function getDefaultFooterIdSuggested()
  {
    return $this->defaultFooterIdSuggested;
  }
  public function setDefaultHeaderIdSuggested($defaultHeaderIdSuggested)
  {
    $this->defaultHeaderIdSuggested = $defaultHeaderIdSuggested;
  }
  public function getDefaultHeaderIdSuggested()
  {
    return $this->defaultHeaderIdSuggested;
  }
  public function setEvenPageFooterIdSuggested($evenPageFooterIdSuggested)
  {
    $this->evenPageFooterIdSuggested = $evenPageFooterIdSuggested;
  }
  public function getEvenPageFooterIdSuggested()
  {
    return $this->evenPageFooterIdSuggested;
  }
  public function setEvenPageHeaderIdSuggested($evenPageHeaderIdSuggested)
  {
    $this->evenPageHeaderIdSuggested = $evenPageHeaderIdSuggested;
  }
  public function getEvenPageHeaderIdSuggested()
  {
    return $this->evenPageHeaderIdSuggested;
  }
  public function setFirstPageFooterIdSuggested($firstPageFooterIdSuggested)
  {
    $this->firstPageFooterIdSuggested = $firstPageFooterIdSuggested;
  }
  public function getFirstPageFooterIdSuggested()
  {
    return $this->firstPageFooterIdSuggested;
  }
  public function setFirstPageHeaderIdSuggested($firstPageHeaderIdSuggested)
  {
    $this->firstPageHeaderIdSuggested = $firstPageHeaderIdSuggested;
  }
  public function getFirstPageHeaderIdSuggested()
  {
    return $this->firstPageHeaderIdSuggested;
  }
  public function setMarginBottomSuggested($marginBottomSuggested)
  {
    $this->marginBottomSuggested = $marginBottomSuggested;
  }
  public function getMarginBottomSuggested()
  {
    return $this->marginBottomSuggested;
  }
  public function setMarginFooterSuggested($marginFooterSuggested)
  {
    $this->marginFooterSuggested = $marginFooterSuggested;
  }
  public function getMarginFooterSuggested()
  {
    return $this->marginFooterSuggested;
  }
  public function setMarginHeaderSuggested($marginHeaderSuggested)
  {
    $this->marginHeaderSuggested = $marginHeaderSuggested;
  }
  public function getMarginHeaderSuggested()
  {
    return $this->marginHeaderSuggested;
  }
  public function setMarginLeftSuggested($marginLeftSuggested)
  {
    $this->marginLeftSuggested = $marginLeftSuggested;
  }
  public function getMarginLeftSuggested()
  {
    return $this->marginLeftSuggested;
  }
  public function setMarginRightSuggested($marginRightSuggested)
  {
    $this->marginRightSuggested = $marginRightSuggested;
  }
  public function getMarginRightSuggested()
  {
    return $this->marginRightSuggested;
  }
  public function setMarginTopSuggested($marginTopSuggested)
  {
    $this->marginTopSuggested = $marginTopSuggested;
  }
  public function getMarginTopSuggested()
  {
    return $this->marginTopSuggested;
  }
  public function setPageNumberStartSuggested($pageNumberStartSuggested)
  {
    $this->pageNumberStartSuggested = $pageNumberStartSuggested;
  }
  public function getPageNumberStartSuggested()
  {
    return $this->pageNumberStartSuggested;
  }
  /**
   * @param Google_Service_Docs_SizeSuggestionState
   */
  public function setPageSizeSuggestionState(Google_Service_Docs_SizeSuggestionState $pageSizeSuggestionState)
  {
    $this->pageSizeSuggestionState = $pageSizeSuggestionState;
  }
  /**
   * @return Google_Service_Docs_SizeSuggestionState
   */
  public function getPageSizeSuggestionState()
  {
    return $this->pageSizeSuggestionState;
  }
  public function setUseCustomHeaderFooterMarginsSuggested($useCustomHeaderFooterMarginsSuggested)
  {
    $this->useCustomHeaderFooterMarginsSuggested = $useCustomHeaderFooterMarginsSuggested;
  }
  public function getUseCustomHeaderFooterMarginsSuggested()
  {
    return $this->useCustomHeaderFooterMarginsSuggested;
  }
  public function setUseEvenPageHeaderFooterSuggested($useEvenPageHeaderFooterSuggested)
  {
    $this->useEvenPageHeaderFooterSuggested = $useEvenPageHeaderFooterSuggested;
  }
  public function getUseEvenPageHeaderFooterSuggested()
  {
    return $this->useEvenPageHeaderFooterSuggested;
  }
  public function setUseFirstPageHeaderFooterSuggested($useFirstPageHeaderFooterSuggested)
  {
    $this->useFirstPageHeaderFooterSuggested = $useFirstPageHeaderFooterSuggested;
  }
  public function getUseFirstPageHeaderFooterSuggested()
  {
    return $this->useFirstPageHeaderFooterSuggested;
  }
}
