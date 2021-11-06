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

class EmbeddedObjectSuggestionState extends \Google\Model
{
  public $descriptionSuggested;
  protected $embeddedDrawingPropertiesSuggestionStateType = EmbeddedDrawingPropertiesSuggestionState::class;
  protected $embeddedDrawingPropertiesSuggestionStateDataType = '';
  protected $embeddedObjectBorderSuggestionStateType = EmbeddedObjectBorderSuggestionState::class;
  protected $embeddedObjectBorderSuggestionStateDataType = '';
  protected $imagePropertiesSuggestionStateType = ImagePropertiesSuggestionState::class;
  protected $imagePropertiesSuggestionStateDataType = '';
  protected $linkedContentReferenceSuggestionStateType = LinkedContentReferenceSuggestionState::class;
  protected $linkedContentReferenceSuggestionStateDataType = '';
  public $marginBottomSuggested;
  public $marginLeftSuggested;
  public $marginRightSuggested;
  public $marginTopSuggested;
  protected $sizeSuggestionStateType = SizeSuggestionState::class;
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
   * @param EmbeddedDrawingPropertiesSuggestionState
   */
  public function setEmbeddedDrawingPropertiesSuggestionState(EmbeddedDrawingPropertiesSuggestionState $embeddedDrawingPropertiesSuggestionState)
  {
    $this->embeddedDrawingPropertiesSuggestionState = $embeddedDrawingPropertiesSuggestionState;
  }
  /**
   * @return EmbeddedDrawingPropertiesSuggestionState
   */
  public function getEmbeddedDrawingPropertiesSuggestionState()
  {
    return $this->embeddedDrawingPropertiesSuggestionState;
  }
  /**
   * @param EmbeddedObjectBorderSuggestionState
   */
  public function setEmbeddedObjectBorderSuggestionState(EmbeddedObjectBorderSuggestionState $embeddedObjectBorderSuggestionState)
  {
    $this->embeddedObjectBorderSuggestionState = $embeddedObjectBorderSuggestionState;
  }
  /**
   * @return EmbeddedObjectBorderSuggestionState
   */
  public function getEmbeddedObjectBorderSuggestionState()
  {
    return $this->embeddedObjectBorderSuggestionState;
  }
  /**
   * @param ImagePropertiesSuggestionState
   */
  public function setImagePropertiesSuggestionState(ImagePropertiesSuggestionState $imagePropertiesSuggestionState)
  {
    $this->imagePropertiesSuggestionState = $imagePropertiesSuggestionState;
  }
  /**
   * @return ImagePropertiesSuggestionState
   */
  public function getImagePropertiesSuggestionState()
  {
    return $this->imagePropertiesSuggestionState;
  }
  /**
   * @param LinkedContentReferenceSuggestionState
   */
  public function setLinkedContentReferenceSuggestionState(LinkedContentReferenceSuggestionState $linkedContentReferenceSuggestionState)
  {
    $this->linkedContentReferenceSuggestionState = $linkedContentReferenceSuggestionState;
  }
  /**
   * @return LinkedContentReferenceSuggestionState
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
   * @param SizeSuggestionState
   */
  public function setSizeSuggestionState(SizeSuggestionState $sizeSuggestionState)
  {
    $this->sizeSuggestionState = $sizeSuggestionState;
  }
  /**
   * @return SizeSuggestionState
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EmbeddedObjectSuggestionState::class, 'Google_Service_Docs_EmbeddedObjectSuggestionState');
