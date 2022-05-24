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

class GoogleCloudDocumentaiV1DocumentTextChange extends \Google\Collection
{
  protected $collection_key = 'provenance';
  /**
   * @var string
   */
  public $changedText;
  protected $provenanceType = GoogleCloudDocumentaiV1DocumentProvenance::class;
  protected $provenanceDataType = 'array';
  protected $textAnchorType = GoogleCloudDocumentaiV1DocumentTextAnchor::class;
  protected $textAnchorDataType = '';

  /**
   * @param string
   */
  public function setChangedText($changedText)
  {
    $this->changedText = $changedText;
  }
  /**
   * @return string
   */
  public function getChangedText()
  {
    return $this->changedText;
  }
  /**
   * @param GoogleCloudDocumentaiV1DocumentProvenance[]
   */
  public function setProvenance($provenance)
  {
    $this->provenance = $provenance;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentProvenance[]
   */
  public function getProvenance()
  {
    return $this->provenance;
  }
  /**
   * @param GoogleCloudDocumentaiV1DocumentTextAnchor
   */
  public function setTextAnchor(GoogleCloudDocumentaiV1DocumentTextAnchor $textAnchor)
  {
    $this->textAnchor = $textAnchor;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentTextAnchor
   */
  public function getTextAnchor()
  {
    return $this->textAnchor;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1DocumentTextChange::class, 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentTextChange');
