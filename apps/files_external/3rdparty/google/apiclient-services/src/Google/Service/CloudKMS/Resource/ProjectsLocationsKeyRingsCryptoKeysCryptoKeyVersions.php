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

/**
 * The "cryptoKeyVersions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudkmsService = new Google_Service_CloudKMS(...);
 *   $cryptoKeyVersions = $cloudkmsService->cryptoKeyVersions;
 *  </code>
 */
class Google_Service_CloudKMS_Resource_ProjectsLocationsKeyRingsCryptoKeysCryptoKeyVersions extends Google_Service_Resource
{
  /**
   * Decrypts data that was encrypted with a public key retrieved from
   * GetPublicKey corresponding to a CryptoKeyVersion with CryptoKey.purpose
   * ASYMMETRIC_DECRYPT. (cryptoKeyVersions.asymmetricDecrypt)
   *
   * @param string $name Required. The resource name of the CryptoKeyVersion to
   * use for decryption.
   * @param Google_Service_CloudKMS_AsymmetricDecryptRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_AsymmetricDecryptResponse
   */
  public function asymmetricDecrypt($name, Google_Service_CloudKMS_AsymmetricDecryptRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('asymmetricDecrypt', array($params), "Google_Service_CloudKMS_AsymmetricDecryptResponse");
  }
  /**
   * Signs data using a CryptoKeyVersion with CryptoKey.purpose ASYMMETRIC_SIGN,
   * producing a signature that can be verified with the public key retrieved from
   * GetPublicKey. (cryptoKeyVersions.asymmetricSign)
   *
   * @param string $name Required. The resource name of the CryptoKeyVersion to
   * use for signing.
   * @param Google_Service_CloudKMS_AsymmetricSignRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_AsymmetricSignResponse
   */
  public function asymmetricSign($name, Google_Service_CloudKMS_AsymmetricSignRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('asymmetricSign', array($params), "Google_Service_CloudKMS_AsymmetricSignResponse");
  }
  /**
   * Create a new CryptoKeyVersion in a CryptoKey.
   *
   * The server will assign the next sequential id. If unset, state will be set to
   * ENABLED. (cryptoKeyVersions.create)
   *
   * @param string $parent Required. The name of the CryptoKey associated with the
   * CryptoKeyVersions.
   * @param Google_Service_CloudKMS_CryptoKeyVersion $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_CryptoKeyVersion
   */
  public function create($parent, Google_Service_CloudKMS_CryptoKeyVersion $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudKMS_CryptoKeyVersion");
  }
  /**
   * Schedule a CryptoKeyVersion for destruction.
   *
   * Upon calling this method, CryptoKeyVersion.state will be set to
   * DESTROY_SCHEDULED and destroy_time will be set to a time 24 hours in the
   * future, at which point the state will be changed to DESTROYED, and the key
   * material will be irrevocably destroyed.
   *
   * Before the destroy_time is reached, RestoreCryptoKeyVersion may be called to
   * reverse the process. (cryptoKeyVersions.destroy)
   *
   * @param string $name Required. The resource name of the CryptoKeyVersion to
   * destroy.
   * @param Google_Service_CloudKMS_DestroyCryptoKeyVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_CryptoKeyVersion
   */
  public function destroy($name, Google_Service_CloudKMS_DestroyCryptoKeyVersionRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('destroy', array($params), "Google_Service_CloudKMS_CryptoKeyVersion");
  }
  /**
   * Returns metadata for a given CryptoKeyVersion. (cryptoKeyVersions.get)
   *
   * @param string $name Required. The name of the CryptoKeyVersion to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_CryptoKeyVersion
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudKMS_CryptoKeyVersion");
  }
  /**
   * Returns the public key for the given CryptoKeyVersion. The CryptoKey.purpose
   * must be ASYMMETRIC_SIGN or ASYMMETRIC_DECRYPT.
   * (cryptoKeyVersions.getPublicKey)
   *
   * @param string $name Required. The name of the CryptoKeyVersion public key to
   * get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_PublicKey
   */
  public function getPublicKey($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getPublicKey', array($params), "Google_Service_CloudKMS_PublicKey");
  }
  /**
   * Imports a new CryptoKeyVersion into an existing CryptoKey using the wrapped
   * key material provided in the request.
   *
   * The version ID will be assigned the next sequential id within the CryptoKey.
   * (cryptoKeyVersions.import)
   *
   * @param string $parent Required. The name of the CryptoKey to be imported
   * into.
   * @param Google_Service_CloudKMS_ImportCryptoKeyVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_CryptoKeyVersion
   */
  public function import($parent, Google_Service_CloudKMS_ImportCryptoKeyVersionRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_CloudKMS_CryptoKeyVersion");
  }
  /**
   * Lists CryptoKeyVersions.
   * (cryptoKeyVersions.listProjectsLocationsKeyRingsCryptoKeysCryptoKeyVersions)
   *
   * @param string $parent Required. The resource name of the CryptoKey to list,
   * in the format `projects/locations/keyRings/cryptoKeys`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy Optional. Specify how the results should be sorted.
   * If not specified, the results will be sorted in the default order. For more
   * information, see [Sorting and filtering list
   * results](https://cloud.google.com/kms/docs/sorting-and-filtering).
   * @opt_param string filter Optional. Only include resources that match the
   * filter in the response. For more information, see [Sorting and filtering list
   * results](https://cloud.google.com/kms/docs/sorting-and-filtering).
   * @opt_param string pageToken Optional. Optional pagination token, returned
   * earlier via ListCryptoKeyVersionsResponse.next_page_token.
   * @opt_param int pageSize Optional. Optional limit on the number of
   * CryptoKeyVersions to include in the response. Further CryptoKeyVersions can
   * subsequently be obtained by including the
   * ListCryptoKeyVersionsResponse.next_page_token in a subsequent request. If
   * unspecified, the server will pick an appropriate default.
   * @opt_param string view The fields to include in the response.
   * @return Google_Service_CloudKMS_ListCryptoKeyVersionsResponse
   */
  public function listProjectsLocationsKeyRingsCryptoKeysCryptoKeyVersions($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudKMS_ListCryptoKeyVersionsResponse");
  }
  /**
   * Update a CryptoKeyVersion's metadata.
   *
   * state may be changed between ENABLED and DISABLED using this method. See
   * DestroyCryptoKeyVersion and RestoreCryptoKeyVersion to move between other
   * states. (cryptoKeyVersions.patch)
   *
   * @param string $name Output only. The resource name for this CryptoKeyVersion
   * in the format `projects/locations/keyRings/cryptoKeys/cryptoKeyVersions`.
   * @param Google_Service_CloudKMS_CryptoKeyVersion $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. List of fields to be updated in this
   * request.
   * @return Google_Service_CloudKMS_CryptoKeyVersion
   */
  public function patch($name, Google_Service_CloudKMS_CryptoKeyVersion $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudKMS_CryptoKeyVersion");
  }
  /**
   * Restore a CryptoKeyVersion in the DESTROY_SCHEDULED state.
   *
   * Upon restoration of the CryptoKeyVersion, state will be set to DISABLED, and
   * destroy_time will be cleared. (cryptoKeyVersions.restore)
   *
   * @param string $name Required. The resource name of the CryptoKeyVersion to
   * restore.
   * @param Google_Service_CloudKMS_RestoreCryptoKeyVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudKMS_CryptoKeyVersion
   */
  public function restore($name, Google_Service_CloudKMS_RestoreCryptoKeyVersionRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('restore', array($params), "Google_Service_CloudKMS_CryptoKeyVersion");
  }
}
