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

class GoogleCloudDocumentaiV1beta1DocumentPageTable extends \Google\Collection
{
  protected $collection_key = 'headerRows';
  protected $bodyRowsType = GoogleCloudDocumentaiV1beta1DocumentPageTableTableRow::class;
  protected $bodyRowsDataType = 'array';
  protected $detectedLanguagesType = GoogleCloudDocumentaiV1beta1DocumentPageDetectedLanguage::class;
  protected $detectedLanguagesDataType = 'array';
  protected $headerRowsType = GoogleCloudDocumentaiV1beta1DocumentPageTableTableRow::class;
  protected $headerRowsDataType = 'array';
  protected $layoutType = GoogleCloudDocumentaiV1beta1DocumentPageLayout::class;
  protected $layoutDataType = '';

  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentPageTableTableRow[]
   */
  public function setBodyRows($bodyRows)
  {
    $this->bodyRows = $bodyRows;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentPageTableTableRow[]
   */
  public function getBodyRows()
  {
    return $this->bodyRows;
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
   * @param GoogleCloudDocumentaiV1beta1DocumentPageTableTableRow[]
   */
  public function setHeaderRows($headerRows)
  {
    $this->headerRows = $headerRows;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentPageTableTableRow[]
   */
  public function getHeaderRows()
  {
    return $this->headerRows;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1beta1DocumentPageTable::class, 'Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentPageTable');
