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

namespace Google\Service\IdentityToolkit\Resource;

use Google\Service\IdentityToolkit\CreateAuthUriResponse;
use Google\Service\IdentityToolkit\DeleteAccountResponse;
use Google\Service\IdentityToolkit\DownloadAccountResponse;
use Google\Service\IdentityToolkit\EmailLinkSigninResponse;
use Google\Service\IdentityToolkit\GetAccountInfoResponse;
use Google\Service\IdentityToolkit\GetOobConfirmationCodeResponse;
use Google\Service\IdentityToolkit\GetRecaptchaParamResponse;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartyCreateAuthUriRequest;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartyDeleteAccountRequest;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartyDownloadAccountRequest;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartyEmailLinkSigninRequest;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartyGetAccountInfoRequest;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartyGetProjectConfigResponse;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartyGetPublicKeysResponse;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartyResetPasswordRequest;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartySendVerificationCodeRequest;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartySendVerificationCodeResponse;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartySetAccountInfoRequest;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartySetProjectConfigRequest;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartySetProjectConfigResponse;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartySignOutUserRequest;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartySignOutUserResponse;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartySignupNewUserRequest;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartyUploadAccountRequest;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartyVerifyAssertionRequest;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartyVerifyCustomTokenRequest;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartyVerifyPasswordRequest;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartyVerifyPhoneNumberRequest;
use Google\Service\IdentityToolkit\IdentitytoolkitRelyingpartyVerifyPhoneNumberResponse;
use Google\Service\IdentityToolkit\Relyingparty as RelyingpartyModel;
use Google\Service\IdentityToolkit\ResetPasswordResponse;
use Google\Service\IdentityToolkit\SetAccountInfoResponse;
use Google\Service\IdentityToolkit\SignupNewUserResponse;
use Google\Service\IdentityToolkit\UploadAccountResponse;
use Google\Service\IdentityToolkit\VerifyAssertionResponse;
use Google\Service\IdentityToolkit\VerifyCustomTokenResponse;
use Google\Service\IdentityToolkit\VerifyPasswordResponse;

/**
 * The "relyingparty" collection of methods.
 * Typical usage is:
 *  <code>
 *   $identitytoolkitService = new Google\Service\IdentityToolkit(...);
 *   $relyingparty = $identitytoolkitService->relyingparty;
 *  </code>
 */
class Relyingparty extends \Google\Service\Resource
{
  /**
   * Creates the URI used by the IdP to authenticate the user.
   * (relyingparty.createAuthUri)
   *
   * @param IdentitytoolkitRelyingpartyCreateAuthUriRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CreateAuthUriResponse
   */
  public function createAuthUri(IdentitytoolkitRelyingpartyCreateAuthUriRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('createAuthUri', [$params], CreateAuthUriResponse::class);
  }
  /**
   * Delete user account. (relyingparty.deleteAccount)
   *
   * @param IdentitytoolkitRelyingpartyDeleteAccountRequest $postBody
   * @param array $optParams Optional parameters.
   * @return DeleteAccountResponse
   */
  public function deleteAccount(IdentitytoolkitRelyingpartyDeleteAccountRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('deleteAccount', [$params], DeleteAccountResponse::class);
  }
  /**
   * Batch download user accounts. (relyingparty.downloadAccount)
   *
   * @param IdentitytoolkitRelyingpartyDownloadAccountRequest $postBody
   * @param array $optParams Optional parameters.
   * @return DownloadAccountResponse
   */
  public function downloadAccount(IdentitytoolkitRelyingpartyDownloadAccountRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('downloadAccount', [$params], DownloadAccountResponse::class);
  }
  /**
   * Reset password for a user. (relyingparty.emailLinkSignin)
   *
   * @param IdentitytoolkitRelyingpartyEmailLinkSigninRequest $postBody
   * @param array $optParams Optional parameters.
   * @return EmailLinkSigninResponse
   */
  public function emailLinkSignin(IdentitytoolkitRelyingpartyEmailLinkSigninRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('emailLinkSignin', [$params], EmailLinkSigninResponse::class);
  }
  /**
   * Returns the account info. (relyingparty.getAccountInfo)
   *
   * @param IdentitytoolkitRelyingpartyGetAccountInfoRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GetAccountInfoResponse
   */
  public function getAccountInfo(IdentitytoolkitRelyingpartyGetAccountInfoRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('getAccountInfo', [$params], GetAccountInfoResponse::class);
  }
  /**
   * Get a code for user action confirmation.
   * (relyingparty.getOobConfirmationCode)
   *
   * @param RelyingpartyModel $postBody
   * @param array $optParams Optional parameters.
   * @return GetOobConfirmationCodeResponseModel
   */
  public function getOobConfirmationCode(RelyingpartyModel $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('getOobConfirmationCode', [$params], GetOobConfirmationCodeResponse::class);
  }
  /**
   * Get project configuration. (relyingparty.getProjectConfig)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string delegatedProjectNumber Delegated GCP project number of the
   * request.
   * @opt_param string projectNumber GCP project number of the request.
   * @return IdentitytoolkitRelyingpartyGetProjectConfigResponse
   */
  public function getProjectConfig($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getProjectConfig', [$params], IdentitytoolkitRelyingpartyGetProjectConfigResponse::class);
  }
  /**
   * Get token signing public key. (relyingparty.getPublicKeys)
   *
   * @param array $optParams Optional parameters.
   * @return IdentitytoolkitRelyingpartyGetPublicKeysResponse
   */
  public function getPublicKeys($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getPublicKeys', [$params], IdentitytoolkitRelyingpartyGetPublicKeysResponse::class);
  }
  /**
   * Get recaptcha secure param. (relyingparty.getRecaptchaParam)
   *
   * @param array $optParams Optional parameters.
   * @return GetRecaptchaParamResponse
   */
  public function getRecaptchaParam($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getRecaptchaParam', [$params], GetRecaptchaParamResponse::class);
  }
  /**
   * Reset password for a user. (relyingparty.resetPassword)
   *
   * @param IdentitytoolkitRelyingpartyResetPasswordRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ResetPasswordResponse
   */
  public function resetPassword(IdentitytoolkitRelyingpartyResetPasswordRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('resetPassword', [$params], ResetPasswordResponse::class);
  }
  /**
   * Send SMS verification code. (relyingparty.sendVerificationCode)
   *
   * @param IdentitytoolkitRelyingpartySendVerificationCodeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return IdentitytoolkitRelyingpartySendVerificationCodeResponse
   */
  public function sendVerificationCode(IdentitytoolkitRelyingpartySendVerificationCodeRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('sendVerificationCode', [$params], IdentitytoolkitRelyingpartySendVerificationCodeResponse::class);
  }
  /**
   * Set account info for a user. (relyingparty.setAccountInfo)
   *
   * @param IdentitytoolkitRelyingpartySetAccountInfoRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SetAccountInfoResponse
   */
  public function setAccountInfo(IdentitytoolkitRelyingpartySetAccountInfoRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setAccountInfo', [$params], SetAccountInfoResponse::class);
  }
  /**
   * Set project configuration. (relyingparty.setProjectConfig)
   *
   * @param IdentitytoolkitRelyingpartySetProjectConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return IdentitytoolkitRelyingpartySetProjectConfigResponse
   */
  public function setProjectConfig(IdentitytoolkitRelyingpartySetProjectConfigRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setProjectConfig', [$params], IdentitytoolkitRelyingpartySetProjectConfigResponse::class);
  }
  /**
   * Sign out user. (relyingparty.signOutUser)
   *
   * @param IdentitytoolkitRelyingpartySignOutUserRequest $postBody
   * @param array $optParams Optional parameters.
   * @return IdentitytoolkitRelyingpartySignOutUserResponse
   */
  public function signOutUser(IdentitytoolkitRelyingpartySignOutUserRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('signOutUser', [$params], IdentitytoolkitRelyingpartySignOutUserResponse::class);
  }
  /**
   * Signup new user. (relyingparty.signupNewUser)
   *
   * @param IdentitytoolkitRelyingpartySignupNewUserRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SignupNewUserResponse
   */
  public function signupNewUser(IdentitytoolkitRelyingpartySignupNewUserRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('signupNewUser', [$params], SignupNewUserResponse::class);
  }
  /**
   * Batch upload existing user accounts. (relyingparty.uploadAccount)
   *
   * @param IdentitytoolkitRelyingpartyUploadAccountRequest $postBody
   * @param array $optParams Optional parameters.
   * @return UploadAccountResponse
   */
  public function uploadAccount(IdentitytoolkitRelyingpartyUploadAccountRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('uploadAccount', [$params], UploadAccountResponse::class);
  }
  /**
   * Verifies the assertion returned by the IdP. (relyingparty.verifyAssertion)
   *
   * @param IdentitytoolkitRelyingpartyVerifyAssertionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return VerifyAssertionResponse
   */
  public function verifyAssertion(IdentitytoolkitRelyingpartyVerifyAssertionRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('verifyAssertion', [$params], VerifyAssertionResponse::class);
  }
  /**
   * Verifies the developer asserted ID token. (relyingparty.verifyCustomToken)
   *
   * @param IdentitytoolkitRelyingpartyVerifyCustomTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return VerifyCustomTokenResponse
   */
  public function verifyCustomToken(IdentitytoolkitRelyingpartyVerifyCustomTokenRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('verifyCustomToken', [$params], VerifyCustomTokenResponse::class);
  }
  /**
   * Verifies the user entered password. (relyingparty.verifyPassword)
   *
   * @param IdentitytoolkitRelyingpartyVerifyPasswordRequest $postBody
   * @param array $optParams Optional parameters.
   * @return VerifyPasswordResponse
   */
  public function verifyPassword(IdentitytoolkitRelyingpartyVerifyPasswordRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('verifyPassword', [$params], VerifyPasswordResponse::class);
  }
  /**
   * Verifies ownership of a phone number and creates/updates the user account
   * accordingly. (relyingparty.verifyPhoneNumber)
   *
   * @param IdentitytoolkitRelyingpartyVerifyPhoneNumberRequest $postBody
   * @param array $optParams Optional parameters.
   * @return IdentitytoolkitRelyingpartyVerifyPhoneNumberResponse
   */
  public function verifyPhoneNumber(IdentitytoolkitRelyingpartyVerifyPhoneNumberRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('verifyPhoneNumber', [$params], IdentitytoolkitRelyingpartyVerifyPhoneNumberResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Relyingparty::class, 'Google_Service_IdentityToolkit_Resource_Relyingparty');
