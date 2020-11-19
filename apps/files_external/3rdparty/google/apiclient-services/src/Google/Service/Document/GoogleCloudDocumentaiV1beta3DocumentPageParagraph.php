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

class Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentPageParagraph extends Google_Collection
{
  protected $collection_key = 'detectedLanguages';
  protected $detectedLanguagesType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentPageDetectedLanguage';
  protected $detectedLanguagesDataType = 'array';
  protected $layoutType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentPageLayout';
  protected $layoutDataType = '';
  protected $provenanceType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentProvenance';
  protected $provenanceDataType = '';

  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentPageDetectedLanguage
   */
  public function setDetectedLanguages($detectedLanguages)
  {
    $this->detectedLanguages = $detectedLanguages;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentPageDetectedLanguage
   */
  public function getDetectedLanguages()
  {
    return $this->detectedLanguages;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentPageLayout
   */
  public function setLayout(Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentPageLayout $layout)
  {
    $this->layout = $layout;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentPageLayout
   */
  public function getLayout()
  {
    return $this->layout;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentProvenance
   */
  public function setProvenance(Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentProvenance $provenance)
  {
    $this->provenance = $provenance;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentProvenance
   */
  public function getProvenance()
  {
    return $this->provenance;
  }
}
