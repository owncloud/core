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

namespace Google\Service\Safebrowsing;

class GoogleSecuritySafebrowsingV4ThreatEntrySet extends \Google\Model
{
  /**
   * @var string
   */
  public $compressionType;
  protected $rawHashesType = GoogleSecuritySafebrowsingV4RawHashes::class;
  protected $rawHashesDataType = '';
  protected $rawIndicesType = GoogleSecuritySafebrowsingV4RawIndices::class;
  protected $rawIndicesDataType = '';
  protected $riceHashesType = GoogleSecuritySafebrowsingV4RiceDeltaEncoding::class;
  protected $riceHashesDataType = '';
  protected $riceIndicesType = GoogleSecuritySafebrowsingV4RiceDeltaEncoding::class;
  protected $riceIndicesDataType = '';

  /**
   * @param string
   */
  public function setCompressionType($compressionType)
  {
    $this->compressionType = $compressionType;
  }
  /**
   * @return string
   */
  public function getCompressionType()
  {
    return $this->compressionType;
  }
  /**
   * @param GoogleSecuritySafebrowsingV4RawHashes
   */
  public function setRawHashes(GoogleSecuritySafebrowsingV4RawHashes $rawHashes)
  {
    $this->rawHashes = $rawHashes;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4RawHashes
   */
  public function getRawHashes()
  {
    return $this->rawHashes;
  }
  /**
   * @param GoogleSecuritySafebrowsingV4RawIndices
   */
  public function setRawIndices(GoogleSecuritySafebrowsingV4RawIndices $rawIndices)
  {
    $this->rawIndices = $rawIndices;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4RawIndices
   */
  public function getRawIndices()
  {
    return $this->rawIndices;
  }
  /**
   * @param GoogleSecuritySafebrowsingV4RiceDeltaEncoding
   */
  public function setRiceHashes(GoogleSecuritySafebrowsingV4RiceDeltaEncoding $riceHashes)
  {
    $this->riceHashes = $riceHashes;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4RiceDeltaEncoding
   */
  public function getRiceHashes()
  {
    return $this->riceHashes;
  }
  /**
   * @param GoogleSecuritySafebrowsingV4RiceDeltaEncoding
   */
  public function setRiceIndices(GoogleSecuritySafebrowsingV4RiceDeltaEncoding $riceIndices)
  {
    $this->riceIndices = $riceIndices;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4RiceDeltaEncoding
   */
  public function getRiceIndices()
  {
    return $this->riceIndices;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleSecuritySafebrowsingV4ThreatEntrySet::class, 'Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ThreatEntrySet');
