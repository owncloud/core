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

namespace Google\Service\AndroidPublisher;

class GeneratedApksPerSigningKey extends \Google\Collection
{
  protected $collection_key = 'generatedStandaloneApks';
  /**
   * @var string
   */
  public $certificateSha256Hash;
  protected $generatedAssetPackSlicesType = GeneratedAssetPackSlice::class;
  protected $generatedAssetPackSlicesDataType = 'array';
  protected $generatedSplitApksType = GeneratedSplitApk::class;
  protected $generatedSplitApksDataType = 'array';
  protected $generatedStandaloneApksType = GeneratedStandaloneApk::class;
  protected $generatedStandaloneApksDataType = 'array';
  protected $generatedUniversalApkType = GeneratedUniversalApk::class;
  protected $generatedUniversalApkDataType = '';

  /**
   * @param string
   */
  public function setCertificateSha256Hash($certificateSha256Hash)
  {
    $this->certificateSha256Hash = $certificateSha256Hash;
  }
  /**
   * @return string
   */
  public function getCertificateSha256Hash()
  {
    return $this->certificateSha256Hash;
  }
  /**
   * @param GeneratedAssetPackSlice[]
   */
  public function setGeneratedAssetPackSlices($generatedAssetPackSlices)
  {
    $this->generatedAssetPackSlices = $generatedAssetPackSlices;
  }
  /**
   * @return GeneratedAssetPackSlice[]
   */
  public function getGeneratedAssetPackSlices()
  {
    return $this->generatedAssetPackSlices;
  }
  /**
   * @param GeneratedSplitApk[]
   */
  public function setGeneratedSplitApks($generatedSplitApks)
  {
    $this->generatedSplitApks = $generatedSplitApks;
  }
  /**
   * @return GeneratedSplitApk[]
   */
  public function getGeneratedSplitApks()
  {
    return $this->generatedSplitApks;
  }
  /**
   * @param GeneratedStandaloneApk[]
   */
  public function setGeneratedStandaloneApks($generatedStandaloneApks)
  {
    $this->generatedStandaloneApks = $generatedStandaloneApks;
  }
  /**
   * @return GeneratedStandaloneApk[]
   */
  public function getGeneratedStandaloneApks()
  {
    return $this->generatedStandaloneApks;
  }
  /**
   * @param GeneratedUniversalApk
   */
  public function setGeneratedUniversalApk(GeneratedUniversalApk $generatedUniversalApk)
  {
    $this->generatedUniversalApk = $generatedUniversalApk;
  }
  /**
   * @return GeneratedUniversalApk
   */
  public function getGeneratedUniversalApk()
  {
    return $this->generatedUniversalApk;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeneratedApksPerSigningKey::class, 'Google_Service_AndroidPublisher_GeneratedApksPerSigningKey');
