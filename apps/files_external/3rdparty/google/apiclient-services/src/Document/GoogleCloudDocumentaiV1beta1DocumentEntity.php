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

class GoogleCloudDocumentaiV1beta1DocumentEntity extends \Google\Collection
{
  protected $collection_key = 'properties';
  public $confidence;
  public $id;
  public $mentionId;
  public $mentionText;
  protected $normalizedValueType = GoogleCloudDocumentaiV1beta1DocumentEntityNormalizedValue::class;
  protected $normalizedValueDataType = '';
  protected $pageAnchorType = GoogleCloudDocumentaiV1beta1DocumentPageAnchor::class;
  protected $pageAnchorDataType = '';
  protected $propertiesType = GoogleCloudDocumentaiV1beta1DocumentEntity::class;
  protected $propertiesDataType = 'array';
  protected $provenanceType = GoogleCloudDocumentaiV1beta1DocumentProvenance::class;
  protected $provenanceDataType = '';
  public $redacted;
  protected $textAnchorType = GoogleCloudDocumentaiV1beta1DocumentTextAnchor::class;
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
   * @param GoogleCloudDocumentaiV1beta1DocumentEntityNormalizedValue
   */
  public function setNormalizedValue(GoogleCloudDocumentaiV1beta1DocumentEntityNormalizedValue $normalizedValue)
  {
    $this->normalizedValue = $normalizedValue;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentEntityNormalizedValue
   */
  public function getNormalizedValue()
  {
    return $this->normalizedValue;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentPageAnchor
   */
  public function setPageAnchor(GoogleCloudDocumentaiV1beta1DocumentPageAnchor $pageAnchor)
  {
    $this->pageAnchor = $pageAnchor;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentPageAnchor
   */
  public function getPageAnchor()
  {
    return $this->pageAnchor;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentEntity[]
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentEntity[]
   */
  public function getProperties()
  {
    return $this->properties;
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
  public function setRedacted($redacted)
  {
    $this->redacted = $redacted;
  }
  public function getRedacted()
  {
    return $this->redacted;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentTextAnchor
   */
  public function setTextAnchor(GoogleCloudDocumentaiV1beta1DocumentTextAnchor $textAnchor)
  {
    $this->textAnchor = $textAnchor;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentTextAnchor
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1beta1DocumentEntity::class, 'Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentEntity');
