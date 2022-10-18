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

namespace Google\Service\Contentwarehouse;

class CompositeDocIncludedContent extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "sourceTypeBitfield" => "SourceTypeBitfield",
  ];
  /**
   * @var string
   */
  public $sourceTypeBitfield;
  protected $includedDocType = GDocumentBase::class;
  protected $includedDocDataType = '';
  /**
   * @var string
   */
  public $linkUrl;
  protected $perDocDataType = PerDocData::class;
  protected $perDocDataDataType = '';
  protected $propertiesType = DocProperties::class;
  protected $propertiesDataType = '';

  /**
   * @param string
   */
  public function setSourceTypeBitfield($sourceTypeBitfield)
  {
    $this->sourceTypeBitfield = $sourceTypeBitfield;
  }
  /**
   * @return string
   */
  public function getSourceTypeBitfield()
  {
    return $this->sourceTypeBitfield;
  }
  /**
   * @param GDocumentBase
   */
  public function setIncludedDoc(GDocumentBase $includedDoc)
  {
    $this->includedDoc = $includedDoc;
  }
  /**
   * @return GDocumentBase
   */
  public function getIncludedDoc()
  {
    return $this->includedDoc;
  }
  /**
   * @param string
   */
  public function setLinkUrl($linkUrl)
  {
    $this->linkUrl = $linkUrl;
  }
  /**
   * @return string
   */
  public function getLinkUrl()
  {
    return $this->linkUrl;
  }
  /**
   * @param PerDocData
   */
  public function setPerDocData(PerDocData $perDocData)
  {
    $this->perDocData = $perDocData;
  }
  /**
   * @return PerDocData
   */
  public function getPerDocData()
  {
    return $this->perDocData;
  }
  /**
   * @param DocProperties
   */
  public function setProperties(DocProperties $properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return DocProperties
   */
  public function getProperties()
  {
    return $this->properties;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CompositeDocIncludedContent::class, 'Google_Service_Contentwarehouse_CompositeDocIncludedContent');
