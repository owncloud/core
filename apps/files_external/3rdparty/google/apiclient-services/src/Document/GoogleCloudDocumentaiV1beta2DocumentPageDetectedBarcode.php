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

class GoogleCloudDocumentaiV1beta2DocumentPageDetectedBarcode extends \Google\Model
{
  protected $barcodeType = GoogleCloudDocumentaiV1beta2Barcode::class;
  protected $barcodeDataType = '';
  protected $layoutType = GoogleCloudDocumentaiV1beta2DocumentPageLayout::class;
  protected $layoutDataType = '';

  /**
   * @param GoogleCloudDocumentaiV1beta2Barcode
   */
  public function setBarcode(GoogleCloudDocumentaiV1beta2Barcode $barcode)
  {
    $this->barcode = $barcode;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2Barcode
   */
  public function getBarcode()
  {
    return $this->barcode;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentPageLayout
   */
  public function setLayout(GoogleCloudDocumentaiV1beta2DocumentPageLayout $layout)
  {
    $this->layout = $layout;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentPageLayout
   */
  public function getLayout()
  {
    return $this->layout;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1beta2DocumentPageDetectedBarcode::class, 'Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPageDetectedBarcode');
