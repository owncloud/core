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

namespace Google\Service\Slides;

class TextElement extends \Google\Model
{
  protected $autoTextType = AutoText::class;
  protected $autoTextDataType = '';
  /**
   * @var int
   */
  public $endIndex;
  protected $paragraphMarkerType = ParagraphMarker::class;
  protected $paragraphMarkerDataType = '';
  /**
   * @var int
   */
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
   * @param int
   */
  public function setEndIndex($endIndex)
  {
    $this->endIndex = $endIndex;
  }
  /**
   * @return int
   */
  public function getEndIndex()
  {
    return $this->endIndex;
  }
  /**
   * @param ParagraphMarker
   */
  public function setParagraphMarker(ParagraphMarker $paragraphMarker)
  {
    $this->paragraphMarker = $paragraphMarker;
  }
  /**
   * @return ParagraphMarker
   */
  public function getParagraphMarker()
  {
    return $this->paragraphMarker;
  }
  /**
   * @param int
   */
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  /**
   * @return int
   */
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
class_alias(TextElement::class, 'Google_Service_Slides_TextElement');
