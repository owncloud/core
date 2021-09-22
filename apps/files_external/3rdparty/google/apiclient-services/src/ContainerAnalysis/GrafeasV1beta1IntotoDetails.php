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

namespace Google\Service\ContainerAnalysis;

class GrafeasV1beta1IntotoDetails extends \Google\Collection
{
  protected $collection_key = 'signatures';
  protected $signaturesType = GrafeasV1beta1IntotoSignature::class;
  protected $signaturesDataType = 'array';
  protected $signedType = Link::class;
  protected $signedDataType = '';

  /**
   * @param GrafeasV1beta1IntotoSignature[]
   */
  public function setSignatures($signatures)
  {
    $this->signatures = $signatures;
  }
  /**
   * @return GrafeasV1beta1IntotoSignature[]
   */
  public function getSignatures()
  {
    return $this->signatures;
  }
  /**
   * @param Link
   */
  public function setSigned(Link $signed)
  {
    $this->signed = $signed;
  }
  /**
   * @return Link
   */
  public function getSigned()
  {
    return $this->signed;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GrafeasV1beta1IntotoDetails::class, 'Google_Service_ContainerAnalysis_GrafeasV1beta1IntotoDetails');
