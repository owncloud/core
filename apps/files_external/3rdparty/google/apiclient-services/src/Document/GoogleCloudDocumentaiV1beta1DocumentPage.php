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

class GoogleCloudDocumentaiV1beta1DocumentPage extends \Google\Collection
{
  protected $collection_key = 'visualElements';
  protected $blocksType = GoogleCloudDocumentaiV1beta1DocumentPageBlock::class;
  protected $blocksDataType = 'array';
  protected $detectedLanguagesType = GoogleCloudDocumentaiV1beta1DocumentPageDetectedLanguage::class;
  protected $detectedLanguagesDataType = 'array';
  protected $dimensionType = GoogleCloudDocumentaiV1beta1DocumentPageDimension::class;
  protected $dimensionDataType = '';
  protected $formFieldsType = GoogleCloudDocumentaiV1beta1DocumentPageFormField::class;
  protected $formFieldsDataType = 'array';
  protected $imageType = GoogleCloudDocumentaiV1beta1DocumentPageImage::class;
  protected $imageDataType = '';
  protected $layoutType = GoogleCloudDocumentaiV1beta1DocumentPageLayout::class;
  protected $layoutDataType = '';
  protected $linesType = GoogleCloudDocumentaiV1beta1DocumentPageLine::class;
  protected $linesDataType = 'array';
  public $pageNumber;
  protected $paragraphsType = GoogleCloudDocumentaiV1beta1DocumentPageParagraph::class;
  protected $paragraphsDataType = 'array';
  protected $provenanceType = GoogleCloudDocumentaiV1beta1DocumentProvenance::class;
  protected $provenanceDataType = '';
  protected $tablesType = GoogleCloudDocumentaiV1beta1DocumentPageTable::class;
  protected $tablesDataType = 'array';
  protected $tokensType = GoogleCloudDocumentaiV1beta1DocumentPageToken::class;
  protected $tokensDataType = 'array';
  protected $transformsType = GoogleCloudDocumentaiV1beta1DocumentPageMatrix::class;
  protected $transformsDataType = 'array';
  protected $visualElementsType = GoogleCloudDocumentaiV1beta1DocumentPageVisualElement::class;
  protected $visualElementsDataType = 'array';

  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentPageBlock[]
   */
  public function setBlocks($blocks)
  {
    $this->blocks = $blocks;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentPageBlock[]
   */
  public function getBlocks()
  {
    return $this->blocks;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentPageDetectedLanguage[]
   */
  public function setDetectedLanguages($detectedLanguages)
  {
    $this->detectedLanguages = $detectedLanguages;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentPageDetectedLanguage[]
   */
  public function getDetectedLanguages()
  {
    return $this->detectedLanguages;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentPageDimension
   */
  public function setDimension(GoogleCloudDocumentaiV1beta1DocumentPageDimension $dimension)
  {
    $this->dimension = $dimension;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentPageDimension
   */
  public function getDimension()
  {
    return $this->dimension;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentPageFormField[]
   */
  public function setFormFields($formFields)
  {
    $this->formFields = $formFields;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentPageFormField[]
   */
  public function getFormFields()
  {
    return $this->formFields;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentPageImage
   */
  public function setImage(GoogleCloudDocumentaiV1beta1DocumentPageImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentPageImage
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentPageLayout
   */
  public function setLayout(GoogleCloudDocumentaiV1beta1DocumentPageLayout $layout)
  {
    $this->layout = $layout;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentPageLayout
   */
  public function getLayout()
  {
    return $this->layout;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentPageLine[]
   */
  public function setLines($lines)
  {
    $this->lines = $lines;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentPageLine[]
   */
  public function getLines()
  {
    return $this->lines;
  }
  public function setPageNumber($pageNumber)
  {
    $this->pageNumber = $pageNumber;
  }
  public function getPageNumber()
  {
    return $this->pageNumber;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentPageParagraph[]
   */
  public function setParagraphs($paragraphs)
  {
    $this->paragraphs = $paragraphs;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentPageParagraph[]
   */
  public function getParagraphs()
  {
    return $this->paragraphs;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentProvenance
   */
  public function setProvenance(GoogleCloudDocumentaiV1beta1DocumentProvenance $provenance)
  {
    $this->provenance = $provenance;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentProvenance
   */
  public function getProvenance()
  {
    return $this->provenance;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentPageTable[]
   */
  public function setTables($tables)
  {
    $this->tables = $tables;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentPageTable[]
   */
  public function getTables()
  {
    return $this->tables;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentPageToken[]
   */
  public function setTokens($tokens)
  {
    $this->tokens = $tokens;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentPageToken[]
   */
  public function getTokens()
  {
    return $this->tokens;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentPageMatrix[]
   */
  public function setTransforms($transforms)
  {
    $this->transforms = $transforms;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentPageMatrix[]
   */
  public function getTransforms()
  {
    return $this->transforms;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentPageVisualElement[]
   */
  public function setVisualElements($visualElements)
  {
    $this->visualElements = $visualElements;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentPageVisualElement[]
   */
  public function getVisualElements()
  {
    return $this->visualElements;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1beta1DocumentPage::class, 'Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentPage');
