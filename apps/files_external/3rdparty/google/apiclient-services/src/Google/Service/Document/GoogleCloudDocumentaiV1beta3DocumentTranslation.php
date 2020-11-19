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

class Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentTranslation extends Google_Collection
{
  protected $collection_key = 'provenance';
  public $languageCode;
  protected $provenanceType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentProvenance';
  protected $provenanceDataType = 'array';
  protected $textAnchorType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentTextAnchor';
  protected $textAnchorDataType = '';
  public $translatedText;

  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentProvenance
   */
  public function setProvenance($provenance)
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
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentTextAnchor
   */
  public function setTextAnchor(Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentTextAnchor $textAnchor)
  {
    $this->textAnchor = $textAnchor;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentTextAnchor
   */
  public function getTextAnchor()
  {
    return $this->textAnchor;
  }
  public function setTranslatedText($translatedText)
  {
    $this->translatedText = $translatedText;
  }
  public function getTranslatedText()
  {
    return $this->translatedText;
  }
}
