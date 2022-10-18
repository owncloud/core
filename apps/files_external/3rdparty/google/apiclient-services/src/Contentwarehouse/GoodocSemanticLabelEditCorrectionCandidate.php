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

class GoodocSemanticLabelEditCorrectionCandidate extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "editedWord" => "EditedWord",
        "probability" => "Probability",
  ];
  /**
   * @var string
   */
  public $editedWord;
  public $probability;

  /**
   * @param string
   */
  public function setEditedWord($editedWord)
  {
    $this->editedWord = $editedWord;
  }
  /**
   * @return string
   */
  public function getEditedWord()
  {
    return $this->editedWord;
  }
  public function setProbability($probability)
  {
    $this->probability = $probability;
  }
  public function getProbability()
  {
    return $this->probability;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocSemanticLabelEditCorrectionCandidate::class, 'Google_Service_Contentwarehouse_GoodocSemanticLabelEditCorrectionCandidate');
