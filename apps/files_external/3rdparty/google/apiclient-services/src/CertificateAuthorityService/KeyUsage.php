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

namespace Google\Service\CertificateAuthorityService;

class KeyUsage extends \Google\Collection
{
  protected $collection_key = 'unknownExtendedKeyUsages';
  protected $baseKeyUsageType = KeyUsageOptions::class;
  protected $baseKeyUsageDataType = '';
  protected $extendedKeyUsageType = ExtendedKeyUsageOptions::class;
  protected $extendedKeyUsageDataType = '';
  protected $unknownExtendedKeyUsagesType = ObjectId::class;
  protected $unknownExtendedKeyUsagesDataType = 'array';

  /**
   * @param KeyUsageOptions
   */
  public function setBaseKeyUsage(KeyUsageOptions $baseKeyUsage)
  {
    $this->baseKeyUsage = $baseKeyUsage;
  }
  /**
   * @return KeyUsageOptions
   */
  public function getBaseKeyUsage()
  {
    return $this->baseKeyUsage;
  }
  /**
   * @param ExtendedKeyUsageOptions
   */
  public function setExtendedKeyUsage(ExtendedKeyUsageOptions $extendedKeyUsage)
  {
    $this->extendedKeyUsage = $extendedKeyUsage;
  }
  /**
   * @return ExtendedKeyUsageOptions
   */
  public function getExtendedKeyUsage()
  {
    return $this->extendedKeyUsage;
  }
  /**
   * @param ObjectId[]
   */
  public function setUnknownExtendedKeyUsages($unknownExtendedKeyUsages)
  {
    $this->unknownExtendedKeyUsages = $unknownExtendedKeyUsages;
  }
  /**
   * @return ObjectId[]
   */
  public function getUnknownExtendedKeyUsages()
  {
    return $this->unknownExtendedKeyUsages;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KeyUsage::class, 'Google_Service_CertificateAuthorityService_KeyUsage');
