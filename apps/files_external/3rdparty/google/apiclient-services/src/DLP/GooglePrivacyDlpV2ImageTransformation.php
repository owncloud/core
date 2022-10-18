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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2ImageTransformation extends \Google\Model
{
  protected $allInfoTypesType = GooglePrivacyDlpV2AllInfoTypes::class;
  protected $allInfoTypesDataType = '';
  protected $allTextType = GooglePrivacyDlpV2AllText::class;
  protected $allTextDataType = '';
  protected $redactionColorType = GooglePrivacyDlpV2Color::class;
  protected $redactionColorDataType = '';
  protected $selectedInfoTypesType = GooglePrivacyDlpV2SelectedInfoTypes::class;
  protected $selectedInfoTypesDataType = '';

  /**
   * @param GooglePrivacyDlpV2AllInfoTypes
   */
  public function setAllInfoTypes(GooglePrivacyDlpV2AllInfoTypes $allInfoTypes)
  {
    $this->allInfoTypes = $allInfoTypes;
  }
  /**
   * @return GooglePrivacyDlpV2AllInfoTypes
   */
  public function getAllInfoTypes()
  {
    return $this->allInfoTypes;
  }
  /**
   * @param GooglePrivacyDlpV2AllText
   */
  public function setAllText(GooglePrivacyDlpV2AllText $allText)
  {
    $this->allText = $allText;
  }
  /**
   * @return GooglePrivacyDlpV2AllText
   */
  public function getAllText()
  {
    return $this->allText;
  }
  /**
   * @param GooglePrivacyDlpV2Color
   */
  public function setRedactionColor(GooglePrivacyDlpV2Color $redactionColor)
  {
    $this->redactionColor = $redactionColor;
  }
  /**
   * @return GooglePrivacyDlpV2Color
   */
  public function getRedactionColor()
  {
    return $this->redactionColor;
  }
  /**
   * @param GooglePrivacyDlpV2SelectedInfoTypes
   */
  public function setSelectedInfoTypes(GooglePrivacyDlpV2SelectedInfoTypes $selectedInfoTypes)
  {
    $this->selectedInfoTypes = $selectedInfoTypes;
  }
  /**
   * @return GooglePrivacyDlpV2SelectedInfoTypes
   */
  public function getSelectedInfoTypes()
  {
    return $this->selectedInfoTypes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2ImageTransformation::class, 'Google_Service_DLP_GooglePrivacyDlpV2ImageTransformation');
