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

class ColumnBreak extends \Google\Collection
{
  protected $collection_key = 'suggestedInsertionIds';
  /**
   * @var string[]
   */
  public $suggestedDeletionIds;
  /**
   * @var string[]
   */
  public $suggestedInsertionIds;
  protected $suggestedTextStyleChangesType = SuggestedTextStyle::class;
  protected $suggestedTextStyleChangesDataType = 'map';
  protected $textStyleType = TextStyle::class;
  protected $textStyleDataType = '';

  /**
   * @param string[]
   */
  public function setSuggestedDeletionIds($suggestedDeletionIds)
  {
    $this->suggestedDeletionIds = $suggestedDeletionIds;
  }
  /**
   * @return string[]
   */
  public function getSuggestedDeletionIds()
  {
    return $this->suggestedDeletionIds;
  }
  /**
   * @param string[]
   */
  public function setSuggestedInsertionIds($suggestedInsertionIds)
  {
    $this->suggestedInsertionIds = $suggestedInsertionIds;
  }
  /**
   * @return string[]
   */
  public function getSuggestedInsertionIds()
  {
    return $this->suggestedInsertionIds;
  }
  /**
   * @param SuggestedTextStyle[]
   */
  public function setSuggestedTextStyleChanges($suggestedTextStyleChanges)
  {
    $this->suggestedTextStyleChanges = $suggestedTextStyleChanges;
  }
  /**
   * @return SuggestedTextStyle[]
   */
  public function getSuggestedTextStyleChanges()
  {
    return $this->suggestedTextStyleChanges;
  }
  /**
   * @param TextStyle
   */
  public function setTextStyle(TextStyle $textStyle)
  {
    $this->textStyle = $textStyle;
  }
  /**
   * @return TextStyle
   */
  public function getTextStyle()
  {
    return $this->textStyle;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ColumnBreak::class, 'Google_Service_Docs_ColumnBreak');
