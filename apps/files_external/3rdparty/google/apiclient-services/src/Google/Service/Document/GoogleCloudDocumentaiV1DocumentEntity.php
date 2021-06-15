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

class Google_Service_Document_GoogleCloudDocumentaiV1DocumentEntity extends Google_Collection
{
  protected $collection_key = 'properties';
  public $confidence;
  public $id;
  public $mentionId;
  public $mentionText;
  protected $normalizedValueType = 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentEntityNormalizedValue';
  protected $normalizedValueDataType = '';
  protected $pageAnchorType = 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentPageAnchor';
  protected $pageAnchorDataType = '';
  protected $propertiesType = 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentEntity';
  protected $propertiesDataType = 'array';
  protected $provenanceType = 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentProvenance';
  protected $provenanceDataType = '';
  public $redacted;
  protected $textAnchorType = 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentTextAnchor';
  protected $textAnchorDataType = '';
  public $type;

  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setMentionId($mentionId)
  {
    $this->mentionId = $mentionId;
  }
  public function getMentionId()
  {
    return $this->mentionId;
  }
  public function setMentionText($mentionText)
  {
    $this->mentionText = $mentionText;
  }
  public function getMentionText()
  {
    return $this->mentionText;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1DocumentEntityNormalizedValue
   */
  public function setNormalizedValue(Google_Service_Document_GoogleCloudDocumentaiV1DocumentEntityNormalizedValue $normalizedValue)
  {
    $this->normalizedValue = $normalizedValue;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1DocumentEntityNormalizedValue
   */
  public function getNormalizedValue()
  {
    return $this->normalizedValue;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1DocumentPageAnchor
   */
  public function setPageAnchor(Google_Service_Document_GoogleCloudDocumentaiV1DocumentPageAnchor $pageAnchor)
  {
    $this->pageAnchor = $pageAnchor;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1DocumentPageAnchor
   */
  public function getPageAnchor()
  {
    return $this->pageAnchor;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1DocumentEntity[]
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1DocumentEntity[]
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1DocumentProvenance
   */
  public function setProvenance(Google_Service_Document_GoogleCloudDocumentaiV1DocumentProvenance $provenance)
  {
    $this->provenance = $provenance;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1DocumentProvenance
   */
  public function getProvenance()
  {
    return $this->provenance;
  }
  public function setRedacted($redacted)
  {
    $this->redacted = $redacted;
  }
  public function getRedacted()
  {
    return $this->redacted;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1DocumentTextAnchor
   */
  public function setTextAnchor(Google_Service_Document_GoogleCloudDocumentaiV1DocumentTextAnchor $textAnchor)
  {
    $this->textAnchor = $textAnchor;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1DocumentTextAnchor
   */
  public function getTextAnchor()
  {
    return $this->textAnchor;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
