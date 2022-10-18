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

namespace Google\Service\CloudSearch;

class EmbedClientItem extends \Google\Collection
{
  protected $collection_key = 'type';
  /**
   * @var string
   */
  public $canonicalId;
  protected $deepLinkDataType = DeepLinkData::class;
  protected $deepLinkDataDataType = '';
  /**
   * @var string
   */
  public $id;
  protected $provenanceType = Provenance::class;
  protected $provenanceDataType = '';
  /**
   * @var string
   */
  public $renderId;
  /**
   * @var string
   */
  public $signature;
  protected $transientDataType = TransientData::class;
  protected $transientDataDataType = '';
  /**
   * @var string[]
   */
  public $type;

  /**
   * @param string
   */
  public function setCanonicalId($canonicalId)
  {
    $this->canonicalId = $canonicalId;
  }
  /**
   * @return string
   */
  public function getCanonicalId()
  {
    return $this->canonicalId;
  }
  /**
   * @param DeepLinkData
   */
  public function setDeepLinkData(DeepLinkData $deepLinkData)
  {
    $this->deepLinkData = $deepLinkData;
  }
  /**
   * @return DeepLinkData
   */
  public function getDeepLinkData()
  {
    return $this->deepLinkData;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Provenance
   */
  public function setProvenance(Provenance $provenance)
  {
    $this->provenance = $provenance;
  }
  /**
   * @return Provenance
   */
  public function getProvenance()
  {
    return $this->provenance;
  }
  /**
   * @param string
   */
  public function setRenderId($renderId)
  {
    $this->renderId = $renderId;
  }
  /**
   * @return string
   */
  public function getRenderId()
  {
    return $this->renderId;
  }
  /**
   * @param string
   */
  public function setSignature($signature)
  {
    $this->signature = $signature;
  }
  /**
   * @return string
   */
  public function getSignature()
  {
    return $this->signature;
  }
  /**
   * @param TransientData
   */
  public function setTransientData(TransientData $transientData)
  {
    $this->transientData = $transientData;
  }
  /**
   * @return TransientData
   */
  public function getTransientData()
  {
    return $this->transientData;
  }
  /**
   * @param string[]
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string[]
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EmbedClientItem::class, 'Google_Service_CloudSearch_EmbedClientItem');
