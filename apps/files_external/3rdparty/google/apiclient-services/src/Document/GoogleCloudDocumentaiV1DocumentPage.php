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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1DocumentPage extends \Google\Collection
{
  protected $collection_key = 'visualElements';
  protected $blocksType = GoogleCloudDocumentaiV1DocumentPageBlock::class;
  protected $blocksDataType = 'array';
  protected $detectedBarcodesType = GoogleCloudDocumentaiV1DocumentPageDetectedBarcode::class;
  protected $detectedBarcodesDataType = 'array';
  protected $detectedLanguagesType = GoogleCloudDocumentaiV1DocumentPageDetectedLanguage::class;
  protected $detectedLanguagesDataType = 'array';
  protected $dimensionType = GoogleCloudDocumentaiV1DocumentPageDimension::class;
  protected $dimensionDataType = '';
  protected $formFieldsType = GoogleCloudDocumentaiV1DocumentPageFormField::class;
  protected $formFieldsDataType = 'array';
  protected $imageType = GoogleCloudDocumentaiV1DocumentPageImage::class;
  protected $imageDataType = '';
  protected $layoutType = GoogleCloudDocumentaiV1DocumentPageLayout::class;
  protected $layoutDataType = '';
  protected $linesType = GoogleCloudDocumentaiV1DocumentPageLine::class;
  protected $linesDataType = 'array';
  /**
   * @var int
   */
  public $pageNumber;
  protected $paragraphsType = GoogleCloudDocumentaiV1DocumentPageParagraph::class;
  protected $paragraphsDataType = 'array';
  protected $provenanceType = GoogleCloudDocumentaiV1DocumentProvenance::class;
  protected $provenanceDataType = '';
  protected $symbolsType = GoogleCloudDocumentaiV1DocumentPageSymbol::class;
  protected $symbolsDataType = 'array';
  protected $tablesType = GoogleCloudDocumentaiV1DocumentPageTable::class;
  protected $tablesDataType = 'array';
  protected $tokensType = GoogleCloudDocumentaiV1DocumentPageToken::class;
  protected $tokensDataType = 'array';
  protected $transformsType = GoogleCloudDocumentaiV1DocumentPageMatrix::class;
  protected $transformsDataType = 'array';
  protected $visualElementsType = GoogleCloudDocumentaiV1DocumentPageVisualElement::class;
  protected $visualElementsDataType = 'array';

  /**
   * @param GoogleCloudDocumentaiV1DocumentPageBlock[]
   */
  public function setBlocks($blocks)
  {
    $this->blocks = $blocks;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentPageBlock[]
   */
  public function getBlocks()
  {
    return $this->blocks;
  }
  /**
   * @param GoogleCloudDocumentaiV1DocumentPageDetectedBarcode[]
   */
  public function setDetectedBarcodes($detectedBarcodes)
  {
    $this->detectedBarcodes = $detectedBarcodes;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentPageDetectedBarcode[]
   */
  public function getDetectedBarcodes()
  {
    return $this->detectedBarcodes;
  }
  /**
   * @param GoogleCloudDocumentaiV1DocumentPageDetectedLanguage[]
   */
  public function setDetectedLanguages($detectedLanguages)
  {
    $this->detectedLanguages = $detectedLanguages;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentPageDetectedLanguage[]
   */
  public function getDetectedLanguages()
  {
    return $this->detectedLanguages;
  }
  /**
   * @param GoogleCloudDocumentaiV1DocumentPageDimension
   */
  public function setDimension(GoogleCloudDocumentaiV1DocumentPageDimension $dimension)
  {
    $this->dimension = $dimension;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentPageDimension
   */
  public function getDimension()
  {
    return $this->dimension;
  }
  /**
   * @param GoogleCloudDocumentaiV1DocumentPageFormField[]
   */
  public function setFormFields($formFields)
  {
    $this->formFields = $formFields;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentPageFormField[]
   */
  public function getFormFields()
  {
    return $this->formFields;
  }
  /**
   * @param GoogleCloudDocumentaiV1DocumentPageImage
   */
  public function setImage(GoogleCloudDocumentaiV1DocumentPageImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentPageImage
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param GoogleCloudDocumentaiV1DocumentPageLayout
   */
  public function setLayout(GoogleCloudDocumentaiV1DocumentPageLayout $layout)
  {
    $this->layout = $layout;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentPageLayout
   */
  public function getLayout()
  {
    return $this->layout;
  }
  /**
   * @param GoogleCloudDocumentaiV1DocumentPageLine[]
   */
  public function setLines($lines)
  {
    $this->lines = $lines;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentPageLine[]
   */
  public function getLines()
  {
    return $this->lines;
  }
  /**
   * @param int
   */
  public function setPageNumber($pageNumber)
  {
    $this->pageNumber = $pageNumber;
  }
  /**
   * @return int
   */
  public function getPageNumber()
  {
    return $this->pageNumber;
  }
  /**
   * @param GoogleCloudDocumentaiV1DocumentPageParagraph[]
   */
  public function setParagraphs($paragraphs)
  {
    $this->paragraphs = $paragraphs;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentPageParagraph[]
   */
  public function getParagraphs()
  {
    return $this->paragraphs;
  }
  /**
   * @param GoogleCloudDocumentaiV1DocumentProvenance
   */
  public function setProvenance(GoogleCloudDocumentaiV1DocumentProvenance $provenance)
  {
    $this->provenance = $provenance;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentProvenance
   */
  public function getProvenance()
  {
    return $this->provenance;
  }
  /**
   * @param GoogleCloudDocumentaiV1DocumentPageSymbol[]
   */
  public function setSymbols($symbols)
  {
    $this->symbols = $symbols;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentPageSymbol[]
   */
  public function getSymbols()
  {
    return $this->symbols;
  }
  /**
   * @param GoogleCloudDocumentaiV1DocumentPageTable[]
   */
  public function setTables($tables)
  {
    $this->tables = $tables;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentPageTable[]
   */
  public function getTables()
  {
    return $this->tables;
  }
  /**
   * @param GoogleCloudDocumentaiV1DocumentPageToken[]
   */
  public function setTokens($tokens)
  {
    $this->tokens = $tokens;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentPageToken[]
   */
  public function getTokens()
  {
    return $this->tokens;
  }
  /**
   * @param GoogleCloudDocumentaiV1DocumentPageMatrix[]
   */
  public function setTransforms($transforms)
  {
    $this->transforms = $transforms;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentPageMatrix[]
   */
  public function getTransforms()
  {
    return $this->transforms;
  }
  /**
   * @param GoogleCloudDocumentaiV1DocumentPageVisualElement[]
   */
  public function setVisualElements($visualElements)
  {
    $this->visualElements = $visualElements;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentPageVisualElement[]
   */
  public function getVisualElements()
  {
    return $this->visualElements;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1DocumentPage::class, 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentPage');
