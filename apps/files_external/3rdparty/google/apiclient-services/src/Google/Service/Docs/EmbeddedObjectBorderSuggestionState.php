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

class Google_Service_Docs_EmbeddedObjectBorderSuggestionState extends Google_Model
{
  public $colorSuggested;
  public $dashStyleSuggested;
  public $propertyStateSuggested;
  public $widthSuggested;

  public function setColorSuggested($colorSuggested)
  {
    $this->colorSuggested = $colorSuggested;
  }
  public function getColorSuggested()
  {
    return $this->colorSuggested;
  }
  public function setDashStyleSuggested($dashStyleSuggested)
  {
    $this->dashStyleSuggested = $dashStyleSuggested;
  }
  public function getDashStyleSuggested()
  {
    return $this->dashStyleSuggested;
  }
  public function setPropertyStateSuggested($propertyStateSuggested)
  {
    $this->propertyStateSuggested = $propertyStateSuggested;
  }
  public function getPropertyStateSuggested()
  {
    return $this->propertyStateSuggested;
  }
  public function setWidthSuggested($widthSuggested)
  {
    $this->widthSuggested = $widthSuggested;
  }
  public function getWidthSuggested()
  {
    return $this->widthSuggested;
  }
}
