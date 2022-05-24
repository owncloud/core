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

class ImagePropertiesSuggestionState extends \Google\Model
{
  /**
   * @var bool
   */
  public $angleSuggested;
  /**
   * @var bool
   */
  public $brightnessSuggested;
  /**
   * @var bool
   */
  public $contentUriSuggested;
  /**
   * @var bool
   */
  public $contrastSuggested;
  protected $cropPropertiesSuggestionStateType = CropPropertiesSuggestionState::class;
  protected $cropPropertiesSuggestionStateDataType = '';
  /**
   * @var bool
   */
  public $sourceUriSuggested;
  /**
   * @var bool
   */
  public $transparencySuggested;

  /**
   * @param bool
   */
  public function setAngleSuggested($angleSuggested)
  {
    $this->angleSuggested = $angleSuggested;
  }
  /**
   * @return bool
   */
  public function getAngleSuggested()
  {
    return $this->angleSuggested;
  }
  /**
   * @param bool
   */
  public function setBrightnessSuggested($brightnessSuggested)
  {
    $this->brightnessSuggested = $brightnessSuggested;
  }
  /**
   * @return bool
   */
  public function getBrightnessSuggested()
  {
    return $this->brightnessSuggested;
  }
  /**
   * @param bool
   */
  public function setContentUriSuggested($contentUriSuggested)
  {
    $this->contentUriSuggested = $contentUriSuggested;
  }
  /**
   * @return bool
   */
  public function getContentUriSuggested()
  {
    return $this->contentUriSuggested;
  }
  /**
   * @param bool
   */
  public function setContrastSuggested($contrastSuggested)
  {
    $this->contrastSuggested = $contrastSuggested;
  }
  /**
   * @return bool
   */
  public function getContrastSuggested()
  {
    return $this->contrastSuggested;
  }
  /**
   * @param CropPropertiesSuggestionState
   */
  public function setCropPropertiesSuggestionState(CropPropertiesSuggestionState $cropPropertiesSuggestionState)
  {
    $this->cropPropertiesSuggestionState = $cropPropertiesSuggestionState;
  }
  /**
   * @return CropPropertiesSuggestionState
   */
  public function getCropPropertiesSuggestionState()
  {
    return $this->cropPropertiesSuggestionState;
  }
  /**
   * @param bool
   */
  public function setSourceUriSuggested($sourceUriSuggested)
  {
    $this->sourceUriSuggested = $sourceUriSuggested;
  }
  /**
   * @return bool
   */
  public function getSourceUriSuggested()
  {
    return $this->sourceUriSuggested;
  }
  /**
   * @param bool
   */
  public function setTransparencySuggested($transparencySuggested)
  {
    $this->transparencySuggested = $transparencySuggested;
  }
  /**
   * @return bool
   */
  public function getTransparencySuggested()
  {
    return $this->transparencySuggested;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImagePropertiesSuggestionState::class, 'Google_Service_Docs_ImagePropertiesSuggestionState');
