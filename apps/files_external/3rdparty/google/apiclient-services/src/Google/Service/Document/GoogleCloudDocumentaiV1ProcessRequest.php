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

class Google_Service_Document_GoogleCloudDocumentaiV1ProcessRequest extends Google_Model
{
  protected $inlineDocumentType = 'Google_Service_Document_GoogleCloudDocumentaiV1Document';
  protected $inlineDocumentDataType = '';
  protected $rawDocumentType = 'Google_Service_Document_GoogleCloudDocumentaiV1RawDocument';
  protected $rawDocumentDataType = '';
  public $skipHumanReview;

  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1Document
   */
  public function setInlineDocument(Google_Service_Document_GoogleCloudDocumentaiV1Document $inlineDocument)
  {
    $this->inlineDocument = $inlineDocument;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1Document
   */
  public function getInlineDocument()
  {
    return $this->inlineDocument;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1RawDocument
   */
  public function setRawDocument(Google_Service_Document_GoogleCloudDocumentaiV1RawDocument $rawDocument)
  {
    $this->rawDocument = $rawDocument;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1RawDocument
   */
  public function getRawDocument()
  {
    return $this->rawDocument;
  }
  public function setSkipHumanReview($skipHumanReview)
  {
    $this->skipHumanReview = $skipHumanReview;
  }
  public function getSkipHumanReview()
  {
    return $this->skipHumanReview;
  }
}
