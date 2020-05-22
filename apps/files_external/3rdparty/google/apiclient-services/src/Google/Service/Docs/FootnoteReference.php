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

class Google_Service_Docs_FootnoteReference extends Google_Collection
{
  protected $collection_key = 'suggestedInsertionIds';
  public $footnoteId;
  public $footnoteNumber;
  public $suggestedDeletionIds;
  public $suggestedInsertionIds;
  protected $suggestedTextStyleChangesType = 'Google_Service_Docs_SuggestedTextStyle';
  protected $suggestedTextStyleChangesDataType = 'map';
  protected $textStyleType = 'Google_Service_Docs_TextStyle';
  protected $textStyleDataType = '';

  public function setFootnoteId($footnoteId)
  {
    $this->footnoteId = $footnoteId;
  }
  public function getFootnoteId()
  {
    return $this->footnoteId;
  }
  public function setFootnoteNumber($footnoteNumber)
  {
    $this->footnoteNumber = $footnoteNumber;
  }
  public function getFootnoteNumber()
  {
    return $this->footnoteNumber;
  }
  public function setSuggestedDeletionIds($suggestedDeletionIds)
  {
    $this->suggestedDeletionIds = $suggestedDeletionIds;
  }
  public function getSuggestedDeletionIds()
  {
    return $this->suggestedDeletionIds;
  }
  public function setSuggestedInsertionIds($suggestedInsertionIds)
  {
    $this->suggestedInsertionIds = $suggestedInsertionIds;
  }
  public function getSuggestedInsertionIds()
  {
    return $this->suggestedInsertionIds;
  }
  /**
   * @param Google_Service_Docs_SuggestedTextStyle
   */
  public function setSuggestedTextStyleChanges($suggestedTextStyleChanges)
  {
    $this->suggestedTextStyleChanges = $suggestedTextStyleChanges;
  }
  /**
   * @return Google_Service_Docs_SuggestedTextStyle
   */
  public function getSuggestedTextStyleChanges()
  {
    return $this->suggestedTextStyleChanges;
  }
  /**
   * @param Google_Service_Docs_TextStyle
   */
  public function setTextStyle(Google_Service_Docs_TextStyle $textStyle)
  {
    $this->textStyle = $textStyle;
  }
  /**
   * @return Google_Service_Docs_TextStyle
   */
  public function getTextStyle()
  {
    return $this->textStyle;
  }
}
