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

class Google_Service_Docs_SectionBreak extends Google_Collection
{
  protected $collection_key = 'suggestedInsertionIds';
  protected $sectionStyleType = 'Google_Service_Docs_SectionStyle';
  protected $sectionStyleDataType = '';
  public $suggestedDeletionIds;
  public $suggestedInsertionIds;

  /**
   * @param Google_Service_Docs_SectionStyle
   */
  public function setSectionStyle(Google_Service_Docs_SectionStyle $sectionStyle)
  {
    $this->sectionStyle = $sectionStyle;
  }
  /**
   * @return Google_Service_Docs_SectionStyle
   */
  public function getSectionStyle()
  {
    return $this->sectionStyle;
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
}
