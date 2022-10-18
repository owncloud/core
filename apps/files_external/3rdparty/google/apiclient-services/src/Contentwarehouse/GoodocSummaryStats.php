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

class GoodocSummaryStats extends \Google\Collection
{
  protected $collection_key = 'fontSizeHistogram';
  /**
   * @var bool
   */
  public $estimatedFontSizes;
  protected $fontSizeHistogramType = GoodocFontSizeStats::class;
  protected $fontSizeHistogramDataType = 'array';
  /**
   * @var int
   */
  public $meanSymbolsPerBlock;
  /**
   * @var int
   */
  public $meanSymbolsPerLine;
  /**
   * @var int
   */
  public $meanSymbolsPerParagraph;
  /**
   * @var int
   */
  public $meanSymbolsPerWord;
  /**
   * @var int
   */
  public $meanWordsPerBlock;
  /**
   * @var int
   */
  public $meanWordsPerLine;
  /**
   * @var int
   */
  public $meanWordsPerParagraph;
  /**
   * @var int
   */
  public $medianBlockSpace;
  protected $medianEvenPrintedBoxType = GoodocBoundingBox::class;
  protected $medianEvenPrintedBoxDataType = '';
  protected $medianFullEvenPrintedBoxType = GoodocBoundingBox::class;
  protected $medianFullEvenPrintedBoxDataType = '';
  protected $medianFullOddPrintedBoxType = GoodocBoundingBox::class;
  protected $medianFullOddPrintedBoxDataType = '';
  protected $medianFullPrintedBoxType = GoodocBoundingBox::class;
  protected $medianFullPrintedBoxDataType = '';
  /**
   * @var int
   */
  public $medianHeight;
  /**
   * @var int
   */
  public $medianHorizontalDpi;
  /**
   * @var int
   */
  public $medianLineHeight;
  /**
   * @var int
   */
  public $medianLineSpace;
  /**
   * @var int
   */
  public $medianLineSpan;
  protected $medianOddPrintedBoxType = GoodocBoundingBox::class;
  protected $medianOddPrintedBoxDataType = '';
  /**
   * @var int
   */
  public $medianParagraphIndent;
  /**
   * @var int
   */
  public $medianParagraphSpace;
  protected $medianPrintedBoxType = GoodocBoundingBox::class;
  protected $medianPrintedBoxDataType = '';
  /**
   * @var int
   */
  public $medianSymbolsPerBlock;
  /**
   * @var int
   */
  public $medianSymbolsPerLine;
  /**
   * @var int
   */
  public $medianSymbolsPerParagraph;
  /**
   * @var int
   */
  public $medianSymbolsPerWord;
  /**
   * @var int
   */
  public $medianVerticalDpi;
  /**
   * @var int
   */
  public $medianWidth;
  /**
   * @var int
   */
  public $medianWordsPerBlock;
  /**
   * @var int
   */
  public $medianWordsPerLine;
  /**
   * @var int
   */
  public $medianWordsPerParagraph;
  /**
   * @var int
   */
  public $numBlockSpaces;
  /**
   * @var int
   */
  public $numBlocks;
  /**
   * @var int
   */
  public $numLineSpaces;
  /**
   * @var int
   */
  public $numLines;
  /**
   * @var int
   */
  public $numNonGraphicBlocks;
  /**
   * @var int
   */
  public $numPages;
  /**
   * @var int
   */
  public $numParagraphSpaces;
  /**
   * @var int
   */
  public $numParagraphs;
  /**
   * @var int
   */
  public $numSymbols;
  /**
   * @var int
   */
  public $numWords;

  /**
   * @param bool
   */
  public function setEstimatedFontSizes($estimatedFontSizes)
  {
    $this->estimatedFontSizes = $estimatedFontSizes;
  }
  /**
   * @return bool
   */
  public function getEstimatedFontSizes()
  {
    return $this->estimatedFontSizes;
  }
  /**
   * @param GoodocFontSizeStats[]
   */
  public function setFontSizeHistogram($fontSizeHistogram)
  {
    $this->fontSizeHistogram = $fontSizeHistogram;
  }
  /**
   * @return GoodocFontSizeStats[]
   */
  public function getFontSizeHistogram()
  {
    return $this->fontSizeHistogram;
  }
  /**
   * @param int
   */
  public function setMeanSymbolsPerBlock($meanSymbolsPerBlock)
  {
    $this->meanSymbolsPerBlock = $meanSymbolsPerBlock;
  }
  /**
   * @return int
   */
  public function getMeanSymbolsPerBlock()
  {
    return $this->meanSymbolsPerBlock;
  }
  /**
   * @param int
   */
  public function setMeanSymbolsPerLine($meanSymbolsPerLine)
  {
    $this->meanSymbolsPerLine = $meanSymbolsPerLine;
  }
  /**
   * @return int
   */
  public function getMeanSymbolsPerLine()
  {
    return $this->meanSymbolsPerLine;
  }
  /**
   * @param int
   */
  public function setMeanSymbolsPerParagraph($meanSymbolsPerParagraph)
  {
    $this->meanSymbolsPerParagraph = $meanSymbolsPerParagraph;
  }
  /**
   * @return int
   */
  public function getMeanSymbolsPerParagraph()
  {
    return $this->meanSymbolsPerParagraph;
  }
  /**
   * @param int
   */
  public function setMeanSymbolsPerWord($meanSymbolsPerWord)
  {
    $this->meanSymbolsPerWord = $meanSymbolsPerWord;
  }
  /**
   * @return int
   */
  public function getMeanSymbolsPerWord()
  {
    return $this->meanSymbolsPerWord;
  }
  /**
   * @param int
   */
  public function setMeanWordsPerBlock($meanWordsPerBlock)
  {
    $this->meanWordsPerBlock = $meanWordsPerBlock;
  }
  /**
   * @return int
   */
  public function getMeanWordsPerBlock()
  {
    return $this->meanWordsPerBlock;
  }
  /**
   * @param int
   */
  public function setMeanWordsPerLine($meanWordsPerLine)
  {
    $this->meanWordsPerLine = $meanWordsPerLine;
  }
  /**
   * @return int
   */
  public function getMeanWordsPerLine()
  {
    return $this->meanWordsPerLine;
  }
  /**
   * @param int
   */
  public function setMeanWordsPerParagraph($meanWordsPerParagraph)
  {
    $this->meanWordsPerParagraph = $meanWordsPerParagraph;
  }
  /**
   * @return int
   */
  public function getMeanWordsPerParagraph()
  {
    return $this->meanWordsPerParagraph;
  }
  /**
   * @param int
   */
  public function setMedianBlockSpace($medianBlockSpace)
  {
    $this->medianBlockSpace = $medianBlockSpace;
  }
  /**
   * @return int
   */
  public function getMedianBlockSpace()
  {
    return $this->medianBlockSpace;
  }
  /**
   * @param GoodocBoundingBox
   */
  public function setMedianEvenPrintedBox(GoodocBoundingBox $medianEvenPrintedBox)
  {
    $this->medianEvenPrintedBox = $medianEvenPrintedBox;
  }
  /**
   * @return GoodocBoundingBox
   */
  public function getMedianEvenPrintedBox()
  {
    return $this->medianEvenPrintedBox;
  }
  /**
   * @param GoodocBoundingBox
   */
  public function setMedianFullEvenPrintedBox(GoodocBoundingBox $medianFullEvenPrintedBox)
  {
    $this->medianFullEvenPrintedBox = $medianFullEvenPrintedBox;
  }
  /**
   * @return GoodocBoundingBox
   */
  public function getMedianFullEvenPrintedBox()
  {
    return $this->medianFullEvenPrintedBox;
  }
  /**
   * @param GoodocBoundingBox
   */
  public function setMedianFullOddPrintedBox(GoodocBoundingBox $medianFullOddPrintedBox)
  {
    $this->medianFullOddPrintedBox = $medianFullOddPrintedBox;
  }
  /**
   * @return GoodocBoundingBox
   */
  public function getMedianFullOddPrintedBox()
  {
    return $this->medianFullOddPrintedBox;
  }
  /**
   * @param GoodocBoundingBox
   */
  public function setMedianFullPrintedBox(GoodocBoundingBox $medianFullPrintedBox)
  {
    $this->medianFullPrintedBox = $medianFullPrintedBox;
  }
  /**
   * @return GoodocBoundingBox
   */
  public function getMedianFullPrintedBox()
  {
    return $this->medianFullPrintedBox;
  }
  /**
   * @param int
   */
  public function setMedianHeight($medianHeight)
  {
    $this->medianHeight = $medianHeight;
  }
  /**
   * @return int
   */
  public function getMedianHeight()
  {
    return $this->medianHeight;
  }
  /**
   * @param int
   */
  public function setMedianHorizontalDpi($medianHorizontalDpi)
  {
    $this->medianHorizontalDpi = $medianHorizontalDpi;
  }
  /**
   * @return int
   */
  public function getMedianHorizontalDpi()
  {
    return $this->medianHorizontalDpi;
  }
  /**
   * @param int
   */
  public function setMedianLineHeight($medianLineHeight)
  {
    $this->medianLineHeight = $medianLineHeight;
  }
  /**
   * @return int
   */
  public function getMedianLineHeight()
  {
    return $this->medianLineHeight;
  }
  /**
   * @param int
   */
  public function setMedianLineSpace($medianLineSpace)
  {
    $this->medianLineSpace = $medianLineSpace;
  }
  /**
   * @return int
   */
  public function getMedianLineSpace()
  {
    return $this->medianLineSpace;
  }
  /**
   * @param int
   */
  public function setMedianLineSpan($medianLineSpan)
  {
    $this->medianLineSpan = $medianLineSpan;
  }
  /**
   * @return int
   */
  public function getMedianLineSpan()
  {
    return $this->medianLineSpan;
  }
  /**
   * @param GoodocBoundingBox
   */
  public function setMedianOddPrintedBox(GoodocBoundingBox $medianOddPrintedBox)
  {
    $this->medianOddPrintedBox = $medianOddPrintedBox;
  }
  /**
   * @return GoodocBoundingBox
   */
  public function getMedianOddPrintedBox()
  {
    return $this->medianOddPrintedBox;
  }
  /**
   * @param int
   */
  public function setMedianParagraphIndent($medianParagraphIndent)
  {
    $this->medianParagraphIndent = $medianParagraphIndent;
  }
  /**
   * @return int
   */
  public function getMedianParagraphIndent()
  {
    return $this->medianParagraphIndent;
  }
  /**
   * @param int
   */
  public function setMedianParagraphSpace($medianParagraphSpace)
  {
    $this->medianParagraphSpace = $medianParagraphSpace;
  }
  /**
   * @return int
   */
  public function getMedianParagraphSpace()
  {
    return $this->medianParagraphSpace;
  }
  /**
   * @param GoodocBoundingBox
   */
  public function setMedianPrintedBox(GoodocBoundingBox $medianPrintedBox)
  {
    $this->medianPrintedBox = $medianPrintedBox;
  }
  /**
   * @return GoodocBoundingBox
   */
  public function getMedianPrintedBox()
  {
    return $this->medianPrintedBox;
  }
  /**
   * @param int
   */
  public function setMedianSymbolsPerBlock($medianSymbolsPerBlock)
  {
    $this->medianSymbolsPerBlock = $medianSymbolsPerBlock;
  }
  /**
   * @return int
   */
  public function getMedianSymbolsPerBlock()
  {
    return $this->medianSymbolsPerBlock;
  }
  /**
   * @param int
   */
  public function setMedianSymbolsPerLine($medianSymbolsPerLine)
  {
    $this->medianSymbolsPerLine = $medianSymbolsPerLine;
  }
  /**
   * @return int
   */
  public function getMedianSymbolsPerLine()
  {
    return $this->medianSymbolsPerLine;
  }
  /**
   * @param int
   */
  public function setMedianSymbolsPerParagraph($medianSymbolsPerParagraph)
  {
    $this->medianSymbolsPerParagraph = $medianSymbolsPerParagraph;
  }
  /**
   * @return int
   */
  public function getMedianSymbolsPerParagraph()
  {
    return $this->medianSymbolsPerParagraph;
  }
  /**
   * @param int
   */
  public function setMedianSymbolsPerWord($medianSymbolsPerWord)
  {
    $this->medianSymbolsPerWord = $medianSymbolsPerWord;
  }
  /**
   * @return int
   */
  public function getMedianSymbolsPerWord()
  {
    return $this->medianSymbolsPerWord;
  }
  /**
   * @param int
   */
  public function setMedianVerticalDpi($medianVerticalDpi)
  {
    $this->medianVerticalDpi = $medianVerticalDpi;
  }
  /**
   * @return int
   */
  public function getMedianVerticalDpi()
  {
    return $this->medianVerticalDpi;
  }
  /**
   * @param int
   */
  public function setMedianWidth($medianWidth)
  {
    $this->medianWidth = $medianWidth;
  }
  /**
   * @return int
   */
  public function getMedianWidth()
  {
    return $this->medianWidth;
  }
  /**
   * @param int
   */
  public function setMedianWordsPerBlock($medianWordsPerBlock)
  {
    $this->medianWordsPerBlock = $medianWordsPerBlock;
  }
  /**
   * @return int
   */
  public function getMedianWordsPerBlock()
  {
    return $this->medianWordsPerBlock;
  }
  /**
   * @param int
   */
  public function setMedianWordsPerLine($medianWordsPerLine)
  {
    $this->medianWordsPerLine = $medianWordsPerLine;
  }
  /**
   * @return int
   */
  public function getMedianWordsPerLine()
  {
    return $this->medianWordsPerLine;
  }
  /**
   * @param int
   */
  public function setMedianWordsPerParagraph($medianWordsPerParagraph)
  {
    $this->medianWordsPerParagraph = $medianWordsPerParagraph;
  }
  /**
   * @return int
   */
  public function getMedianWordsPerParagraph()
  {
    return $this->medianWordsPerParagraph;
  }
  /**
   * @param int
   */
  public function setNumBlockSpaces($numBlockSpaces)
  {
    $this->numBlockSpaces = $numBlockSpaces;
  }
  /**
   * @return int
   */
  public function getNumBlockSpaces()
  {
    return $this->numBlockSpaces;
  }
  /**
   * @param int
   */
  public function setNumBlocks($numBlocks)
  {
    $this->numBlocks = $numBlocks;
  }
  /**
   * @return int
   */
  public function getNumBlocks()
  {
    return $this->numBlocks;
  }
  /**
   * @param int
   */
  public function setNumLineSpaces($numLineSpaces)
  {
    $this->numLineSpaces = $numLineSpaces;
  }
  /**
   * @return int
   */
  public function getNumLineSpaces()
  {
    return $this->numLineSpaces;
  }
  /**
   * @param int
   */
  public function setNumLines($numLines)
  {
    $this->numLines = $numLines;
  }
  /**
   * @return int
   */
  public function getNumLines()
  {
    return $this->numLines;
  }
  /**
   * @param int
   */
  public function setNumNonGraphicBlocks($numNonGraphicBlocks)
  {
    $this->numNonGraphicBlocks = $numNonGraphicBlocks;
  }
  /**
   * @return int
   */
  public function getNumNonGraphicBlocks()
  {
    return $this->numNonGraphicBlocks;
  }
  /**
   * @param int
   */
  public function setNumPages($numPages)
  {
    $this->numPages = $numPages;
  }
  /**
   * @return int
   */
  public function getNumPages()
  {
    return $this->numPages;
  }
  /**
   * @param int
   */
  public function setNumParagraphSpaces($numParagraphSpaces)
  {
    $this->numParagraphSpaces = $numParagraphSpaces;
  }
  /**
   * @return int
   */
  public function getNumParagraphSpaces()
  {
    return $this->numParagraphSpaces;
  }
  /**
   * @param int
   */
  public function setNumParagraphs($numParagraphs)
  {
    $this->numParagraphs = $numParagraphs;
  }
  /**
   * @return int
   */
  public function getNumParagraphs()
  {
    return $this->numParagraphs;
  }
  /**
   * @param int
   */
  public function setNumSymbols($numSymbols)
  {
    $this->numSymbols = $numSymbols;
  }
  /**
   * @return int
   */
  public function getNumSymbols()
  {
    return $this->numSymbols;
  }
  /**
   * @param int
   */
  public function setNumWords($numWords)
  {
    $this->numWords = $numWords;
  }
  /**
   * @return int
   */
  public function getNumWords()
  {
    return $this->numWords;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocSummaryStats::class, 'Google_Service_Contentwarehouse_GoodocSummaryStats');
