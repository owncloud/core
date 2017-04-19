<?php

/*
 * The MIT License
 *
 * Copyright 2016 cambierr.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace OCA\user_gitlab;

use \Exception;
use OC_User_Backend;
use OCP\IUserBackend;
use OCP\UserInterface;
use OCP\Util;

class USER_GITLAB extends OC_User_Backend implements IUserBackend, UserInterface {

    protected $gitLabUrl;
    protected $gitLabPrivateToken;

    public function __construct() {
        $this->gitLabUrl = \OC::$server->getConfig()->getAppValue('user_gitlab', 'gitlab_url', '');
        $this->gitLabPrivateToken = \OC::$server->getConfig()->getAppValue('user_gitlab', 'gitlab_secret', '');
    }

    public function implementsAction($actions) {
        return (bool) ((
                OC_User_Backend::CHECK_PASSWORD |
                OC_User_Backend::GET_DISPLAYNAME |
                OC_User_Backend::COUNT_USERS
                ) & $actions);
    }

    public function hasUserListings() {
        return true;
    }

    public function checkPassword($uid, $password) {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->gitLabUrl . '/api/v3/session');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $post = array('login' => trim($uid), 'password' => $password);
            $postString = '';
            foreach ($post as $key => $value) {
                $postString .= $key . '=' . $value . '&';
            }
            curl_setopt($ch, CURLOPT_POST, count($post));
            curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim($postString, '&'));
            $response = curl_exec($ch);
            if (false === $response) {
                throw new Exception('Curl error');
            }
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            if ($status == 201) {
                $json = json_decode($response, true);
                if ($json === false) {
                    throw new Exception('Wrong json received');
                }
                Util::writeLog('USER_GITLAB', "GitLab authentication success: granted", Util::DEBUG);
                return $json['id'];
            } elseif ($status == 401) {
                Util::writeLog('USER_GITLAB', "GitLab authentication success: denied", Util::DEBUG);
                return false;
            } else {
                throw new Exception('Wrong response code: ' . $status);
            }
        } catch (Exception $ex) {
            Util::writeLog('USER_GITLAB', "GitLab authentication failed: " . $ex->getResult(), Util::ERROR);
            return false;
        }
    }

    public function countUsers() {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->gitLabUrl . '/api/v3/users?private_token=' . $this->gitLabPrivateToken);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            if (false === $response) {
                throw new Exception('Curl error');
            }
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            if ($status == 200) {
                $json = json_decode($response, true);
                if ($json === false) {
                    throw new Exception('Wrong json received');
                }
                Util::writeLog('USER_GITLAB', "GitLab user count success", Util::DEBUG);
                return count($json);
            } else {
                throw new Exception('Wrong response code: ' . $status);
            }
        } catch (Exception $ex) {
            Util::writeLog('USER_GITLAB', "GitLab user count failed: " . $ex->getResult(), Util::ERROR);
            return 0;
        }
    }

    public function getUsers($search = '', $limit = 9999, $offset = 0) {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->gitLabUrl . '/api/v3/users?private_token=' . $this->gitLabPrivateToken . '&search=' . $search);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            if (false === $response) {
                throw new Exception('Curl error');
            }
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            if ($status == 200) {
                $json = json_decode($response, true);
                if ($json === false) {
                    throw new Exception('Wrong json received');
                }
                Util::writeLog('USER_GITLAB', "GitLab user list success", Util::DEBUG);
                if ($offset >= count($json)) {
                    return array();
                }
                $output = array();
                for ($i = $offset; $i < min([$limit + $offset, count($json)]); $i++) {
                    $output[] = $json[$i]['id'];
                }
                return $output;
            } else {
                throw new Exception('Wrong response code: ' . $status);
            }
        } catch (Exception $ex) {
            Util::writeLog('USER_GITLAB', "GitLab user list failed: " . $ex->getResult(), Util::ERROR);
            return array();
        }
    }

    public function userExists($uid) {
        if (!isset($_SESSION['user_exists_' . $uid]) || !isset($_SESSION['user_exists_' . $uid . '_time']) || $_SESSION['user_exists_' . $uid . '_time'] < (time() - 300)) {
            try {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $this->gitLabUrl . '/api/v3/users/' . trim($uid) . '?private_token=' . $this->gitLabPrivateToken);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $response = curl_exec($ch);
                if (false === $response) {
                    throw new Exception('Curl error');
                }
                $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);
                if ($status == 200) {
                    Util::writeLog('USER_GITLAB', "GitLab user exists success: found", Util::DEBUG);
                    $_SESSION['user_exists_' . $uid] = true;
                    $_SESSION['user_exists_' . $uid . '_time'] = time();
                } elseif ($status == 404) {
                    Util::writeLog('USER_GITLAB', "GitLab user exists success: not found", Util::DEBUG);
                    $_SESSION['user_exists_' . $uid] = false;
                    $_SESSION['user_exists_' . $uid . '_time'] = time();
                } else {
                    throw new Exception('Wrong response code: ' . $status);
                }
            } catch (Exception $ex) {
                Util::writeLog('USER_GITLAB', "GitLab user exists test failed: " . $ex->getResult(), Util::ERROR);
                return false;
            }
        }
        return $_SESSION['user_exists_' . $uid];
    }

    public function getDisplayName($uid) {
        if (!isset($_SESSION['user_name_' . $uid]) || !isset($_SESSION['user_name_' . $uid . '_time']) || $_SESSION['user_name_' . $uid . '_time'] < (time() - 300) || $_SESSION['user_name_' . $uid] == false) {
            try {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $this->gitLabUrl . '/api/v3/users/' . trim($uid) . '?private_token=' . $this->gitLabPrivateToken);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $response = curl_exec($ch);
                if (false === $response) {
                    throw new Exception('Curl error');
                }
                $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);
                if ($status == 200) {
                    $json = json_decode($response, true);
                    if ($json === false) {
                        throw new Exception('Wrong json received');
                    }
                    Util::writeLog('USER_GITLAB', "GitLab user name success: found", Util::DEBUG);
                    $_SESSION['user_name_' . $uid] = $json['name'];
                    $_SESSION['user_name_' . $uid . '_time'] = time();
                } elseif ($status == 404) {
                    Util::writeLog('USER_GITLAB', "GitLab user name success: not found", Util::DEBUG);
                    return false;
                } else {
                    throw new Exception('Wrong response code: ' . $status);
                }
            } catch (Exception $ex) {
                Util::writeLog('USER_GITLAB', "GitLab user name failed: " . $ex->getResult(), Util::ERROR);
                return false;
            }
        }
        return $_SESSION['user_name_' . $uid];
    }

    public function getDisplayNames($search = '', $limit = 9999, $offset = 0) {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->gitLabUrl . '/api/v3/users?private_token=' . $this->gitLabPrivateToken . '&search=' . $search);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            if (false === $response) {
                throw new Exception('Curl error');
            }
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            if ($status == 200) {
                $json = json_decode($response, true);
                if ($json === false) {
                    throw new Exception('Wrong json received');
                }
                Util::writeLog('USER_GITLAB', "GitLab list user name success", Util::DEBUG);
                if ($offset >= count($json)) {
                    return array();
                }
                $output = array();
                for ($i = $offset; $i < min([$limit + $offset, count($json)]); $i++) {
                    $output[$json[$i]['id']] = $json[$i]['name'];
                }
                return $output;
            } else {
                throw new Exception('Wrong response code: ' . $status);
            }
        } catch (Exception $ex) {
            Util::writeLog('USER_GITLAB', "GitLab user list names failed: " . $ex->getResult(), Util::ERROR);
            return false;
        }
    }

    public function getBackendName() {
        return 'GitLab';
    }

}
