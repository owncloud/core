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

class ParagraphElement extends \Google\Model
{
  protected $autoTextType = AutoText::class;
  protected $autoTextDataType = '';
  protected $columnBreakType = ColumnBreak::class;
  protected $columnBreakDataType = '';
  public $endIndex;
  protected $equationType = Equation::class;
  protected $equationDataType = '';
  protected $footnoteReferenceType = FootnoteReference::class;
  protected $footnoteReferenceDataType = '';
  protected $horizontalRuleType = HorizontalRule::class;
  protected $horizontalRuleDataType = '';
  protected $inlineObjectElementType = InlineObjectElement::class;
  protected $inlineObjectElementDataType = '';
  protected $pageBreakType = PageBreak::class;
  protected $pageBreakDataType = '';
  protected $personType = Person::class;
  protected $personDataType = '';
  protected $richLinkType = RichLink::class;
  protected $richLinkDataType = '';
  public $startIndex;
  protected $textRunType = TextRun::class;
  protected $textRunDataType = '';

  /**
   * @param AutoText
   */
  public function setAutoText(AutoText $autoText)
  {
    $this->autoText = $autoText;
  }
  /**
   * @return AutoText
   */
  public function getAutoText()
  {
    return $this->autoText;
  }
  /**
   * @param ColumnBreak
   */
  public function setColumnBreak(ColumnBreak $columnBreak)
  {
    $this->columnBreak = $columnBreak;
  }
  /**
   * @return ColumnBreak
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
   * @param Equation
   */
  public function setEquation(Equation $equation)
  {
    $this->equation = $equation;
  }
  /**
   * @return Equation
   */
  public function getEquation()
  {
    return $this->equation;
  }
  /**
   * @param FootnoteReference
   */
  public function setFootnoteReference(FootnoteReference $footnoteReference)
  {
    $this->footnoteReference = $footnoteReference;
  }
  /**
   * @return FootnoteReference
   */
  public function getFootnoteReference()
  {
    return $this->footnoteReference;
  }
  /**
   * @param HorizontalRule
   */
  public function setHorizontalRule(HorizontalRule $horizontalRule)
  {
    $this->horizontalRule = $horizontalRule;
  }
  /**
   * @return HorizontalRule
   */
  public function getHorizontalRule()
  {
    return $this->horizontalRule;
  }
  /**
   * @param InlineObjectElement
   */
  public function setInlineObjectElement(InlineObjectElement $inlineObjectElement)
  {
    $this->inlineObjectElement = $inlineObjectElement;
  }
  /**
   * @return InlineObjectElement
   */
  public function getInlineObjectElement()
  {
    return $this->inlineObjectElement;
  }
  /**
   * @param PageBreak
   */
  public function setPageBreak(PageBreak $pageBreak)
  {
    $this->pageBreak = $pageBreak;
  }
  /**
   * @return PageBreak
   */
  public function getPageBreak()
  {
    return $this->pageBreak;
  }
  /**
   * @param Person
   */
  public function setPerson(Person $person)
  {
    $this->person = $person;
  }
  /**
   * @return Person
   */
  public function getPerson()
  {
    return $this->person;
  }
  /**
   * @param RichLink
   */
  public function setRichLink(RichLink $richLink)
  {
    $this->richLink = $richLink;
  }
  /**
   * @return RichLink
   */
  public function getRichLink()
  {
    return $this->richLink;
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
   * @param TextRun
   */
  public function setTextRun(TextRun $textRun)
  {
    $this->textRun = $textRun;
  }
  /**
   * @return TextRun
   */
  public function getTextRun()
  {
    return $this->textRun;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ParagraphElement::class, 'Google_Service_Docs_ParagraphElement');
