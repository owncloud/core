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

namespace Google\Service\Container;

class GetOpenIDConfigResponse extends \Google\Collection
{
  protected $collection_key = 'subject_types_supported';
  protected $internal_gapi_mappings = [
        "claimsSupported" => "claims_supported",
        "grantTypes" => "grant_types",
        "idTokenSigningAlgValuesSupported" => "id_token_signing_alg_values_supported",
        "jwksUri" => "jwks_uri",
        "responseTypesSupported" => "response_types_supported",
        "subjectTypesSupported" => "subject_types_supported",
  ];
  protected $cacheHeaderType = HttpCacheControlResponseHeader::class;
  protected $cacheHeaderDataType = '';
  public $claimsSupported;
  public $grantTypes;
  public $idTokenSigningAlgValuesSupported;
  public $issuer;
  public $jwksUri;
  public $responseTypesSupported;
  public $subjectTypesSupported;

  /**
   * @param HttpCacheControlResponseHeader
   */
  public function setCacheHeader(HttpCacheControlResponseHeader $cacheHeader)
  {
    $this->cacheHeader = $cacheHeader;
  }
  /**
   * @return HttpCacheControlResponseHeader
   */
  public function getCacheHeader()
  {
    return $this->cacheHeader;
  }
  public function setClaimsSupported($claimsSupported)
  {
    $this->claimsSupported = $claimsSupported;
  }
  public function getClaimsSupported()
  {
    return $this->claimsSupported;
  }
  public function setGrantTypes($grantTypes)
  {
    $this->grantTypes = $grantTypes;
  }
  public function getGrantTypes()
  {
    return $this->grantTypes;
  }
  public function setIdTokenSigningAlgValuesSupported($idTokenSigningAlgValuesSupported)
  {
    $this->idTokenSigningAlgValuesSupported = $idTokenSigningAlgValuesSupported;
  }
  public function getIdTokenSigningAlgValuesSupported()
  {
    return $this->idTokenSigningAlgValuesSupported;
  }
  public function setIssuer($issuer)
  {
    $this->issuer = $issuer;
  }
  public function getIssuer()
  {
    return $this->issuer;
  }
  public function setJwksUri($jwksUri)
  {
    $this->jwksUri = $jwksUri;
  }
  public function getJwksUri()
  {
    return $this->jwksUri;
  }
  public function setResponseTypesSupported($responseTypesSupported)
  {
    $this->responseTypesSupported = $responseTypesSupported;
  }
  public function getResponseTypesSupported()
  {
    return $this->responseTypesSupported;
  }
  public function setSubjectTypesSupported($subjectTypesSupported)
  {
    $this->subjectTypesSupported = $subjectTypesSupported;
  }
  public function getSubjectTypesSupported()
  {
    return $this->subjectTypesSupported;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GetOpenIDConfigResponse::class, 'Google_Service_Container_GetOpenIDConfigResponse');
