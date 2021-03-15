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

class Google_Service_Docs_ParagraphElement extends Google_Model
{
  protected $autoTextType = 'Google_Service_Docs_AutoText';
  protected $autoTextDataType = '';
  protected $columnBreakType = 'Google_Service_Docs_ColumnBreak';
  protected $columnBreakDataType = '';
  public $endIndex;
  protected $equationType = 'Google_Service_Docs_Equation';
  protected $equationDataType = '';
  protected $footnoteReferenceType = 'Google_Service_Docs_FootnoteReference';
  protected $footnoteReferenceDataType = '';
  protected $horizontalRuleType = 'Google_Service_Docs_HorizontalRule';
  protected $horizontalRuleDataType = '';
  protected $inlineObjectElementType = 'Google_Service_Docs_InlineObjectElement';
  protected $inlineObjectElementDataType = '';
  protected $pageBreakType = 'Google_Service_Docs_PageBreak';
  protected $pageBreakDataType = '';
  protected $personType = 'Google_Service_Docs_Person';
  protected $personDataType = '';
  public $startIndex;
  protected $textRunType = 'Google_Service_Docs_TextRun';
  protected $textRunDataType = '';

  /**
   * @param Google_Service_Docs_AutoText
   */
  public function setAutoText(Google_Service_Docs_AutoText $autoText)
  {
    $this->autoText = $autoText;
  }
  /**
   * @return Google_Service_Docs_AutoText
   */
  public function getAutoText()
  {
    return $this->autoText;
  }
  /**
   * @param Google_Service_Docs_ColumnBreak
   */
  public function setColumnBreak(Google_Service_Docs_ColumnBreak $columnBreak)
  {
    $this->columnBreak = $columnBreak;
  }
  /**
   * @return Google_Service_Docs_ColumnBreak
   */
  public function getColumnBreak()
  {
    return $this->columnBreak;
  }
  public function setEndIndex($endIndex)
  {
    $this->endIndex = $endIndex;
  }
  public function getEndIndex()
  {
    return $this->endIndex;
  }
  /**
   * @param Google_Service_Docs_Equation
   */
  public function setEquation(Google_Service_Docs_Equation $equation)
  {
    $this->equation = $equation;
  }
  /**
   * @return Google_Service_Docs_Equation
   */
  public function getEquation()
  {
    return $this->equation;
  }
  /**
   * @param Google_Service_Docs_FootnoteReference
   */
  public function setFootnoteReference(Google_Service_Docs_FootnoteReference $footnoteReference)
  {
    $this->footnoteReference = $footnoteReference;
  }
  /**
   * @return Google_Service_Docs_FootnoteReference
   */
  public function getFootnoteReference()
  {
    return $this->footnoteReference;
  }
  /**
   * @param Google_Service_Docs_HorizontalRule
   */
  public function setHorizontalRule(Google_Service_Docs_HorizontalRule $horizontalRule)
  {
    $this->horizontalRule = $horizontalRule;
  }
  /**
   * @return Google_Service_Docs_HorizontalRule
   */
  public function getHorizontalRule()
  {
    return $this->horizontalRule;
  }
  /**
   * @param Google_Service_Docs_InlineObjectElement
   */
  public function setInlineObjectElement(Google_Service_Docs_InlineObjectElement $inlineObjectElement)
  {
    $this->inlineObjectElement = $inlineObjectElement;
  }
  /**
   * @return Google_Service_Docs_InlineObjectElement
   */
  public function getInlineObjectElement()
  {
    return $this->inlineObjectElement;
  }
  /**
   * @param Google_Service_Docs_PageBreak
   */
  public function setPageBreak(Google_Service_Docs_PageBreak $pageBreak)
  {
    $this->pageBreak = $pageBreak;
  }
  /**
   * @return Google_Service_Docs_PageBreak
   */
  public function getPageBreak()
  {
    return $this->pageBreak;
  }
  /**
   * @param Google_Service_Docs_Person
   */
  public function setPerson(Google_Service_Docs_Person $person)
  {
    $this->person = $person;
  }
  /**
   * @return Google_Service_Docs_Person
   */
  public function getPerson()
  {
    return $this->person;
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
   * @param Google_Service_Docs_TextRun
   */
  public function setTextRun(Google_Service_Docs_TextRun $textRun)
  {
    $this->textRun = $textRun;
  }
  /**
   * @return Google_Service_Docs_TextRun
   */
  public function getTextRun()
  {
    return $this->textRun;
  }
}
