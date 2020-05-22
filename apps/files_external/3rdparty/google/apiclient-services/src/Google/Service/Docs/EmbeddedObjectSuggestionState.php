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

class Google_Service_Docs_EmbeddedObjectSuggestionState extends Google_Model
{
  public $descriptionSuggested;
  protected $embeddedDrawingPropertiesSuggestionStateType = 'Google_Service_Docs_EmbeddedDrawingPropertiesSuggestionState';
  protected $embeddedDrawingPropertiesSuggestionStateDataType = '';
  protected $embeddedObjectBorderSuggestionStateType = 'Google_Service_Docs_EmbeddedObjectBorderSuggestionState';
  protected $embeddedObjectBorderSuggestionStateDataType = '';
  protected $imagePropertiesSuggestionStateType = 'Google_Service_Docs_ImagePropertiesSuggestionState';
  protected $imagePropertiesSuggestionStateDataType = '';
  protected $linkedContentReferenceSuggestionStateType = 'Google_Service_Docs_LinkedContentReferenceSuggestionState';
  protected $linkedContentReferenceSuggestionStateDataType = '';
  public $marginBottomSuggested;
  public $marginLeftSuggested;
  public $marginRightSuggested;
  public $marginTopSuggested;
  protected $sizeSuggestionStateType = 'Google_Service_Docs_SizeSuggestionState';
  protected $sizeSuggestionStateDataType = '';
  public $titleSuggested;

  public function setDescriptionSuggested($descriptionSuggested)
  {
    $this->descriptionSuggested = $descriptionSuggested;
  }
  public function getDescriptionSuggested()
  {
    return $this->descriptionSuggested;
  }
  /**
   * @param Google_Service_Docs_EmbeddedDrawingPropertiesSuggestionState
   */
  public function setEmbeddedDrawingPropertiesSuggestionState(Google_Service_Docs_EmbeddedDrawingPropertiesSuggestionState $embeddedDrawingPropertiesSuggestionState)
  {
    $this->embeddedDrawingPropertiesSuggestionState = $embeddedDrawingPropertiesSuggestionState;
  }
  /**
   * @return Google_Service_Docs_EmbeddedDrawingPropertiesSuggestionState
   */
  public function getEmbeddedDrawingPropertiesSuggestionState()
  {
    return $this->embeddedDrawingPropertiesSuggestionState;
  }
  /**
   * @param Google_Service_Docs_EmbeddedObjectBorderSuggestionState
   */
  public function setEmbeddedObjectBorderSuggestionState(Google_Service_Docs_EmbeddedObjectBorderSuggestionState $embeddedObjectBorderSuggestionState)
  {
    $this->embeddedObjectBorderSuggestionState = $embeddedObjectBorderSuggestionState;
  }
  /**
   * @return Google_Service_Docs_EmbeddedObjectBorderSuggestionState
   */
  public function getEmbeddedObjectBorderSuggestionState()
  {
    return $this->embeddedObjectBorderSuggestionState;
  }
  /**
   * @param Google_Service_Docs_ImagePropertiesSuggestionState
   */
  public function setImagePropertiesSuggestionState(Google_Service_Docs_ImagePropertiesSuggestionState $imagePropertiesSuggestionState)
  {
    $this->imagePropertiesSuggestionState = $imagePropertiesSuggestionState;
  }
  /**
   * @return Google_Service_Docs_ImagePropertiesSuggestionState
   */
  public function getImagePropertiesSuggestionState()
  {
    return $this->imagePropertiesSuggestionState;
  }
  /**
   * @param Google_Service_Docs_LinkedContentReferenceSuggestionState
   */
  public function setLinkedContentReferenceSuggestionState(Google_Service_Docs_LinkedContentReferenceSuggestionState $linkedContentReferenceSuggestionState)
  {
    $this->linkedContentReferenceSuggestionState = $linkedContentReferenceSuggestionState;
  }
  /**
   * @return Google_Service_Docs_LinkedContentReferenceSuggestionState
   */
  public function getLinkedContentReferenceSuggestionState()
  {
    return $this->linkedContentReferenceSuggestionState;
  }
  public function setMarginBottomSuggested($marginBottomSuggested)
  {
    $this->marginBottomSuggested = $marginBottomSuggested;
  }
  public function getMarginBottomSuggested()
  {
    return $this->marginBottomSuggested;
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
  /**
   * @param Google_Service_Docs_SizeSuggestionState
   */
  public function setSizeSuggestionState(Google_Service_Docs_SizeSuggestionState $sizeSuggestionState)
  {
    $this->sizeSuggestionState = $sizeSuggestionState;
  }
  /**
   * @return Google_Service_Docs_SizeSuggestionState
   */
  public function getSizeSuggestionState()
  {
    return $this->sizeSuggestionState;
  }
  public function setTitleSuggested($titleSuggested)
  {
    $this->titleSuggested = $titleSuggested;
  }
  public function getTitleSuggested()
  {
    return $this->titleSuggested;
  }
}
