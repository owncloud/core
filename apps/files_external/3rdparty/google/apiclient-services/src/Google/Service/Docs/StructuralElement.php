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

class Google_Service_Docs_StructuralElement extends Google_Model
{
  public $endIndex;
  protected $paragraphType = 'Google_Service_Docs_Paragraph';
  protected $paragraphDataType = '';
  protected $sectionBreakType = 'Google_Service_Docs_SectionBreak';
  protected $sectionBreakDataType = '';
  public $startIndex;
  protected $tableType = 'Google_Service_Docs_Table';
  protected $tableDataType = '';
  protected $tableOfContentsType = 'Google_Service_Docs_TableOfContents';
  protected $tableOfContentsDataType = '';

  public function setEndIndex($endIndex)
  {
    $this->endIndex = $endIndex;
  }
  public function getEndIndex()
  {
    return $this->endIndex;
  }
  /**
   * @param Google_Service_Docs_Paragraph
   */
  public function setParagraph(Google_Service_Docs_Paragraph $paragraph)
  {
    $this->paragraph = $paragraph;
  }
  /**
   * @return Google_Service_Docs_Paragraph
   */
  public function getParagraph()
  {
    return $this->paragraph;
  }
  /**
   * @param Google_Service_Docs_SectionBreak
   */
  public function setSectionBreak(Google_Service_Docs_SectionBreak $sectionBreak)
  {
    $this->sectionBreak = $sectionBreak;
  }
  /**
   * @return Google_Service_Docs_SectionBreak
   */
  public function getSectionBreak()
  {
    return $this->sectionBreak;
  }
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  public function getStartIndex()
  {
    return $this->startIndex;
  }
  /**
   * @param Google_Service_Docs_Table
   */
  public function setTable(Google_Service_Docs_Table $table)
  {
    $this->table = $table;
  }
  /**
   * @return Google_Service_Docs_Table
   */
  public function getTable()
  {
    return $this->table;
  }
  /**
   * @param Google_Service_Docs_TableOfContents
   */
  public function setTableOfContents(Google_Service_Docs_TableOfContents $tableOfContents)
  {
    $this->tableOfContents = $tableOfContents;
  }
  /**
   * @return Google_Service_Docs_TableOfContents
   */
  public function getTableOfContents()
  {
    return $this->tableOfContents;
  }
}
