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

namespace Google\Service\IAMCredentials\Resource;

use Google\Service\IAMCredentials\GenerateAccessTokenRequest;
use Google\Service\IAMCredentials\GenerateAccessTokenResponse;
use Google\Service\IAMCredentials\GenerateIdTokenRequest;
use Google\Service\IAMCredentials\GenerateIdTokenResponse;
use Google\Service\IAMCredentials\SignBlobRequest;
use Google\Service\IAMCredentials\SignBlobResponse;
use Google\Service\IAMCredentials\SignJwtRequest;
use Google\Service\IAMCredentials\SignJwtResponse;

/**
 * The "serviceAccounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $iamcredentialsService = new Google\Service\IAMCredentials(...);
 *   $serviceAccounts = $iamcredentialsService->serviceAccounts;
 *  </code>
 */
class ProjectsServiceAccounts extends \Google\Service\Resource
{
  /**
   * Generates an OAuth 2.0 access token for a service account.
   * (serviceAccounts.generateAccessToken)
   *
   * @param string $name Required. The resource name of the service account for
   * which the credentials are requested, in the following format:
   * `projects/-/serviceAccounts/{ACCOUNT_EMAIL_OR_UNIQUEID}`. The `-` wildcard
   * character is required; replacing it with a project ID is invalid.
   * @param GenerateAccessTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GenerateAccessTokenResponse
   */
  public function generateAccessToken($name, GenerateAccessTokenRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('generateAccessToken', [$params], GenerateAccessTokenResponse::class);
  }
  /**
   * Generates an OpenID Connect ID token for a service account.
   * (serviceAccounts.generateIdToken)
   *
   * @param string $name Required. The resource name of the service account for
   * which the credentials are requested, in the following format:
   * `projects/-/serviceAccounts/{ACCOUNT_EMAIL_OR_UNIQUEID}`. The `-` wildcard
   * character is required; replacing it with a project ID is invalid.
   * @param GenerateIdTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GenerateIdTokenResponse
   */
  public function generateIdToken($name, GenerateIdTokenRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('generateIdToken', [$params], GenerateIdTokenResponse::class);
  }
  /**
   * Signs a blob using a service account's system-managed private key.
   * (serviceAccounts.signBlob)
   *
   * @param string $name Required. The resource name of the service account for
   * which the credentials are requested, in the following format:
   * `projects/-/serviceAccounts/{ACCOUNT_EMAIL_OR_UNIQUEID}`. The `-` wildcard
   * character is required; replacing it with a project ID is invalid.
   * @param SignBlobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SignBlobResponse
   */
  public function signBlob($name, SignBlobRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('signBlob', [$params], SignBlobResponse::class);
  }
  /**
   * Signs a JWT using a service account's system-managed private key.
   * (serviceAccounts.signJwt)
   *
   * @param string $name Required. The resource name of the service account for
   * which the credentials are requested, in the following format:
   * `projects/-/serviceAccounts/{ACCOUNT_EMAIL_OR_UNIQUEID}`. The `-` wildcard
   * character is required; replacing it with a project ID is invalid.
   * @param SignJwtRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SignJwtResponse
   */
  public function signJwt($name, SignJwtRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('signJwt', [$params], SignJwtResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsServiceAccounts::class, 'Google_Service_IAMCredentials_Resource_ProjectsServiceAccounts');
