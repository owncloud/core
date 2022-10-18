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

namespace Google\Service\Contentwarehouse;

class GoodocLabel extends \Google\Collection
{
  protected $collection_key = 'LanguageLabel';
  protected $internal_gapi_mappings = [
        "anchorLabel" => "AnchorLabel",
        "breakLabel" => "BreakLabel",
        "charLabel" => "CharLabel",
        "languageLabel" => "LanguageLabel",
        "semanticLabel" => "SemanticLabel",
  ];
  protected $anchorLabelType = GoodocAnchorLabel::class;
  protected $anchorLabelDataType = 'array';
  protected $breakLabelType = GoodocBreakLabel::class;
  protected $breakLabelDataType = '';
  protected $charLabelType = GoodocCharLabel::class;
  protected $charLabelDataType = '';
  protected $languageLabelType = GoodocLanguageLabel::class;
  protected $languageLabelDataType = 'array';
  protected $semanticLabelType = GoodocSemanticLabel::class;
  protected $semanticLabelDataType = '';

  /**
   * @param GoodocAnchorLabel[]
   */
  public function setAnchorLabel($anchorLabel)
  {
    $this->anchorLabel = $anchorLabel;
  }
  /**
   * @return GoodocAnchorLabel[]
   */
  public function getAnchorLabel()
  {
    return $this->anchorLabel;
  }
  /**
   * @param GoodocBreakLabel
   */
  public function setBreakLabel(GoodocBreakLabel $breakLabel)
  {
    $this->breakLabel = $breakLabel;
  }
  /**
   * @return GoodocBreakLabel
   */
  public function getBreakLabel()
  {
    return $this->breakLabel;
  }
  /**
   * @param GoodocCharLabel
   */
  public function setCharLabel(GoodocCharLabel $charLabel)
  {
    $this->charLabel = $charLabel;
  }
  /**
   * @return GoodocCharLabel
   */
  public function getCharLabel()
  {
    return $this->charLabel;
  }
  /**
   * @param GoodocLanguageLabel[]
   */
  public function setLanguageLabel($languageLabel)
  {
    $this->languageLabel = $languageLabel;
  }
  /**
   * @return GoodocLanguageLabel[]
   */
  public function getLanguageLabel()
  {
    return $this->languageLabel;
  }
  /**
   * @param GoodocSemanticLabel
   */
  public function setSemanticLabel(GoodocSemanticLabel $semanticLabel)
  {
    $this->semanticLabel = $semanticLabel;
  }
  /**
   * @return GoodocSemanticLabel
   */
  public function getSemanticLabel()
  {
    return $this->semanticLabel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocLabel::class, 'Google_Service_Contentwarehouse_GoodocLabel');
