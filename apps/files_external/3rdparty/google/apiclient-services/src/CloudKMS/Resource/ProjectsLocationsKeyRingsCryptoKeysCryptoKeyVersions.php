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

namespace Google\Service\CloudKMS\Resource;

use Google\Service\CloudKMS\AsymmetricDecryptRequest;
use Google\Service\CloudKMS\AsymmetricDecryptResponse;
use Google\Service\CloudKMS\AsymmetricSignRequest;
use Google\Service\CloudKMS\AsymmetricSignResponse;
use Google\Service\CloudKMS\CryptoKeyVersion;
use Google\Service\CloudKMS\DestroyCryptoKeyVersionRequest;
use Google\Service\CloudKMS\ImportCryptoKeyVersionRequest;
use Google\Service\CloudKMS\ListCryptoKeyVersionsResponse;
use Google\Service\CloudKMS\MacSignRequest;
use Google\Service\CloudKMS\MacSignResponse;
use Google\Service\CloudKMS\MacVerifyRequest;
use Google\Service\CloudKMS\MacVerifyResponse;
use Google\Service\CloudKMS\PublicKey;
use Google\Service\CloudKMS\RestoreCryptoKeyVersionRequest;

/**
 * The "cryptoKeyVersions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudkmsService = new Google\Service\CloudKMS(...);
 *   $cryptoKeyVersions = $cloudkmsService->cryptoKeyVersions;
 *  </code>
 */
class ProjectsLocationsKeyRingsCryptoKeysCryptoKeyVersions extends \Google\Service\Resource
{
  /**
   * Decrypts data that was encrypted with a public key retrieved from
   * GetPublicKey corresponding to a CryptoKeyVersion with CryptoKey.purpose
   * ASYMMETRIC_DECRYPT. (cryptoKeyVersions.asymmetricDecrypt)
   *
   * @param string $name Required. The resource name of the CryptoKeyVersion to
   * use for decryption.
   * @param AsymmetricDecryptRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AsymmetricDecryptResponse
   */
  public function asymmetricDecrypt($name, AsymmetricDecryptRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('asymmetricDecrypt', [$params], AsymmetricDecryptResponse::class);
  }
  /**
   * Signs data using a CryptoKeyVersion with CryptoKey.purpose ASYMMETRIC_SIGN,
   * producing a signature that can be verified with the public key retrieved from
   * GetPublicKey. (cryptoKeyVersions.asymmetricSign)
   *
   * @param string $name Required. The resource name of the CryptoKeyVersion to
   * use for signing.
   * @param AsymmetricSignRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AsymmetricSignResponse
   */
  public function asymmetricSign($name, AsymmetricSignRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('asymmetricSign', [$params], AsymmetricSignResponse::class);
  }
  /**
   * Create a new CryptoKeyVersion in a CryptoKey. The server will assign the next
   * sequential id. If unset, state will be set to ENABLED.
   * (cryptoKeyVersions.create)
   *
   * @param string $parent Required. The name of the CryptoKey associated with the
   * CryptoKeyVersions.
   * @param CryptoKeyVersion $postBody
   * @param array $optParams Optional parameters.
   * @return CryptoKeyVersion
   */
  public function create($parent, CryptoKeyVersion $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], CryptoKeyVersion::class);
  }
  /**
   * Schedule a CryptoKeyVersion for destruction. Upon calling this method,
   * CryptoKeyVersion.state will be set to DESTROY_SCHEDULED, and destroy_time
   * will be set to the time destroy_scheduled_duration in the future. At that
   * time, the state will automatically change to DESTROYED, and the key material
   * will be irrevocably destroyed. Before the destroy_time is reached,
   * RestoreCryptoKeyVersion may be called to reverse the process.
   * (cryptoKeyVersions.destroy)
   *
   * @param string $name Required. The resource name of the CryptoKeyVersion to
   * destroy.
   * @param DestroyCryptoKeyVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CryptoKeyVersion
   */
  public function destroy($name, DestroyCryptoKeyVersionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('destroy', [$params], CryptoKeyVersion::class);
  }
  /**
   * Returns metadata for a given CryptoKeyVersion. (cryptoKeyVersions.get)
   *
   * @param string $name Required. The name of the CryptoKeyVersion to get.
   * @param array $optParams Optional parameters.
   * @return CryptoKeyVersion
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], CryptoKeyVersion::class);
  }
  /**
   * Returns the public key for the given CryptoKeyVersion. The CryptoKey.purpose
   * must be ASYMMETRIC_SIGN or ASYMMETRIC_DECRYPT.
   * (cryptoKeyVersions.getPublicKey)
   *
   * @param string $name Required. The name of the CryptoKeyVersion public key to
   * get.
   * @param array $optParams Optional parameters.
   * @return PublicKey
   */
  public function getPublicKey($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getPublicKey', [$params], PublicKey::class);
  }
  /**
   * Import wrapped key material into a CryptoKeyVersion. All requests must
   * specify a CryptoKey. If a CryptoKeyVersion is additionally specified in the
   * request, key material will be reimported into that version. Otherwise, a new
   * version will be created, and will be assigned the next sequential id within
   * the CryptoKey. (cryptoKeyVersions.import)
   *
   * @param string $parent Required. The name of the CryptoKey to be imported
   * into. The create permission is only required on this key when creating a new
   * CryptoKeyVersion.
   * @param ImportCryptoKeyVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CryptoKeyVersion
   */
  public function import($parent, ImportCryptoKeyVersionRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('import', [$params], CryptoKeyVersion::class);
  }
  /**
   * Lists CryptoKeyVersions.
   * (cryptoKeyVersions.listProjectsLocationsKeyRingsCryptoKeysCryptoKeyVersions)
   *
   * @param string $parent Required. The resource name of the CryptoKey to list,
   * in the format `projects/locations/keyRings/cryptoKeys`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Only include resources that match the
   * filter in the response. For more information, see [Sorting and filtering list
   * results](https://cloud.google.com/kms/docs/sorting-and-filtering).
   * @opt_param string orderBy Optional. Specify how the results should be sorted.
   * If not specified, the results will be sorted in the default order. For more
   * information, see [Sorting and filtering list
   * results](https://cloud.google.com/kms/docs/sorting-and-filtering).
   * @opt_param int pageSize Optional. Optional limit on the number of
   * CryptoKeyVersions to include in the response. Further CryptoKeyVersions can
   * subsequently be obtained by including the
   * ListCryptoKeyVersionsResponse.next_page_token in a subsequent request. If
   * unspecified, the server will pick an appropriate default.
   * @opt_param string pageToken Optional. Optional pagination token, returned
   * earlier via ListCryptoKeyVersionsResponse.next_page_token.
   * @opt_param string view The fields to include in the response.
   * @return ListCryptoKeyVersionsResponse
   */
  public function listProjectsLocationsKeyRingsCryptoKeysCryptoKeyVersions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCryptoKeyVersionsResponse::class);
  }
  /**
   * Signs data using a CryptoKeyVersion with CryptoKey.purpose MAC, producing a
   * tag that can be verified by another source with the same key.
   * (cryptoKeyVersions.macSign)
   *
   * @param string $name Required. The resource name of the CryptoKeyVersion to
   * use for signing.
   * @param MacSignRequest $postBody
   * @param array $optParams Optional parameters.
   * @return MacSignResponse
   */
  public function macSign($name, MacSignRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('macSign', [$params], MacSignResponse::class);
  }
  /**
   * Verifies MAC tag using a CryptoKeyVersion with CryptoKey.purpose MAC, and
   * returns a response that indicates whether or not the verification was
   * successful. (cryptoKeyVersions.macVerify)
   *
   * @param string $name Required. The resource name of the CryptoKeyVersion to
   * use for verification.
   * @param MacVerifyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return MacVerifyResponse
   */
  public function macVerify($name, MacVerifyRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('macVerify', [$params], MacVerifyResponse::class);
  }
  /**
   * Update a CryptoKeyVersion's metadata. state may be changed between ENABLED
   * and DISABLED using this method. See DestroyCryptoKeyVersion and
   * RestoreCryptoKeyVersion to move between other states.
   * (cryptoKeyVersions.patch)
   *
   * @param string $name Output only. The resource name for this CryptoKeyVersion
   * in the format `projects/locations/keyRings/cryptoKeys/cryptoKeyVersions`.
   * @param CryptoKeyVersion $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. List of fields to be updated in this
   * request.
   * @return CryptoKeyVersion
   */
  public function patch($name, CryptoKeyVersion $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], CryptoKeyVersion::class);
  }
  /**
   * Restore a CryptoKeyVersion in the DESTROY_SCHEDULED state. Upon restoration
   * of the CryptoKeyVersion, state will be set to DISABLED, and destroy_time will
   * be cleared. (cryptoKeyVersions.restore)
   *
   * @param string $name Required. The resource name of the CryptoKeyVersion to
   * restore.
   * @param RestoreCryptoKeyVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CryptoKeyVersion
   */
  public function restore($name, RestoreCryptoKeyVersionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('restore', [$params], CryptoKeyVersion::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsKeyRingsCryptoKeysCryptoKeyVersions::class, 'Google_Service_CloudKMS_Resource_ProjectsLocationsKeyRingsCryptoKeysCryptoKeyVersions');
